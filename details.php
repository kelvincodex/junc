<?php 
include "config/db_coonect.php";


if (isset($_POST['delete'])) {
	$to_delete = mysqli_real_escape_string($connect,$_POST['to_delete']);

	$sql = "DELETE FROM practice WHERE id = $to_delete";

  if (mysqli_query($connect,$sql)) {
	// success
	header('Location:index.php');
  } else {
	  echo 'connection error: ' . mysqli_error($connect);
    }
}

// check id

if (isset($_GET['id'])) {
	$id = mysqli_real_escape_string($connect,$_GET['id']);
	// write a query
	$sql = "SELECT * FROM practice WHERE id = $id";
	// make query
	$result = mysqli_query($connect,$sql);
	//fetch result
	$queryarr = mysqli_fetch_assoc($result);
	// close connection
	mysqli_free_result($result);
	mysqli_close($connect);
};


 ?>

 <!DOCTYPE html>
 <html>
<?php include "templates/header.php"; ?>

<div class="container center">
	<?php if ($queryarr): ?>
		<h4>created by:<?php echo htmlspecialchars($queryarr['name']); ?></h4>
		<p>Date: <?php echo htmlspecialchars($queryarr['Date']); ?></p>
		<h5>email:</h5>
		<p><?php echo htmlspecialchars($queryarr['email']); ?></p>
		<h5>ingredient</h5>
		<p><?php echo htmlspecialchars($queryarr['ingredient']); ?></p>
		<!-- Delete form -->
		<form action="details.php" method="post">
			<input type="hidden"  name="to_delete" value="<?php echo $queryarr['id']?>">
			<input type="submit" name="delete" value="Delete" class="btn btn-large pink darken-1">
		</form>

	<?php else: ?>
		<h4>the slot is empty!!!</h4>
		<p>place your order!!!</p>
   
	<?php endif; ?>	
	</div>
	
</div>



<?php include "templates/footer.php"; ?>
 </html>