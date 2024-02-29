<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/otherusersstyle.css" rel="stylesheet" type="text/css" />
	<title>Bodybuilders | Other users</title>
</head>
<body>
	<header></header>

	<nav class="navbar navbar-expand-xl navbar-dark bg-black">        
            <div class="container-fluid">
              <ul class="navbar-nav mr-auto">  
                <li class="nav-item active">
                  <a class="nav-link" href="home.php" style="font-size: 19px; filter: brightness(95%);">HOME</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="otherusers.php" style="font-size: 19px; filter: brightness(95%);">OTHER USERS</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="logout.php" style="font-size: 19px; filter: brightness(85%); color: gold;">LOG OUT</a>
                </li>
              </ul>
            </div>
          </nav>

	<div class="text">
		<h1>OTHER USERS</h1>
	</div>

	<div class="users">

<?php
session_start();
// Muodostetaan yhteys.
include ("./connect.php"); // Linkki: luodaan yhteys.
// Tarkistetaan, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION['loggedin'])) {
	exit('Please log in first!');
}

// Haetaan kaikki käyttäjät tietokannasta
if ($stmt = $con->prepare('SELECT username FROM accounts')) {
	$stmt->execute();
	$stmt->bind_result($username);
	while ($stmt->fetch()) {
		echo $username . '<br>';
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$con->close();
?>

	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>