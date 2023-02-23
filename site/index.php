<?php 
require 'database.php';

try {

    $stmt = $conn->prepare("SELECT id, first_name, last_name, email, password, ip_address FROM users");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $all_users = $stmt->fetchAll();
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
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
        <th>Details</th>
    </tr> 
    <?php foreach($all_users as $user): ?>
        <tr> 
            <td><?php echo $user["id"] ?></td>
            <td><?php echo $user["first_name"] ?></td>
            <td><?php echo $user["last_name"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo $user["password"] ?></td>
            <td><?php echo $user["ip_address"] ?></td>
            <td><a class=" btn btn-dark text-white" href="users_show.php?id=<?php echo $user['id'] ?>"><b>Details Bekijken</b></a></td>
        </tr>
    <?php endforeach; ?>
</table>
