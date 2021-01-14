<?php 

    require 'connect.php';

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    
    $data = array();

    $sql = "INSERT INTO `users`(`name`, `address`, `phone`) VALUES ('$name', '$address', '$phone')";

    $stmt = $conn->prepare($sql);

    $result = $stmt->execute();

    if ($result) {
        $data['message'] = 'Data inserted successfully';
        $data['status'] = true;
    }else{
        $data['message'] = 'Something went wrong';
        $data['status'] = false;
    }

    echo json_encode($data);

    $conn = null;
?>