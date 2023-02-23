<?php 
require 'database.php';
$id = $_GET['id'];


$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$one_User = $stmt->fetch();

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<table class="table">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-mail</th>
        <th>Password</th>
        <th>Ip Address</th>
    </tr>         
    <tr> 
            <td><?php echo $one_User["id"] ?></td>
            <td><?php echo $one_User["first_name"] ?></td>
            <td><?php echo $one_User["last_name"] ?></td>
            <td><?php echo $one_User["email"] ?></td>
            <td><?php echo $one_User["password"] ?></td>
            <td><?php echo $one_User["ip_address"] ?></td>
    </tr>
    


