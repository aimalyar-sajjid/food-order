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




    // ADD TO MENU
    if(isset($_POST['action']) && $_POST['action'] == "add-menu")
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $pic = $_FILES['picture']['name'];
        $ext = strtolower(pathinfo($pic, PATHINFO_EXTENSION));
        $size = $_FILES['picture']['size'] / 1024;
        $valid_ext = ['png', 'jpg', 'jpeg'];

        if(in_array($ext, $valid_ext))
        {
            if($size > 2048)
            {
                echo json_encode(["status" => 0, "error" => "Picture must not be greater than 2 MB"]);
            }else
            {
                $new_name = time() . "." . $ext;
                if(move_uploaded_file($_FILES['picture']['tmp_name'], "../assets/images/$new_name"))
                {
                    $result = $obj->insert("menu", [
                        "title" => $title,
                        "decription" => $description,
                        "price" => $price,
                        "picture" => $new_name
                    ]);

                    if($result == 1)
                    {
                        echo json_encode(["status" => 1, "success" => "Dish added successfully!"]);
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
?>