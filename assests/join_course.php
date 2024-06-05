<?php
require_once 'connect.php';
session_start();

$user_id = $_SESSION['user_id'];
$course_id = $_POST['course_id'];


$sql = "SELECT n_iscritti, max_iscritti FROM corso WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$stmt->bind_result($n_iscritti, $max_iscritti);
$stmt->fetch();
$stmt->close();

if ($n_iscritti >= $max_iscritti) {
    echo json_encode(["status" => "full"]);
    $conn->close();
    exit();
}

 
$sql = "SELECT COUNT(*) FROM iscrizione WHERE user_id = ? AND corso_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $course_id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo json_encode(["status" => "already_joined"]);
    $conn->close();
    exit();
}


$sql = "INSERT INTO iscrizione (user_id, corso_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $course_id);
$stmt->execute();
$stmt->close();


$sql = "UPDATE corso SET n_iscritti = n_iscritti + 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$stmt->close();

$conn->close();
echo json_encode(["status" => "joined"]);
?>
