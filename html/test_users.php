<?php
// test_users.php
// Saída em texto puro: ID: X — Nome: Y

header('Content-Type: text/plain; charset=utf-8');

$host     = 'mysql';        // nome do serviço MySQL no docker-compose
$user     = 'user';         // ajuste se for outro
$password = 'password';     // ajuste se for outro
$db       = 'appdb';

$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_error) {
    http_response_code(500);
    echo "Erro de conexão: " . $mysqli->connect_error;
    exit;
}

$sql = "SELECT id, nome FROM usuarios ORDER BY id";
if (!$result = $mysqli->query($sql)) {
    http_response_code(500);
    echo "Erro de consulta: " . $mysqli->error;
    exit;
}

while ($row = $result->fetch_assoc()) {
    echo "ID: {$row['id']} — Nome: {$row['nome']}\n";
}

$mysqli->close();
