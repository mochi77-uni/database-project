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

if (isset($_POST['book_ID']) && isset($_POST['name']) && isset($_POST['catergory']) && isset($_POST['publisher_ID']) && isset($_POST['writer']) && isset($_POST['translator']) && isset($_POST['version']) && isset($_POST['price']) && isset($_POST['data_of_publish']) && isset($_POST['intro']) && isset($_POST['pages']) && isset($_POST['size_l'])  && isset($_POST['size_w']) && isset($_POST['size_h']) && isset($_POST['language']) && isset($_POST['binding'])) {
    $book_ID = $_POST['book_ID'];
    $name = $_POST['name'];
    $catergory = $_POST['catergory'];
    $publisher_ID = $_POST['publisher_ID'];
    $writer = $_POST['writer'];
    $traslator = $_POST['translator'];
    $version = $_POST['version'];
    $price = $_POST['price'];
    $data_of_publish = $_POST['data_of_publish'];
    $intro = $_POST['intro'];
    $pages = $_POST['pages'];
    $size_l = $_POST['size_l'];
    $size_w = $_POST['size_w'];
    $size_h = $_POST['size_h'];
    $language = $_POST['language'];
    $binding = $_POST['binding'];
	$sql_q1 = "insert into books values ('$ID', '$name', '$catergory', '$publisher_ID', '$writer', '$traslator', '$version', '$price', '$data_of_publish', '$intro', '$pages', '$size_l', '$size_w', '$size_h', '$language', '$binding' );";
	$result1 = mysqli_query($conn,$sql_q1);
    if($result1){
        echo "新增成功<br>";
    }

}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
$conn→close();				
?>

