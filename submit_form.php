<?php
$servername = "localhost";
$username = "root";
$password = "abcd1234";
$dbname = "userdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $studentid = $_POST['studentid'];
    $date = $_POST['birthdate'];
    $gender = $_POST['gender'];
   

    $sql = "INSERT INTO regdata_table (fullname, email, studentid, birthdate,  gender)
            VALUES ('$fullname', '$email', '$studentid', '$birthdate', '$gender')";



    $sql2 = "SELECT * FROM registerdb.regdata_table"; 

    $result = $conn->query($sql2);

    if($result== true){ 
        if ($result->num_rows > 0) {
           $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
           $msg= $row;
        } else {
           $msg= "No Data Found"; 
        }
       }else{
         $msg= mysqli_error($conn);
       }



    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    
}

$conn->close();
?>
