<?php require_once 'actions/db_connect.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>PHP CRUD</title>

</head>
<body>

 <?php 
 $result = $connect->query("SELECT first_name,last_name,active FROM user WHERE active = 0;");

    $outp = $result->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<table class='table table-striped'><thead><tr><th>first name</th><th>last name</th><th>Active</th></tr></thead>";
        foreach($outp as $row){
              echo "<tr><td>";
                echo $row['first_name'];
                echo "</td><td>";
                echo $row['last_name'];
                echo "</td><td>";
                echo $row['active'];
                echo "</td></tr>";
            }
            echo "</table>";
 ?>
  <?php 
    $result2 = $connect->query("SELECT first_name,last_name,active FROM user WHERE active = 1;");
    $outp2 = $result2->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<table class='table table-striped'><thead><tr><th>first name</th><th>last name</th><th>Active</th></tr></thead>";
        foreach($outp2 as $row2){
              echo "<tr><td>";
                echo $row2['first_name'];
                echo "</td><td>";
                echo $row2['last_name'];
                echo "</td><td>";
                echo $row2['active'];
                echo "</td></tr>";
            }
            echo "</table>";
 ?>
 
 <a href="login.php" class="btn btn-lg btn-info">Sign in</a>

</body>
</html>
