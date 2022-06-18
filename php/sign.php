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

if (isset($_POST['account']) && isset($_POST['password'])) {
	$account = $_POST['account'];
	$password = $_POST['password'];

	$sql_q1 = "select password from user where ID = $account;";	// ******** update your personal settings ******** 
	$result = mysqli_query($conn,$sql_q1); 
	if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

			if($row[password] == $password ){
				// echo "<script>
				// 	console.log($account);
				// </script>";
				header("Location: ../html/2_clerk.html");
				exit;   
			}
			else{
				echo  "<script type='text/javascript'>alert('密碼錯誤!!');
						window.location.href='1_login.html'
						</script>";
			}
			     
        }
    }
	else if($result->num_rows == 0){
		echo  "<script type='text/javascript'>alert('無此帳號!!');
				window.location.href='1_login.html'
				</script>";
	}
	else{
		echo "連結失敗";
	}

}else{
	echo "資料不完全";
	echo $account;
	
}
mysqli_free_result($result);
$conn→close();		
?>

