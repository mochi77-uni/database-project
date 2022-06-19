<!--localhost/database-project/html/3.3_createUser.php -->

<html>
<head>
	<title>新增使用者</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
	function setTable(){
	}

</script>

<body >
	
	<h1 align="center">新增使用者
		
	</h1>
	<form  method="post">	
		<table  id="table"  border="1" bgcolor="#cccccc" align="center">
			<tr >
				<td>
					帳號
					<input type="text" id = 'account' name='ID'/>
				</td>
			</tr>
			<tr >
				<td>
					名字
					<input type="text" id = 'name' name='name'/>
				</td>
			</tr>
			<tr >
				<td>
					密碼
					<input type="text" id = 'password' name='password'/>
				</td>
			</tr>
			<tr >
				<td>
					權限
					<input type="radio" name="authority" value="0" >一般店員
					<input type="radio" name="authority" value="1">管理者
				</td>
			</tr>
			<tr >
				<td>
					所屬分店ID
					<input type="radio" name="store_ID" value="0001" >店面1
					<input type="radio" name="store_ID" value="0002" >店面2

				</td>
			</tr>
		</table>
		<div align="center">
			<p></p>


			<input type="button" value="上一頁"/>

			<input type="submit" value="確定" name='submit'/>
		</div>	
	</form>

	<?php
		if(isset($_POST['submit'])) {
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

			if (isset($_POST['ID']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['authority']) && isset($_POST['store_ID'])) {
				$ID = $_POST['ID'];
				$name = $_POST['name'];
				$password = $_POST['password'];
				$authority = $_POST['authority'];
				$store_ID = $_POST['store_ID'];

				$sql_q1 = "insert into user values ( '$ID', '$name', '$password', '$authority', '$store_ID' );";
				$result1 = mysqli_query($conn,$sql_q1);
				if($result1){
					echo "<div align='center'>新增成功</div>";
				}

			}
			else{
				echo "<div align='center'>*資料不完全*</div>";
			}
			mysqli_free_result($result1);
			$conn→close();	
		}
		
	?>


</body>
	
</html>
