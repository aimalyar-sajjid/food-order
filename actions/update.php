<?php 
    include "../config/db.php";
    $obj = new db();

    if(isset($_POST['action']) && $_POST['action'] == "update-dish")
    {
        if($_FILES['picture']['name'] == "")
        {
            $pic = $_POST['old-picture'];
            $result = $obj->update("menu", [
                "title" => $_POST['title'],
                "decription" => $_POST['description'],
                "price" => $_POST['price'],
                "picture" => $pic
            ], "id = {$_POST['dish-id']}");

            if($result == 1)
            {
                echo json_encode(["status" => 1, "success" => "Dish updated successfully!"]);
            }else
            {
                echo json_encode(["status" => 0, "error" => "Something went wrong"]);
            }
        }else
        {
            $pic_name = $_FILES['picture']['name'];
            $ext = strtolower(pathinfo($pic_name, PATHINFO_EXTENSION));
            $size = $_FILES['picture']['size'] / 1024;
            $valid_ext = ['png', 'jpg', 'jpeg'];
    
            if(in_array($ext, $valid_ext))
            {
                if($size > 2048)
                {
                    echo json_encode(["status" => 0, "error" => "Picture must not be greater than 2 MB"]);
                }else
                {
                    $pic = time() . "." . $ext;
                    if(move_uploaded_file($_FILES['picture']['tmp_name'], "../assets/images/$pic"))
                    {
                        $result = $obj->insert("menu", [
                            "title" => $_POST['title'],
                            "decription" => $_POST['description'],
                            "price" => $_POST['price'],
                            "picture" => $pic
                        ], "id = {$_POST['dish-id']}");
    
                        if($result == 1)
                        {
                            echo json_encode(["status" => 1, "success" => "Dish updated successfully!"]);
                        }else
                        {
                            echo json_encode(["status" => 0, "error" => "Something went wrong"]);
                        }
                    }else
                    {
                        echo json_encode(["status" => 0, "error" => "Picture couldn't be uploaded!"]);
                    }
                }
            }else
            {
                echo json_encode(["status" => 0, "error" => "Invalid File Type, Please Select (png, jpg, jpeg)"]);
            }
        }
    }




    // UPDATE ORDER STATUS
    if(isset($_POST['action']) && $_POST['action'] == "update_order_status")
    {
        $result = $obj->update("order_now", ['status' => "Canceled"], "id = {$_POST['id']}");

        if($result == 1)
        {
            echo json_encode(["status" => 1, "success" => "Order Canceled Successfully!"]);
        }else
        {
            echo json_encode(["status" => 0, "error" => "Something went wrong"]);
        }
    }



    // UPDATE ORDER STATUS
    if(isset($_POST['action']) && $_POST['action'] == "update_order_status_delivered")
    {
        $result = $obj->update("order_now", ['status' => "Delivered"], "id = {$_POST['id']}");

        if($result == 1)
        {
            echo json_encode(["status" => 1, "success" => "Order Delivered Successfully!"]);
        }else
        {
            echo json_encode(["status" => 0, "error" => "Something went wrong"]);
        }
    }


        // UPDATE Password
        if(isset($_POST['action']) && $_POST['action'] == "updatePassword")
        {

            $result = $obj->select("SELECT * FROM admin WHERE id = '{$_POST['adminId']}' AND password = '{$_POST['currentPassword']}'");

            if(count($result) > 0)
            {
                $updatedP = $obj->update("admin", ['password' => "{$_POST['newPassword']}"], "id={$_POST['adminId']}");

                if($updatedP == 1)
                {
                    echo json_encode(["status" => 1, "success" => "Password Updated Successfully!"]);
                }else
                {
                    echo json_encode(["status" => 0, "error" => "Something went wrong"]);
                }
            }else
            {
                echo json_encode(["status" => 0, "error" => "Current Password Didn't Match!"]);
            }

        }
?>