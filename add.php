
<?php 

include "config/db_coonect.php";

$name=$ingredient=$email=$title='';
$erroMsg =[
  'email'=>'',
  'title'=>'',
  'name'=>'',
  'ingredient'=>''
];

if(isset($_POST['submit'])){
  //
  // echo htmlspecialchars($_POST['title']);
  // echo htmlspecialchars($_POST['email']);
  // echo htmlspecialchars($_POST['ingredient']);

  // check email
if(!$_POST['email']){
  $erroMsg['email'] = 'Email address is required' .'<br>';
}else{
  // echo 
  $email = htmlspecialchars($_POST['email']);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errorMsg['email'] = 'email must be a valid email Address';
  }
}
  // check type of shawarma
if(!$_POST['title']){
  $erroMsg['title'] = 'type of shawama  is required' . '<br>';
}else{
  // echo 
  $title = htmlspecialchars($_POST['title']);
  if(!preg_match('/^[a-zA-Z\s]*$/',$title)){
     $erroMsg['title'] = 'letters and whitespace only';
  }
}
  // check ingredient
if(!$_POST['ingredient']){
  $erroMsg['ingredient'] = 'Igredients  is required';
}else{
  // echo 
  $ingredient = htmlspecialchars($_POST['ingredient']);
  if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredient)){
     $erroMsg['ingredient'] = 'ingredient must be a comma sepreted list';
  }
}
  // check name
if(!$_POST['name']){
  $erroMsg['name'] = 'Name  is required' . '<br>';
}else{
  // echo 
  $name = htmlspecialchars($_POST['name']);;
  if(!preg_match('/^[a-zA-Z\s]*$/',$name)){
     $erroMsg['name'] = 'letters and whitespace only';
  }
}

if(array_filter($erroMsg) !== false){
  // echo "error in these page";
  $email = mysqli_real_escape_string($connect,$_POST['email']);
  $name = mysqli_real_escape_string($connect,$_POST['name']);
  $ingredient = mysqli_real_escape_string($connect,$_POST['ingredient']);
  $title = mysqli_real_escape_string($connect,$_POST['title']);

  // write query
  $mysql = "INSERT INTO practice(email,name,ingredient,type) VALUES('$email','$name','$ingredient','$title')";

  if (mysqli_query($connect,$mysql)) {
    //echo "success";
     header("location: index.php");
  } else{
    echo "query error: " . mysqli_error($connect);

  }
} 

}//form validattion



?>




<?php include("templates/header.php"); ?>

<div class="container  grey-text">
  <h4 class="flow-text center">PLACE YOUR ORDER</h4>
<form class="white" action="add.php" method="post" >
      <label>Name:</label>
      <input name="name" type="text" value="<?php echo htmlspecialchars($name); ?>">
      <div class="red-text"><?php echo $erroMsg['name']; ?></div>
      <label>Type of sharwama</label>
      <input name="title" type="text" value="<?php echo htmlspecialchars($title); ?>">
      <div class="red-text"><?php echo $erroMsg['title']; ?></div>
      <label>Email</label>
      <input name="email" type="email" value="<?php echo htmlspecialchars($email); ?>">
      <div class="red-text"><?php echo $erroMsg['email']; ?></div>
      <label>ingredient</label>
      <input type="text" name="ingredient" value="<?php echo htmlspecialchars($ingredient); ?>">
      <div class="red-text"><?php echo $erroMsg['ingredient']; ?></div>
      <div class="input-field  center-align">
        <input type="submit" value="submit" name="submit" class="btn logo">
      </div>
  </form>
</div>


<?php include("templates/footer.php"); ?>