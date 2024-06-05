<?php
require_once 'connect.php';

$sql = "SELECT id, name, prezzo, n_iscritti, max_iscritti, descrizione, image FROM corso";
$result = $conn->query($sql);

$courses = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
} 

$conn->close();

header('Content-Type: application/json');
echo json_encode($courses);
?>
