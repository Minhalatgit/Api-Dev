<?php 

    require 'connect.php';
    
    $data = array();

    $sql = "SELECT * FROM `users`";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $users = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
            $result = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'address' => $row['address'],
                'phone' => $row['phone']
            );
           
            array_push($users, $result);
        }
        $data['data'] = $users;
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