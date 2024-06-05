<?php
require_once 'connect.php';

$sql = "SELECT id, name, prezzo, n_iscritti, max_iscritti, descrizione, image, back_image FROM corso";
$result = $conn->query($sql);

$classes = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
} 

$conn->close();

header('Content-Type: application/json');
echo json_encode($classes);
?>
