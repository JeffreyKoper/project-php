<?php 

require 'database.php';


$stmt = $conn->prepare("SELECT *, manufacturers.name as fabrikant FROM products
JOIN manufacturers ON manufacturers.id = products.manufacturer");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>naam</th>
                <th>prijs</th>
                <th>manufacturers</th>
            </tr>
        </thead>  
        <tbody> 
            <?php foreach($products as $product) : ?>      
                <tr>
                    <td><?php echo $product["id"] ?></td>
                    <td><?php echo $product["name"] ?></td>
                    <td><?php echo $product["price"] ?></td>
                    <td><?php echo $product["fabrikant"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>