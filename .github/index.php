<?php
$servername = getenv('MYSQL_HOST') ?: 'mysql';
$username = getenv('MYSQL_USER') ?: 'user';
$password = getenv('MYSQL_PASSWORD') ?: 'password';
$database = getenv('MYSQL_DATABASE') ?: 'appdb';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("❌ Conexão falhou: " . $conn->connect_error);
} else {
    echo "✅ Conectado com sucesso ao banco de dados<br>";
}

$result = $conn->query("SHOW TABLES");

if ($result->num_rows > 0) {
    echo "Tabelas no banco de dados:<br>";
    while($row = $result->fetch_array()) {
        echo "- " . $row[0] . "<br>";
    }
} else {
    echo "Nenhuma tabela encontrada no banco de dados.";
}

$conn->close();
?>
