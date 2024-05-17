<?php 

require_once __DIR__ . '/config/pdo.php';

if($_SERVER["REQUEST_METHOD"] === "GET") {

$id = $_GET['id'];
$query = "DELETE FROM messages WHERE id=:id";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
}

header("Location: /index.php");
