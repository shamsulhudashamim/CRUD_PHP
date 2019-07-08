<?php
include "config.php";
include "database.php";

?>



<?php
$db = new Database();
$query = "SELECT * FROM tbl_user";
$read = $db->select($query);

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
		<h1 style="margin-top: 6px" class="text-uppercase p-4  text-center bg-secondary text-danger"> User data table </h1>

		<?php 
		if(isset($_GET['msg'])){
			echo "<span style='color:blue'>" .$_GET['msg']."</span>";
		}
		?>

	<table class="table table-striped">
  <thead>
    <tr>
    	<th scope="col">Serial</th> 
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Skill</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if($read) {?>
  	<?php
  	$i = 1; 
  	while($row = $read->fetch_assoc()){ ?>
    <tr>
    	<td><?php echo $i++; ?></td>
      <td scope="row">
      	<?php echo $row['name']; ?>
      </td>
      <td scope="row">
      	<?php echo $row['gmail']; ?>
      </td>
      <td scope="row">
      	<?php echo $row['skill']; ?>
      </td>
      <td><a href="update.php?id=<?php echo urlencode($row['id']); ?> " >Edit</a></td>

    </tr>
<?php } ?>
<?php } ?>
 
  </tbody>
</table>
<button type="button" class="btn btn-sm btn-primary"><a class="text-dark font-weight-bold" href="create.php">Create</a></button>
</div>
</body>
</html>