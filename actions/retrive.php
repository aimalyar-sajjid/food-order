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


    // RETRIVE PROFILE INFO FOR UPDATION
    if(isset($_POST['action']) && $_POST['action'] == "profile")
    {
        $result = $db->select("SELECT * FROM admin WHERE id = {$_POST['adminId']}");
    
        echo json_encode(["profile" => $result]);
    }
?>