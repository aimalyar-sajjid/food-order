<?php 
    include("../config/db.php");
    $db = new db();

    if(isset($_POST['action']) && $_POST['action'] == "order_now")
    {
        $result = $db->select("SELECT * FROM order_now");
    
        echo json_encode(["order_now" => $result]);
    }


    // RERIVE ALL DISHES FROM MENU TABLE
    if(isset($_POST['action']) && $_POST['action'] == "dishes")
    {
        $result = $db->select("SELECT * FROM menu");
    
        echo json_encode(["menu" => $result]);
    }
?>