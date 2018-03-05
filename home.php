<?php require_once 'actions/db_connect.php';

?>
 <?php
 ob_start();
 session_start();
 require_once 'db_connect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
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

    <style type="text/css">
        .manageUser {
            width: 50%;
            margin: auto;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

    </style>

</head>
<body>

    <div class="manageUser">
    <a href="create.php"><button type="button">Add User</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of birth</th>
                <th>Active</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM user WHERE active = 0";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['first_name']." ".$row['last_name']."</td>
                        <td>".$row['date_of_birth']."</td>
                        <td>
                            <a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>
                            <a href='delete.php?id=".$row['id']."'><button type='button'>Delete</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>

        </tbody>
    </table>

</div>
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

 
 <a href="logout.php?logout">Sign Out</a>
</body>
</html>
