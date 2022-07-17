<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- This is the default encoding type for the Html Form post submission. 
  Encoding type tells the browser how the form data should be encoded before 
  sending the form data to the server. 
  https://www.logicbig.com/quick-info/http/application_x-www-form-urlencoded.html-->
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
  <link rel="stylesheet" href="ss.css">
  <title>PHP MUSIC DATABASE</title>
</head>

<body>
  <!-- 
    PHP code for retrieving data from the database.
  -->
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "music-db";

  // Create server connection.
  // The MySQLi Extension (MySQL Improved) is a relational database driver 
  // used in the PHP scripting language to provide an interface with MySQL 
  // databases (https://en.wikipedia.org/wiki/MySQLi).
  // Instances of classes are created using `new`.
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check server connection.
  // -> is used to call a method or access a property the instance of a class,
  // in our case the connection conn we created calls the built in connect_error
  // method available to all connections.
  // Note the difference to =>, which is used for arrow functions, a more 
  // concise syntax for anonymous functions (which we will also see in JavaScript).
  // See https://stackoverflow.com/questions/14037290/what-does-this-mean-in-php-or/14037320.
  if ($conn->connect_error) {
    // Exit with the error message.
    // . is used to concatenate strings.
    die("Connection failed: " . $conn->connect_error);
  }

  // `isset` — Function to determine if a variable is declared and is different than null.
  // Generally, check out the PHP documentation. It is really good.
  // E.g., https://www.php.net/manual/en/function.isset.php
  // $_REQUEST is a PHP super global variable which is used to collect data 
  // after submitting an HTML form.
  // https://www.w3schools.com/PHP/php_superglobals_request.asp
  // Some predefined variables in PHP are "superglobals", which means that 
  // they are always accessible, regardless of scope - and you can access them 
  // from any function, class or file without having to do anything special.
  // https://www.w3schools.com/PHP/php_superglobals.asp

  // HERE IS THE CODE WHICH RETRIEVES SONG RATINGS
  if(isset($_REQUEST["submit"])){
    // Variables for the output and the web form below.
    $out_value = "";
    $s_user = $_GET['username'];
    // The following is the core part of this script where we connect PHP
    // and SQL.
    // Check that the user entered data in the form.
    if(!empty($s_user)){
      // If so, prepare SQL query with the data.
      $sql_query = "SELECT * FROM ratings WHERE username = ('$s_user')";
      // Send the query and obtain the result.
      // mysqli_query performs a query against the database.
      $result = mysqli_query($conn, $sql_query);
      // mysqli_fetch_assoc returns an associative array that corresponds to the 
      // fetched row or NULL if there are no more rows.
      // Probably does not make much of a difference here, but, e.g., if there are
      // multiple rows returned, you can iterate over those with a loop.
      foreach($result as $row){
        $out_value = $out_value . $row['song'] . " -> " . $row['rating'] . "\n";
      }
      // conditional here to check if there even are any songs
      if(empty($out_value)){
        $out_value = "This username has not rated any songs yet.";
      }
    }
  }

  // HERE IS THE CODE THAT REGISTERS NEW USERS
  if (isset($_POST["submit"])){
    // $out val reg must be diff than out val for the other form
    $out_value_registration = "";
    $new_user = $_POST['username'];
    $new_pass = $_POST['password'];
    if(!empty($new_user) && !empty($new_pass)){
      $sql_query = "INSERT INTO users (username, password) VALUES ('$new_user', '$new_pass')";
      $user_exists = mysqli_query($conn, "SELECT * FROM users WHERE username = ('$new_user')");
      if (mysqli_num_rows($user_exists) > 0) {
        $out_value_registration = "This username exists already.";
      }
      else {
        $result = mysqli_query($conn, $sql_query);
        $out_value_registration = "You have been registered.";
      }
    }
    else {
      $out_value_registration = "Fill in all information please.";
    }
  }
  $conn->close();
?>

  <!-- 
    HTML code 
    -->
  <div class="form_container">
    <h3> Song Ratings via Username</h3>
    <form method="GET" action="">
      Username: <input type="text" name="username" placeholder="Enter username" /><br>
      <input type="submit" name="submit" value="Retrieve"/>
      <p><?php
        if(!empty($out_value)){
          echo nl2br($out_value);
        }
      ?></p>
    </form>
  </div>
  
  <br>
  <div class="form_container">
    <h3> User Registration</h3>
    <form method="POST" action="">
      Username: <input type="text" name="username" placeholder="Enter username" /><br>
      Password: <input type="text" name="password" placeholder="Enter password" /><br>
      <input type="submit" name="submit" value="Register"/>
      <p><?php
        if(!empty($out_value_registration)){
          echo $out_value_registration;
        }
      ?></p>
    </form>
  </div>
</body>
</html>