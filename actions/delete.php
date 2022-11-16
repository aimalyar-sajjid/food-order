<?php 
    include "../config/db.php";
    $obj = new db();

    if(isset($_POST['action']) && $_POST['action'] == "delete-dish")
    {
        $result = $obj->delete("menu", "id = {$_POST['id']}");

        if($result == 1)
        {
            echo json_encode(['status' => 1, 'success' => "Dish deleted successfully!"]);
        }else
        {
            echo json_encode(['status' => 0, 'error' => "Dish couldnt be deleted successfully!"]);
        }
    }
?>