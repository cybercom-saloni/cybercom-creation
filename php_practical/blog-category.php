<?php
session_start();
if(!isset($_GET['msg']))
{
	echo "<script type='text/javascript'>alert('Direct URL Called.');</script>";
	header("refresh:0; url=index.php");
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLOG APPLICATION</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="css/blog.css">
</head>
<body>
	<!-- header file -->
<?php require'header.php';?>
  <!-- body -->
  <div class="container">
  <h3 class="text-secondary"><b>ADD CATEGORY</b></h3>
  <hr>
  <a href="blog-category-add.php?msg=true" class="btn-lg btn-success" name="add_cat">Add Category</a><br> <br> <br>  
  <table class="table"> 
      <thead class="table-dark table-heading-color"> 
          <th>Category id</th>
          <th>Category Image</th>
          <th>Category Name</th>
          <th>Created Date</th>
          <th colspan="2">Action</th>
         
      </thead>
       
        <?php
          require 'connection/databaseconnection.php';
          $start=0;
          $limit = 5; 
          $page="";
          if(isset($_GET['page'])){
             $page=$_GET['page'];
             $start=($page-1)*$limit;
          }else{
            $page=1;
          }
          
          
          $query_pagination ="SELECT * FROM `category` WHERE status=1 LIMIT $start,$limit";
          $rs_pagination=mysqli_query($connection,$query_pagination);
          $row_pagination=mysqli_num_rows($rs_pagination);
          // echo $row_pagination;
          if($row_pagination>0){
          while($row_page=mysqli_fetch_assoc($rs_pagination)){
        ?>
        <tr class="table-dark"> 
          <td><?php echo $row_page['catid']; ?></td>
          <?php
          $catid=$row_page['catid'];
          $parentcatid=$row_page['parentcatid'];

          $query1="SELECT *  FROM `category`  JOIN `blog_post` ON `blog_post`.`blogid`=`category`.`parentcatid` WHERE catid='$catid'";
          // echo $query1;
          $rs1=mysqli_query($connection,$query1);
              if(mysqli_num_rows($rs1)>0){
                while($row1=mysqli_fetch_assoc($rs1)){
                  $image=$row1['image'];
                // echo $image;
                }
            }
          ?>
           <td> <img  src="<?php echo $row1['image'];?>" alt="Preview Image" width="200" height="400" />
          </td>
          <td><?php echo $row_page['createdAt']; ?></td>
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
    $query_select ="SELECT * FROM `category` WHERE status=1";
    // echo $query_select;
    $rs_select=mysqli_query($connection,$query_select);
    $row_select=mysqli_num_rows($rs_select);
    $total=ceil($row_select/$limit);
    $pagLink = "";       
    
    if($page>1){   
      echo "<li class='page-item'><a href='blog-category.php?page=".($page-1)."'> Previous </a></li>";   
     }       
    for ($i=1; $i<=$total; $i++) {   
          if ($i == $page) {   
            $pagLink .= "<li class='page-item'><a class = 'active' href='blog-category.php?page=".$i."'>".$i." </a></li>";   
          }else  {   
              $pagLink .= "<li class='page-item'><a href='blog-category.php?page=".$i."'>".$i." </a></li>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total){   
            echo "<li class='page-item'><a href='blog-category.php?page=".($page+1)."'>  Next </a></li>";   
        }   

   ?>
   </ul>
</nav>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>

<?php
}
?>