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

if (isset($_POST['choice'])) {
    $choice = $_POST['choice'];
	$sql_q1 = "select A.book_ID, B.name, sum(A.amount) from books_trans as A, books as B where A.book_ID = B.ID group by A.book_ID, B.name ORDER BY sum(amount) ASC;";
    $sql_q2 = "select A.book_ID, B.name, sum(A.amount) from books_trans as A, books as B where A.book_ID = B.ID group by A.book_ID, B.name ORDER BY sum(amount) DESC;";
	$result1 = mysqli_query($conn,$sql_q1);
    $result2 = mysqli_query($conn,$sql_q2);
    if(choice == 1){
        if($result1->num_rows > 0){
            echo "Book_ID   Name    amount<br>";
            while($row = $result1->fetch_assoc()) {
                echo $row[book_ID] . $row[name] . $row[sum(A.amount)];
            }
        }
    }
    else if(choice == 2){
        if($result2->num_rows > 0){
            echo "Book_ID   Name    amount<br>";
            while($row = $result2->fetch_assoc()) {
                echo $row[book_ID] . $row[name] . $row[sum(A.amount)];
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
mysqli_free_result($result2);
$conn→close();	
				
?>

