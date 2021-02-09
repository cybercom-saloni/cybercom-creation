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
  <h3>Create Contact</h3>
  <hr>
  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
    <form class="form-group" action="contact-add-process.php" enctype="multipart/form-data" id="contact" method="post" onsubmit="return validation()">
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
          <input type="text" name="name" id="name" placeholder="John Doe" class="form-control" onchange="validatename(this.id)">
          <br><span id="span_name" class="red"></span>
        </div>

        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <input type="text" name="email" id="email" placeholder="johndoe@gmail.com" class="form-control" onchange="validate_email(this.id)">
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
          <input type="text" name="mobileno" id="mobileno" placeholder="9412134421" class="form-control" onchange="validate_phone(this.id)">
           <br><span id="span_mobileno" class="red"></span>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
          <input type="text" name="employee"  id="employee" placeholder="Employee" class="form-control" onchange="validate_employee(this.id)">
           <br><span id="span_employee" class="red"></span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <label>Created</label>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <label>profile</label>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <input type="datetime-local" name="created" id="created" placeholder="06/02/2021 19:00" class="form-control" onchange="validate_date(this.id)">
           <br><span id="span_created" class="red"></span>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
           <input type="file" name="filetoupload" id="filetoupload">
           <br><span id="span_file" class="red"></span>
        </div>
      </div>
      <br>
      <input type="submit" name="submit" class="btn-lg btn-success" value="Create">
    </form>
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/contact-add.js"></script>
</html>