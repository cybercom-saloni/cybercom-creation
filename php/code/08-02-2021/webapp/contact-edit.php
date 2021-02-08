<?php
require 'connection/databaseconnection.php';
$id=$_GET['id'];
if(isset($_GET['id'])){
  $query="SELECT * FROM `webapp` WHERE id='".mysqli_real_escape_string($connection,$id)."'";
  $rs=mysqli_query($connection,$query);
  if(mysqli_num_rows($rs)>0){
    while($row=mysqli_fetch_assoc($rs)){
      $name=$row['name'];
      $email=$row['email'];
      $mobileno=$row['mobileno'];
      $title=$row['title'];
      $created=$row['created'];
      $date= date('Y-m-d\TH:i:s',strtotime($created));
      // echo $name.$email.$mobileno.$title.$created;
    }
  }
}else{
  header("location:contact-us.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WEBAPP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/contact-add.css">
</head>
<body>
<!-- header file -->
<?php require'navbar/header.php';?>
  <!-- body -->
  
<div class="container">
  <h3>Update Contact # <b><i><?php echo $id; ?></b></i></b></h3>
  <hr>
  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
    <form class="form-group" action="contact-edit-process.php?id=<?php echo $id; ?>" method="post" onsubmit="return validation()">
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <label>Name</label>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <label>Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <input type="text" name="name"  id="name" placeholder="John Doe" class="form-control" value="<?php echo $name; ?>">
           <br><span id="span_name" class="red"></span>
        </div>

        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <input type="text" name="email" id="email" placeholder="johndoe@gmail.com" class="form-control" value="<?php echo $email; ?>">
          <br><span id="emailids" class="red"> </span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <label>Phone</label>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <label>Title</label>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <input type="text" name="mobileno" id="mobileno" placeholder="9412134421" class="form-control"  value="<?php echo $mobileno; ?>">
          <br><span id="span_mobileno" class="red"></span>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <input type="text" name="employee" id="employee" placeholder="Employee" class="form-control" value="<?php echo $title; ?>">
          <br><span id="span_employee" class="red"></span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <label>Created</label>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
         <input type="datetime-local" name="created" id="created" placeholder="06/02/2021 19:00" class="form-control" value="<?php echo $date; ?>">
          <br><span id="span_created" class="red"></span>
        </div>
      </div>
      <br>
      <input type="submit" name="submit" class="btn-lg btn-success" value="Update">
    </form>
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/contact-add.js"></script>
</html>