<!--localhost/database-project/html/3.4_promotion.html -->

<html>
<head>
	<title>新增和編輯促銷</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
	function setTable(){
	}

</script>

<body >
	
	<h1 align="center">新增和編輯促銷
		
	</h1>
	<form action="3.4.2_promotion_book.php" method="post">	
	<table  id="table"  border="1" bgcolor="#cccccc" align="center">
		<tr >
			<td>
				促銷內容
				<input type="text" name = 'content'/>
			</td>
		</tr>
		<tr >
			<td>
				開始時間
				<input type="date" name="start_time"/>
			</td>
		</tr>
		<tr >
			<td>
				結束時間
				<input type="date" name="end_time"/>
			</td>
		</tr>
	</table>
	
	<div align="center">
		<p></p>


		<input type="button" value="取消"/>

		<input type="submit" value="設定促銷書籍" name="submit"/>
	</div>	
	</form>
</body>
<?php

if(isset($_POST['submit']))	{	
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

		if (isset($_POST['ID']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['content'])) {
			$ID = $_POST['ID'];
			$start = $_POST['start'];
			$end = $_POST['end'];
			$content = $_POST['content'];

			$sql_q1 = "insert into promotion valus ( '$ID', '$start', '$end', '$content' );";
			$result1 = mysqli_query($conn,$sql_q1);
			if($result1){
				echo "新增成功<br>";
			}

		}else{
			echo "資料不完全<br>";
		}
		mysqli_free_result($result1);
		$conn→close();	
	}				
?>
	
</html>
