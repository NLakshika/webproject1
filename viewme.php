<!DOCTYPE html>
<html>
<head>
  <title>Student Data</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: #588c7e;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }
    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #588c7e;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h2>Student Data</h2>
  <table>
    <tr>
      <th>Student ID</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Birth Date</th>
      <th>Gender</th>
    </tr>

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

    $sql = "SELECT * FROM regdata_table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["studentid"]. "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["gender"]. "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No data found";
    }
    $conn->close();
    ?>
  </table>
</body>
</html>
