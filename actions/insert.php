<?php 
    include "../config/db.php";
    $obj = new db();

    if(isset($_POST['action']) && $_POST['action'] == "insert-order")
    {
        $result = $obj->insert("order_now", [
            "name" => $_POST['your-name'],
            "number" => $_POST['your-number'],
            "your_order" => $_POST['your-order'],
            "aditional" => $_POST['additional-order'],
            "quantity" => $_POST['quantity'],
            "date" => $_POST['date'],
            "address" => $_POST['your-address'],
            "message" => $_POST['message']
        ]);

        if($result == 1)
        {
            echo json_encode(["status" => "1", "success" => "Order Recived!"]);
        }else{
            echo json_encode(["status" => "0", "error" => "Something Went Wrong!"]);
        }
    }
?>