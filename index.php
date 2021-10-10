<?php

include "config/db_coonect.php";

// write query

$sql = "SELECT id,name,type,ingredient FROM practice ORDER BY date";
// make the query

$result = mysqli_query($connect, $sql);

// fetch the result as array

$queryarr = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

// close connect
mysqli_close($connect);



// try{
//   $connect = new PDO("mysqli:host=$servername;dbname=practice1",$username,$password);
  
//   // set the PDO mode to exeption

//   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTION);
//   echo "connection successfully";

// } catch(PDOEXCEPTION $e){
//   echo "connection error: " . $e ->getMessage();
// }

// check connection
?>

<!DOCTYPE html>
<html lang="en">
<?php include("templates/header.php"); ?>



<h4 class="grey-text center">Shawarma's</h4>

<div class="container">
<div class="row">

<?php foreach($queryarr as $shawama): ?>

<div class="col s6 m3 ">
  <div class="card z-depth-0 ">
   <div class="card-content center ">
    <h6> <?php echo htmlspecialchars($shawama['type']) ?></h6>  
    <ul>
        <?php foreach(explode(',', $shawama['ingredient']) as $per): ?>
            <li><?php echo htmlspecialchars($per); ?></li>
      
       <?php endforeach; ?>
    </ul> 
   </div>
    <div class="card-action right-align">
        <a href="details.php?id=<?php echo $shawama['id'] ?>" class="logo"> more info</a>
    </div>
  </div>
</div>
    <?php endforeach; ?> 
</div>
</div>

<?php include("templates/footer.php"); ?>

</html>




