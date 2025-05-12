#!/bin/bash

CLUSTER_NAME="php-cluster-dev"
SERVICE_NAME="php-service-lb"
REGION="us-east-2"

echo "🔄 Buscando task ativa no ECS..."

TASK_ARN=$(aws ecs list-tasks --cluster "$CLUSTER_NAME" --service-name "$SERVICE_NAME" --region "$REGION" --query "taskArns[0]" --output text)

if [[ "$TASK_ARN" == "None" ]]; then
    echo "❌ Nenhuma task ativa encontrada no ECS."
    exit 1
fi

echo "✅ Task encontrada: $TASK_ARN"
echo "🔍 Obtendo detalhes da task..."

aws ecs describe-tasks \
  --cluster "$CLUSTER_NAME" \
  --tasks "$TASK_ARN" \
  --region "$REGION" \
  --query "tasks[].{Image: containers[].image, Status: containers[].lastStatus, ENI: attachments[].details[?name=='networkInterfaceId'].value}" \
  --output table

ENI_ID=$(aws ecs describe-tasks \
  --cluster "$CLUSTER_NAME" \
  --tasks "$TASK_ARN" \
  --region "$REGION" \
  --query "tasks[].attachments[].details[?name=='networkInterfaceId'].value" \
  --output text)

echo "🌐 Buscando IP Público da ENI: $ENI_ID..."

PUBLIC_IP=$(aws ec2 describe-network-interfaces \
  --network-interface-ids "$ENI_ID" \
  --region "$REGION" \
  --query "NetworkInterfaces[].Association.PublicIp" \
  --output text)

echo "🚀 Acesse sua aplicação em: http://$PUBLIC_IP"
