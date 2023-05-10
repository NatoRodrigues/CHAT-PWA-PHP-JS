<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $sql = "ALTER TABLE users WHERE unique_id LIKE {$_SESSION}";      
    }

        


?>