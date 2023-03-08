<?php
    require 'database.php';

    $id = $_GET['id'];
    if(isset($_POST["submitButton"])){
        if(!empty($_POST["naamFabrikant"])){ 
           if(strlen($_POST["naamFabrikant"]) >= 3){
                $fabrikant = $_POST["naamFabrikant"];
                // prepare sql and bind parameters
                $stmt = $conn->prepare("UPDATE manufacturers SET name = :name WHERE id = :id");
                $stmt->bindParam(':name', $fabrikant);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
           } 
        } 
    }
    
  // prepare sql and bind parameters
  $stmt = $conn->prepare("SELECT * FROM manufacturers WHERE id = :id");
  $stmt->bindParam(':id', $id);

  $stmt->execute();

  $fabrikant = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!is_array($fabrikant)){
    echo "Er is iets fout gegaan. ga snel terug!";
    exit;
  }
  
  
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
    <form action="" method="post">
        <label for="">Naam Fabrikant</label>
        <input type="text" name="naamFabrikant" id="naamFabrikant" value="<?php echo $fabrikant['name']?>">
        <button type="submit" name="submitButton">Update!</button>
    </form>
</body>
</html>