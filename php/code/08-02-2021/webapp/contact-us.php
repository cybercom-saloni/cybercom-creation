<!DOCTYPE html>
<html>
<head>
	<title>WEBAPP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/contact.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
</head>
<body>

  <!-- header file -->
<?php require'navbar/header.php';?>
  <!-- body -->
<div class="container">
  <h3 class="text-secondary"><b>Read contact</b></h3>
  <hr>
  <a href="contact-add.php" class="btn-lg btn-success" name="add_contact">Create Contact</a><br> <br> <br>  
  <table class="table"> 
      <thead class="table-dark table-heading-color"> 
          <th>id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Title</th>
          <th>Created</th>
          <th colspan="2">Action</th>
         
      </thead>
       
        <?php
          require 'databaseconnection.php';
          $start=0;
          $limit = 5; 
          $page="";
          if(isset($_GET['page'])){
             $page=$_GET['page'];
             $start=($page-1)*$limit;
          }else{
            $page=1;
          }
          
          
          $query_pagination ="SELECT * FROM `webapp` LIMIT $start,$limit";
          $rs_pagination=mysqli_query($connection,$query_pagination);
          $row_pagination=mysqli_num_rows($rs_pagination);
          // echo $row_pagination;
          if($row_pagination>0){
          while($row_page=mysqli_fetch_assoc($rs_pagination)){
        ?>
        <tr class="table-dark"> 
          <td><?php echo $row_page['id']; ?></td>
          <td><?php echo $row_page['name']; ?></td>
          <td><?php echo $row_page['email']; ?></td>
          <td><?php echo $row_page['mobileno']; ?></td>
          <td><?php echo $row_page['title']; ?></td>
          <td><?php echo $row_page['created']; ?></td>
          <td class="box_edit"><a href="contact-edit.php?id=<?php echo $row_page['id'];?>"><span class="glyphicon glyphicon-pencil white"></span></a></td>
          <td class="box_delete"><a href="#" id="<?php echo $row_page['id']; ?>" class="delete" title="Delete" style="color:red;"><span class="action glyphicon glyphicon-trash white"></span></a></td>
           <div id="div1"></div>
      </tr>
        <?php
            }
          }
        ?>
          
  </table>
</div>

<!-- footer :pagination of  -->
<nav aria-label="..." style="text-align: right">
  <ul class="pagination pagination-lg text-right" >
  <?php
    $query_select ="SELECT * FROM `webapp`";
    // echo $query_select;
    $rs_select=mysqli_query($connection,$query_select);
    $row_select=mysqli_num_rows($rs_select);
    $total=ceil($row_select/$limit);
    $pagLink = "";       
    // for($i=1;$i<=$total;$i++){
    //   echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
    // }
    if($page>1){   
      echo "<li class='page-item'><a href='contact-us.php?page=".($page-1)."'> Previous </a></li>";   
     }       
    for ($i=1; $i<=$total; $i++) {   
          if ($i == $page) {   
            $pagLink .= "<li class='page-item'><a class = 'active' href='contact-us.php?page=".$i."'>".$i." </a></li>";   
          }else  {   
              $pagLink .= "<li class='page-item'><a href='contact-us.php?page=".$i."'>".$i." </a></li>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total){   
            echo "<li class='page-item'><a href='contact-us.php?page=".($page+1)."'>  Next </a></li>";   
        }   

   ?>
   </ul>
</nav>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // alert("click");
      $(".delete").click(function(e){
  // alert("call");
      var element = $(this);
      var del_id = element.attr("id");
      var info = 'id=' + del_id;
      // alert("hi");
      // alert(info);
      if(confirm("Are you sure you want to delete this?"))
      {
       $.ajax({
         type: "POST",
         url: "contact-delete.php",
         data: info,
          success: function (response) {
                  console.log(response);
                
                   if(response=="success"){
                    // alert(response);
                 swal("Success","INSERTED","success");
                  // location.reload();
                    }else{
                    // alert(response);
                 swal("Oops",response,"error");
                 location.reload();
                    }

       }
      });
       }
      return false;
    });
});
</script>
</html>