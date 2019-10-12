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

     $sql = "SELECT * FROM lecturers";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             echo $row["name"].";";
         }
     } else {
         echo "0 results";
     }
     $conn->close();
 }

 function getLeaderboard(){
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

     $sql = "SELECT * FROM lecturers";
     $result = $conn->query($sql);


     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $id = $row["id"];
             $count = "SELECT * FROM lecture_trivial_count WHERE lecturer_id=$id";
             $count_result = $conn->query($count);
             echo ";".$row["name"]. "|";
             while($lecturecount = $count_result->fetch_assoc()) {
                 echo $counter = $lecturecount["trivial_count"].",";
             }
             //echo $row["name"]."|".$counter.";";
         }
     } else {
         echo "0 results";
     }
     $conn->close();
 }

 function getId($name){
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

     $sql = "SELECT * FROM lecturers";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             if($row["name"] === $name){
                 $id = $row["id"];
                 $count = "SELECT * FROM lecture_trivial_count WHERE lecturer_id=$id";
                 $count_result = $conn->query($count);
                 while($lecturecount = $count_result->fetch_assoc()) {
                     echo $lecturecount["trivial_count"].";";
                 }

                 // echo $count_result["trivial_count"];

             }
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
