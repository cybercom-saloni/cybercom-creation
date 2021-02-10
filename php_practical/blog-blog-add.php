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
<form action="blog-blog-add-process.php" method="post" enctype="multipart/form-data">
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
		<td><label>parent category</label></td>
		<td><input type="text" name="parentcat"></td>
	</tr>
	<tr>
		<td><label>image</label></td>
		<td><input type="file" name="filetoupload" id="filetoupload">
           <br><span id="span_file" class="red"></span></td>
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