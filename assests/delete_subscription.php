<?php
require_once 'connect.php';
session_start();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: ../login_form.php");
    exit();
}


if(isset($_POST['delete'])){
    print_r( $_POST);
    if(isset($_POST['subscription_id'])) {
        $subscription_id = $_POST['subscription_id'];
        
   
        $delete_cart_item = $conn->prepare("DELETE FROM iscrizione WHERE id = ?");
        if(!$delete_cart_item) {
            die("Preparazione della query di eliminazione fallita: " . $conn->error);
        }
        
        
        $delete_cart_item->bind_param('i', $subscription_id);
        if(!$delete_cart_item->execute()) {
            die("Esecuzione della query di eliminazione fallita: " . $delete_cart_item->error);
        }

        $corso_id= $_POST['course_id'];
        $update_cart_item = $conn->prepare("UPDATE corso SET n_iscritti = n_iscritti -1 WHERE id = ?");
        $update_cart_item->bind_param('i', $corso_id);
        $update_cart_item->execute();
        
        $delete_cart_item->close();
        $update_cart_item->close();
        
     
        header("Location: ../profile.php");
        exit();
    } else {
        die("ID dell'iscrizione non ricevuto correttamente.");
    }
}

 if(isset($_POST['delete_all'])){
    $user_course= $conn->prepare("SELECT corso_id FROM iscrizione WHERE user_id = ?");
    $user_course->bind_param('i', $user_id);
    $user_course->execute();
    $result = $user_course->get_result();

$corsi= [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Corso ID: " . $row['corso_id'] . "<br>";
        $corsi[]= $row['corso_id'];
    }
} else {
    echo "Nessun corso trovato per l'utente con ID " . $user_id;
}
    $delete_cart_item = $conn->prepare("DELETE FROM iscrizione WHERE user_id = ?");
    $delete_cart_item->bind_param('i', $user_id);
    $delete_cart_item->execute();
    print_r($corsi);
    for ($i = 0; $i < count($corsi); $i++) {
        print_r($corsi[$i]);
        $update_niscritti = $conn->prepare("UPDATE corso SET n_iscritti = n_iscritti -1 WHERE id = ?");
        $update_niscritti->bind_param('i', $corsi[$i]);
        $update_niscritti->execute();
        
        
        $update_niscritti->close();
    }

 }
 
 $conn->close();
 header("location:../profile.php");


?>
