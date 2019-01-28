<?php
include ($_SERVER['DOCUMENT_ROOT'] ."/catalog/sites/loginsite/session.php");
require ($_SERVER['DOCUMENT_ROOT'] ."/catalog/databaseaccess/accessdatabase.php");
	if (!empty($_POST['delete'])) {
			$id=$_POST['delete'];
			pg_query($db_connectiontocatalog,"DELETE FROM phones WHERE id='$id'");
		}
	if(array_key_exists('save', $_POST)){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		if(isset($_POST['stock'])){
			$stock='true';
		}
		else{
		$stock='false';
	}
		$brand=$_POST['brand'];
		pg_query($db_connectiontocatalog, "UPDATE phones SET (name,price,stock,brand) = ('$name','$price','$stock','$brand') WHERE id=$id");
	}
	if(array_key_exists('add', $_POST)){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		if(isset($_POST['stock'])){
			$stock='true';
		}
		else{
		$stock='false';
	}
		$brand=$_POST['brand'];
		pg_query($db_connectiontocatalog, "INSERT INTO phones (id,name,price,stock,brand) VALUES ('$id','$name','$price','$stock','$brand')");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Termék katalógus</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<script type="text/javascript">
	function toggleSidebar(){
		document.getElementById("sidebar").classList.toggle('active');
	}
	function toggleSidebar2(){
		document.getElementById("sidebar2").classList.toggle('active2');
	}
</script>
<body>
		<div id="sidebar">
		<div class="toggle-btn" onclick="toggleSidebar()">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<ul>
			<a href="../../sites/logoutsite/logout.php"><li>Kijelentkezés</li></a>
			<li><input id="sidesearch" type="text" placeholder="Keresés.." name="search" width="230px"></li>
		</ul>
	</div>
	<div class="container">
		<h1 class="text-center">Termék katalógus</h1>
	<hr align="center">
	<div class="row" align="center">
	<?php
	require($_SERVER['DOCUMENT_ROOT'] ."/catalog/sites/adminsite/admincontroller.php");
	$adminaccess = new AdminController();
	echo $adminaccess->CreateAdminTables();
	?>
	<div class='col-md-4 product-grid'>
			<div class='image'>
				<a href='../../sites/addsite/addsite.php'><img src='../../pictures/rsz_add.png' class='col-12'></a>
		</div>
		<a href="../../sites/addsite/addsite.php"><h3><font color="black">Új termék hozzáadása</font></h3></a>
		</div>
	</div>
</div>
</body>
</html>