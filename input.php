<!-- This is the form for entering soccer players -->

<?php
	$menuActive=2;
	include_once('config.php');
	include_once('dbutils.php');
	include_once('logincheck.php');
	include_once('header.php');
	
?>

<?php
	// Generating pull down menu for club teams
	
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT id, artistname, hometown FROM hw4Favorite_Artists ORDER BY artistname;";
	
	// run the query
	$result = queryDB($query, $db);
	
	// options for club teams
	$artistOptions = "";
	
	// go through all club teams and put together pull down menu
	while ($row = nextTuple($result)) {
		$artistOptions .= "\t\t\t";
		$artistOptions .= "<option value='";
		$artistOptions .= $row['id'] . "'>" . $row['artistname'] . " (" . $row['hometown'] . ")</option>\n";
	}
?>

<html>
<head>
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
	<h1><?php echo "Enter a song"; ?></h1>
</div>
</div>
</div>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['submit'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$songname = $_POST['songname'];
	$year_released = $_POST['year_released'];
	$artistid = $_POST['artistid'];
	
	// check to make sure we have a song name
	if (!$songname) {
		punt("Please enter a song name");
	}
	if (!$artistid) {
		punt("Please select an artist");
	}
	
	// set up my query
	//$query = "select artistid from hw4Favorite_Songs WHERE artistname="$artistname"";
	//$result = queryDB($query, $db);
	$query = "INSERT INTO hw4Favorite_Songs(artistid, songname, year_released) VALUES ('$artistid', '$songname', $year_released);";
	
	// run the query
	$result = queryDB($query, $db);
	
	// tell users that we added the player to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tThe soing " . $songname . " was added to the database\n";
	echo "</div></div>\n";
	
}
?>

<!-- Form to enter songs -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
	<label for="songname">Song Name</label>
	<input type="text" class="form-control" name="songname"/>
</div>

<div class="form-group">
	<label for="year_released">Year Released</label>
	<input type="text" class="form-control" name="year_released"/>
</div>

<div class="form-group">
	<label for="artistid">Artist</label>
	<select class="form-control" name="artistid">
<?php echo $artistOptions;?>
	</select>
</div>

</div>
<button type="submit" class="btn btn-default" name="submit">Add</button>

</form>

</div>
</div>

<!----------------->
<!---List players--->
<!----------------->
<div class="row">
<div class="col-xs-12">
	<h2><?php echo $Title ?></h2>
</div>
</div>

<div class="row">
<div class="col-xs-12">
<table class="table table-bordered">

<!-- Titles for table -->
<thead>
<tr>
	<th>Song Name</th>
	<th>Artist Name</th>
	<th>Year Released</th>
</tr>
</thead>

<tbody>
<?php
	// set up my query
	$query = "SELECT artistname, songname, year_released FROM hw4Favorite_Songs, hw4Favorite_Artists WHERE id=artistid;";
	//$query2 = "SELECT artistname FROM hw4Favorite_Artists WHERE "
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		$extra = $row['songname'];
		$extra1 = $row['artistname'];
		echo "\n <tr>";
		echo "<td>" . $row['artistname'] . "</td>";
		echo "<td>" . '<a href="https://www.youtube.com/results?search_query=' . $extra . '+' . $extra1 . '">' . $row['songname'] . "</a></td>";
		echo "<td>" . $row['year_released'] . "</td>";
		echo "</tr>";
	}
?>

</tbody>
</table>
</div>
</div>
<?php
include_once ('footer.php');	
?>
</div> <!-- closing bootstrap container -->
</body>
</html>

