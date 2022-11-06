<?php 
    include("../config/db.php");

    $obj = new db();

    $result = $obj->select("SELECT * FROM admin WHERE email = '{$_POST['email']}'");

    if(count($result) > 0)
    {
        if($result[0]['password'] == $_POST['password'])
        {
            session_start();

            $_SESSION['user_id'] = $result[0]['id'];
            $_SESSION['user_name'] = $result[0]['user_name'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['picture'] = $result[0]['picture'];

            echo json_encode(["status" => 1]);
        }else
        {
            echo json_encode(["status" => 0, "msg" => "Incorrect password"]);
        }
    }else
    {
        echo json_encode(["status" => 0, "msg" => "Incorrect email"]);
    }


?>