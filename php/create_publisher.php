<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "db_project";
$dbname = "db_project";

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

if (isset($_POST['ID']) && isset($_POST['name']) && isset($_POST['content'])) {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $content = $_POST['content'];

    $sql_q1 = "insert into publisher values ( '$ID', '$name', '$contact' );";
	$result1 = mysqli_query($conn,$sql_q1);
    if($result1){
        echo "新增成功<br>";
    }

}else{
	echo "資料不完全<br>";
}
mysqli_free_result($result1);
$conn→close();	
				
?>

