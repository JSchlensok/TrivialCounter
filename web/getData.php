 <?php

 function getAll(){
     $servername = "remotemysql.com:3306";
     $username = "EFkSrBIiV0";
     $password = "hcr6jIgWk7";
     $dbname = "EFkSrBIiV0";

    // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT id, firstname, lastname FROM MyGuests";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             echo json_encode($row["id"]. ";" . $row["firstname"]. ";" . $row["lastname"]);
         }
     } else {
         echo "0 results";
     }
     $conn->close();

 }
 function getId(){
     $servername = "remotemysql.com:3306";
     $username = "EFkSrBIiV0";
     $password = "hcr6jIgWk7";
     $dbname = "EFkSrBIiV0";

    // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT id, firstname, lastname FROM MyGuests";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             echo json_encode($row["id"]. ";" . $row["firstname"]. ";" . $row["lastname"]);
         }
     } else {
         echo "0 results";
     }
     $conn->close();

 }
function asdf(){
    return "asdf";
}

?>
