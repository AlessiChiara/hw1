<?php

require_once 'connect.php';
session_start();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: login_form.php");
    exit();
}

$query = "SELECT iscrizione.id as subscription_id, corso.id as corso_id, corso.name, corso.prezzo, corso.back_image 
          FROM iscrizione 
          JOIN corso ON iscrizione.corso_id = corso.id 
          WHERE iscrizione.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$subscriptions = [];
while ($row = $result->fetch_assoc()) {
    $subscriptions[] = $row;
}

echo json_encode($subscriptions);
?>
