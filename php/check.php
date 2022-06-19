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

if (isset($_POST['product']) && isset($_POST['amount'])) {
    session_start();
	$product[] = $_POST['product'];
    $amount[] = $_POST['amount'];
    $store_ID = "00001";//need to confirm
    $j = count($product);
    $success = 0;
    for($i=0 ; $i<$j ; $i++){
        $sql_q1 = "select ID from books where '$product[$i]' = ID;";
        $result1 = mysqli_query($conn,$sql_q1);
        if($result1->num_rows > 0){
            $sql_q2 = "select number from storage where store_ID = $store_ID and books_ID = $product[$i];";
            $result2 = mysqli_query($conn,$sql_q2);
            while($row = $result2->fetch_assoc()) {
                if($row[number] > $amount[$i]){
                    $success++;
                }
                else{
                    echo "$store_ID". "店庫存僅有". $row["number"]. "，少". ($amount[$i]-$row["number"]) . "個<br>";    
                }           
                
            }
        }
        else {
            printf('沒有這本書<br>');
        }
    }
    if( $success == $j ){
        $_SESSION['product']=$product;
        header("Location: check2.php");
        exit;
    }
    

}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
mysqli_free_result($result2);
$conn→close();	
				
?>

