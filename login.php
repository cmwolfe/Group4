<?php
	$Title = "Login";
	include_once('header.php');
?>

<div class="row">
<div class="col-xs-12">
<form action="loginprocess.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email"/>
    </div>
    
    <div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" name="password" id="password"/>
    </div>  

    <button type="submit" class="btn btn-default">Login</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->

<?php
include_once('footer.php');
?>