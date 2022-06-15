<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "j4159841598";
$dbname = "db_class";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['books_ID'])) {
    $books_ID = $_POST['books_ID'];
	$sql_q1 = "select * from books where ID = '$books_ID';";
	$result1 = mysqli_query($conn,$sql_q1);

    if($result1){
        if($result1->num_rows > 0){
            echo "ID   Name    Catergory    publisher_ID    writer  traslator      version  price   date_of_publish intro   pages   size_l  size_w  size_h  language    binding<br>";
            while($row = $result1->fetch_assoc()) {
                echo $row[ID]. $row[name]. $row[catergory]. $row[publisher_ID]. $row[writer]. $row[traslator]. $row[version]. $row[price]. $row[date_of_publish]. $row[intro]. $row[pages]. $row[size_l]. $row[size_w]. $row[size_h]. $row[language]. $row[binding]. "<br>";
            }
        }
    }
    else{
    printf('error input<br>');
    }

}else{
	echo "資料不完全";
}
mysqli_free_result($result1);

$conn→close();	
				
?>

