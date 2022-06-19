<!--localhost/database-project/html/1_login.php -->

<html>
<head>
	<title>書店首頁</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
	function nextpage(){		
		localStorage.setItem("id","local")
		localStorage.setItem("password","2")
		sessionStorage.setItem("id","session")
		sessionStorage.setItem("password","2")

		// window.location.href='2_clerk.html';
	}
</script>
<body>
	
	<h1 align="center">登入頁面</h1>
	<form  method="post">	
	  <table width="300" border="1" bgcolor="#cccccc" align="center">
		<tr>
		  <th>使用者ID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="account" value="00001" /></td>
		</tr>
		<tr>
		  <th>密碼</th>
		  <td bgcolor="#FFFFFF"><input type="password" name="password" value = "jimmyp" /></td>
		</tr>
        <tr>
            <th colspan="2"><input type="submit" value="登入" onclick="nextpage()"/></th>
            
          </tr>
  
	  </table>
	</form>
	
</body>
<?php

// ******** update your personal settings ******** 
$servername = "140.122.184.126";
$username = "team17";
$password = "k1PEco";
$dbname = "team17";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (mysql_set_charset('utf8')) {
    printf("Error loading character set utf8\n");
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['account']) && isset($_POST['password'])) {
	$account = $_POST['account'];
	$password = $_POST['password'];
	$authority = 0;
	$stroe_ID = "00001";

	$sql_q1 = "select password from user where ID = $account;";	// ******** update your personal settings ******** 
	$sql_q2 = "select authority from user where ID = $account;";
	$sql_q3 = "select store_ID from user where ID = $account;";
	$result = mysqli_query($conn,$sql_q1); 
	$result2 = mysqli_query($conn,$sql_q2); 
	$result3 = mysqli_query($conn,$sql_q3); 
	if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
			if($row[password] == $password ){
				if($result2->num_rows > 0) {
					while($row = $result2->fetch_row()) {
						$authority = $row[0];
					}
				}
				if($result3->num_rows > 0) {
					while($row = $result3->fetch_row()) {
						$store_ID = $row[0];
					}
				}
				session_start();
				$_SESSION["user_ID"]=$account;
				$_SESSION["authority"]=$authority;
				$_SESSION["store_ID"]=$store_ID;
				if( $authority == 0){
					header("Location: 2_clerk.html");
				}
				if( $authority == 1){
					header("Location: 3_administrator.html");
				}
				else{
					echo  "<script type='text/javascript'>alert('身分錯誤!!');
					window.location.href='1_login.html'
					</script>";
			}
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


</html>