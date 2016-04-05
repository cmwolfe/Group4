<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<?php
// This part is PHP: include system configuration file
include_once "config.php";
include_once('dbutils.php');
include_once('util.php');
?>

<!-- This part is HTML -->
<html>
<head>
	<link rev="made" href="mailto:<?php echo $Email; ?>">
	<title>
		<?php echo $Title; ?>
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

<body>

<div class="container">

<!-- Page header -->
<div class="row">
<div class="col-xs-12">
<div class="page-header">
<img src="<?php echo $Logo; ?>" alt='PhoneBook Logo' width=40 height=40>
	<h1><?php echo $Title ?></h1>
	
	<?php
		session_start();
		if (isset($_SESSION['email'])) {
	?>
	<!-- 
	<p><a href="inputartist.php">Artists</a> | <a href="input.php">Songs</a> | <a href="inputperson.php">Person</a> | <a href="logout.php">Logout</a></p> -->
	<?php
		}
	?>
</div>
</div>
</div>