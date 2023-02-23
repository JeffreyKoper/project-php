<?php 
require 'database.php';
if(isset($_POST['firstname'],$_POST['lastname'], $_POST['email'], $_POST['password'])){
  $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password)
  VALUES (:firstname, :lastname, :email, :password)");
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $stmt->execute();
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>Registeren/<a href="Inloggen.php">Inloggen</a></h1>
<form method="post">
  <div class="form-group">
    <label for="First Name">First Name</label>
    <input type="text" class="form-control" id="First Name" placeholder="First Name" name="firstname">
  </div>
  <div class="form-group">
    <label for="Lastname">Last Name</label>
    <input type="text" class="form-control" id="Lastname" placeholder="Last Name" name="lastname">

<div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" placeholder="Password" name= "password">
  </div>
  <button type="submit" id="Submit"class="btn btn-primary">Submit</button>
</div>
</form>