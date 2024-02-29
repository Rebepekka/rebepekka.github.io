<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/otherusersstyle.css" rel="stylesheet" type="text/css" />
	<title>Document</title>
</head>
<body>
<header>
	<a href="index.html"><h1>BODYBUILDERS</h1></a>
	</header>
<div class="container">
			<div class="headline">
				<p>OTHER USERS</p>
			</div>
                <!-- Linkit uloskirjautumiseen ja etusivulle -->
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

	<div class="users">

<?php
session_start();
// $initials=parse_ini_file("./.ht.settings.ini");
// Muodostetaan yhteys.
include ("./connect.php"); // Linkki: luodaan yhteys.
// $con=mysqli_connect($initials["host"], $initials["user"], $initials["pass"], $initials["name"]);
// if (mysqli_connect_errno()) {
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
// }
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
</div>
<footer>
    <address>BODYBUILDERS<br>Punttikuja 313<br>12345 PUNTTILA</address>
</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>