<?php
require_once "config.php";

if(isset($_POST['submitDelete'])) {
	$sql = "DELETE FROM products WHERE id = ?";

	if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_id);

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
<form method="post">
	<table cellpadding="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id" value=<?php echo $_GET['id']; ?> readonly="readonly"></td>
		</tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Delete" name="submitDelete"></td>
		</tr>
	</table>
</form>
