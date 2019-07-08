<?php
include "config.php";
include "database.php";

?>

<?php

$db = new Database();
$id = $_GET['id'];

$query = "SELECT * FROM tbl_user WHERE id =$id";
$getData = $db->select($query)->fetch_assoc();


if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($db->link,$_POST['name']);
  $gmail = mysqli_real_escape_string($db->link,$_POST['gmail']);
  $skill = mysqli_real_escape_string($db->link,$_POST['skill']);
  if($name == '' || $gmail == '' || $skill == ''){
    $error ="Field must not be Empty !!";
  }
  else{
    $query = "UPDATE tbl_user SET 
        name = '$name',
        gmail = '$gmail',
        skill = '$skill'
        WHERE id = $id
    ";
    $update = $db->update($query );
  }
  
}

?>

<?php

  if(isset($_POST['delete'])){
    $query = "DELETE FROM tbl_user WHERE id =$id";
    $deleteData = $db->delete($query);
  }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>user</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
  
		<h1 style="margin-top: 6px" class="text-uppercase p-4  text-center bg-secondary text-danger"> Create New User </h1>

       <?php 
    if(isset($error)){
      echo "<span style='color:red'>" .$error."</span>";
    }
    ?>

	<form action = "update.php?id=<?php echo $id; ?>" method ="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $getData['name'] ?>">
  </div>
  <div class="form-group">
    <label for="gmail">Gmail</label>
    <input type="text" name="gmail" class="form-control" id="" aria-describedby="emailHelp"  value="<?php echo $getData['gmail'] ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="skill">Skill</label>
    <input type="text" name="skill" class="form-control" id=""  value="<?php echo $getData['skill'] ?>">
  </div>
 
  <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
  <button type="submit" name="delete" value="submit" class="btn btn-danger">Delete</button>
  <button type="reset" class="btn btn-success">Cancel</button>
  <button type="submit" class="btn btn-info font-weight-bold " > <a style="color:black" href="index.php" >Go back</a></button>
</form>



</div>
</body>
</html>