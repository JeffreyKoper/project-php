<?php 
require 'database.php';

// print_r($_POST);

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(is_array($user) && count($user) > 0){
        // test wachtwoord
        if(isset($_POST["password"]) && !empty($password = $_POST["password"])){
            $password = $_POST['password'];
            if($user["password"] == $password){
                echo "Deze gebruiker is authenticated.";
            }

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Inloggen</title>
</head>
<body>
    
<h1><a href="form.php">Registeren</a>/Inloggen</h1>
<form method="post">
    <div class="form-group">
        <label for="Email">Email Address</label>
        <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" placeholder="Password" name= "password">
    </div>
    <button type="submit" id="Submit"class="btn btn-primary">Submit</button>
</form>
</body>
</html>