<!DOCTYPE html>

<?php 

include('db/user.php');
include('db/posts.php');
if(!isset($_SESSION['name']) || !isset($_SESSION['id'])){
    echo "Not logged in. Go back to <a href='index.php'> Front page </a>";
    exit();
}
?>

<html>
	<head>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/gif" href="images/favIcon.gif">
		<title>DogeBook</title>
	</head>
<body>
    <div id="header">
    	<div id="logo">
        	<a href="index.php">
            	<p>DogeBook</p>
        	</a>
        </div>
    
                    
                <div id="logout-button">
                    <form action="logout.php">
                        <input id="logout" type="submit" name="logoutsubmit" value="Logout"></input>
                    </form>
                </div>
			
                
		</div>


	