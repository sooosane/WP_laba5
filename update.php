<?php
require_once "config.php";

$sql = "SELECT * FROM products";
if($result = mysqli_query($link, $sql)){
	while($row = mysqli_fetch_array($result)) {
		if($row['id']==$_GET['id']){
			$id = $row['id'];
			$name = $row['name'];
			$price = $row['price'];
	    $image = $row['image'];
			break;
		}
	}
}

if(isset($_POST['submitSave'])) {
	$sql = "UPDATE products SET name = ?, image = ?, price = ? WHERE id = ?";

	if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $_POST['name'], $_POST['image'], $_POST['price'], $param_id);

            $param_id = $_POST['id'];

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
}

?>
<body>
	<div style = "box-sizing: border-box;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);">
		<form method="post">
			<table cellpadding="2" cellspacing="2">
				<tr>
					<td>Id</td>
					<td><input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"></td>
				</tr>
		    <tr>
					<td>Image</td>
					<td><input type="text" name="image" value="<?php echo $image; ?>"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
				</tr>
				<tr>
					<td>price</td>
					<td><input type="text" name="price" value="<?php echo $price; ?>"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Save" name="submitSave"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
