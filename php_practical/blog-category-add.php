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
</head>
<body>
<h1>Add new Category</h1>
<form action="blog-category-add-process.php" method="post">
	<table>
	<tr>
		<td><label>Title</label></td>
		<td><input type="text" name="title"></td>
	</tr>
	<tr>
		<td><label>Name</label></td>
		<td><input type="text" name="Name"></td>
	</tr>
	<tr>
		<td><label>Parent category</label></td>
		<td><select name="parentcat">
			<?php
			require 'connection/databaseconnection.php';
			$query="SELECT `post_id`, `category_id` FROM `post_category`";
			$rs=mysqli_query($connection,$rs);
			if(mysqli_num_rows($rs)>0){
				while(mysqli_fetch_assoc($rs)){
					?>
					<option value="<?php ?>"></option>
					<?php
				}
			}
			?>
		</select></td>
	</tr>
	<tr>
		<td><label>Content</label></td>
		<td><textarea cols="20" rows="5" name="content"></textarea></td>
	</tr>
	<table>
	<tr>
		<td><label>url</label></td>
		<td><input type="text" name="url"></td>
	</tr>
	<tr>
		<td><label>meta title</label></td>
		<td><input type="text" name="metatitle"></td>
	</tr>
	<tr>
		<td><input type="submit" name="submit"></td>
	</tr>

</table>
</table>
</form>
</body>
</html>
<?php
}
?>