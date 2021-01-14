<?php 

    require 'connect.php';
    
    $id = $_GET["id"];

    $data = array();

    $sql = "SELECT * FROM `users` where id = '$id'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $result = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'address' => $row['address'],
            'phone' => $row['phone']
        );

        $data['data'] = $result;
        $data['message'] = 'Data fetched successfully';
        $data['status'] = true;
    }else{
        $data['data'] = array();
        $data['message'] = 'No users found';
        $data['status'] = false;
    }

    echo json_encode($data);

    $conn = null;
?>