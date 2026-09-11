<?php
session_start();
require_once "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$usuario_id = $_SESSION["id"];
$video_id = $data["video_id"];
$titulo = $data["titulo"];

$stmt = $conn->prepare("INSERT INTO videos_assistidos (usuario_id, video_id, titulo) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $usuario_id, $video_id, $titulo);
$stmt->execute();
