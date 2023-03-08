<?php 
require 'database.php';

$sql = "SELECT * FROM manufacturers";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$fabrikanten = $stmt->fetchAll();

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr> 
    <?php foreach($fabrikanten as $fabrikant): ?>
        <tr> 
            <td><?php echo $fabrikant["id"] ?></td>
            <td><?php echo $fabrikant["name"] ?></td>
            <td><a href="update_fabrikant.php?id=<?php echo $fabrikant["id"] ?>">Update</a></td>
        </tr>
    <?php endforeach; ?>
</table>