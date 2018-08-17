<!DOCTYPE html>
<html lang="en">
<head>
  <title>IDK | Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../index.php"><img src="../img/idk.jpg" length="100" width="50"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="../">Home</a></li>
                <li><a href="../php/features.php">Features</a></li>
                <li class="active"><a href="../php/contact.php">Contact</a></li>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

<div class="container">
  <h2>Tell us about yourself.</h2>
  <form class="form-horizontal" action="contact.php" method="post">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" placeholder="First name *" name="fname" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lname" placeholder="Last name *" name="lname" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Email *" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" id="company" placeholder="Company name *" name="company" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="number" class="form-control" id="size" placeholder="Company size*" name="size" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" id="job" placeholder="Job role*" name="job" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="tel" class="form-control" id="phone" placeholder="Phone*" name="phone" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" id="country" placeholder="Country*" name="country" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-10">
        <input type="hidden" name="fill" value="y" />
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>

<?

$fill = $_POST["fill"];
$fn = $_POST{"fname"};
$ln = $_POST{"lname"};
$mail = $_POST["email"];
$com = $_POST["company"];
$s = $_POST["size"];
$r = $_POST["job"];
$tel = $_POST["phone"];
$co =$_POST["country"];

if ($fill == "y") {
	createDB();
	createTable();
	insertContact($fn, $ln, $mail, $com, $s, $r, $tel, $co);
}

function createDB() {
	$servername = "localhost";
	$username = "jeehtove_intelli";
	$password = "intellimeans";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("<center>Connection failed: " . $conn->connect_error . "</center><br>");
	} 

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS jeehtove_intellimeans";
	if ($conn->query($sql) === TRUE) {
	    //echo "<center>Database created successfully.</center><br>";
	} else {
	    echo "<center>Error creating database: " . $conn->error . "</center><br>";
	}

	$conn->close();
}

function createTable() {
	$servername = "localhost";
	$username = "jeehtove_intelli";
	$password = "intellimeans";
	$dbname = "jeehtove_intellimeans";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS Contacts (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	company VARCHAR(50),
	size VARCHAR(50),
	role VARCHAR(50),
	phone VARCHAR(50),
	country VARCHAR(50),
	reg_date VARCHAR(50)
	)";

	if ($conn->query($sql) === TRUE) {
	    //echo "<center>Table Contacts created successfully.</center><br>";
	} else {
	    echo "<center>Error creating table: " . $conn->error . "</center><br>";
	}

	$conn->close();
}

function insertContact($fname, $lname, $email, $company, $size, $role, $phone, $country) {
	$servername = "localhost";
	$username = "jeehtove_intelli";
	$password = "intellimeans";
	$dbname = "jeehtove_intellimeans";
	
	$time = time();

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO Contacts (firstname, lastname, email, company, size, role, phone, country, reg_date)
	VALUES ('$fname', '$lname', '$email', '$company', '$size', '$role', '$phone', '$country', '$time')";

	if ($conn->query($sql) === TRUE) {
	    echo "<center>Thanks for giving us some information about you and your company. We will be in touch with you soon!</center><br>";
	} else {
	    echo "<center>Error: " . $sql . "<br>" . $conn->error . "</center><br>";
	}

	$conn->close();
}
?>