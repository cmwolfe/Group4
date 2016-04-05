<?php
   	$Title = "Login Please";
	include_once('header.php');

    // get data from fields
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // check that we have an email
    if (!$email) {
        echo "Hey, you didn't add an email. Please <a href='login.php'>try again</a>";
        exit;
    }
    
        // check that we have an email
    if (!$password) {
        echo "No password received";
		exit;
    }
    
    // get hashed password based on email
    $query = "select hashedPass from people where email='" . $email . "'";
    $result = $db->query($query);
    if ($result) {
        $numberofrows = $result->num_rows;
        $row = $result->fetch_assoc();
        if ($numberofrows > 0) {
            $hashedPass = $row['hashedPass'];
            
            // check if the password matches the hashed version in the database
            // for version 5.5 or later we would use
            // if (password_verify($password, $hashedPass)) {
            if ($hashedPass == crypt($password, $hashedPass)) {
                // we have verified the password
                session_start();
                $_SESSION['email'] = $email;
				// Below (replace input.php with content page)
                //header("Location: " . $baseURL . "input.php");
            } else {
                // wrong password
                reportErrorAndDie("Wrong password. <a href='login.php'>Try again</a>.<p>" . $db->error, $query);
            }
        } else {
            reportErrorAndDie("Email not in our system. <a href='login.php'>Try again</a>.<p>" . $db->error, $query);
        }
    } else {
        reportErrorAndDie("Could not run authorization.<p>" . $db->error, $query);
    }
	
    include_once('footer.php');
?>