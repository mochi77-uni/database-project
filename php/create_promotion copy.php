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

if (isset($_POST['start']) && isset($_POST['end']) && isset($_POST['content'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $content = $_POST['content'];
    $sql_q0 = "select ID from promotion where ID not in (select A.ID from promotion as A, promotion as B where  A.ID<B.ID );";
    $sql_q1 = "insert into promotion valus ( '$ID', '$start', '$end', '$content' );";
	$result0 = mysqli_query($conn,$sql_q0);
    while($row = $result1->fetch_row()) {
        $ID = $row[0];
    }
    $num = (int)$ID;
    $num = $num +１;
    $ID = (string)$num;
    $ID = str_pad($ID,5,"0",STR_PAD_LEFT);


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

