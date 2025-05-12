<?php
$mysqli = new mysqli("mysql", "root", "root", "appdb");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Consultar dados da tabela (Exemplo)
$result = $mysqli->query("SELECT * FROM usuarios"); // Substitua com uma tabela real

if ($result->num_rows > 0) {
    // Mostrar os resultados da consulta
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. "<br>";
    }
} else {
    echo "Nenhum dado encontrado";
}

$mysqli->close();
?>
