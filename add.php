<?php
require_once "config.php";

if(isset($_POST['submitSave'])) {

	$sql = "INSERT INTO products (name, image, price) VALUES (?, ?, ?)";

	if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_image, $param_price);

            $param_name = $_POST['name'];
            $param_image = $_POST['image'];
            $param_price = $_POST['price'];

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
}
?>
<form method="post">
	<table cellpadding="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id"></td>
		</tr>
    <tr>
      <td>Image</td>
			<td><input type="text" name="image"></td>
		</tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>price</td>
			<td><input type="text" name="price"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Save" name="submitSave"></td>
		</tr>
	</table>
</form>
