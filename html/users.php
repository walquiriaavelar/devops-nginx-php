<?php
// users.php
header('Content-Type: application/json; charset=utf-8');
$mysqli = new mysqli('mysql','user','password','appdb');
$r = $mysqli->query("SELECT id,nome FROM usuarios ORDER BY id");
$out = [];
while($row=$r->fetch_assoc()) $out[]=$row;
echo json_encode($out);
