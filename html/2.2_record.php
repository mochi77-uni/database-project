<!--localhost/database-project/html/2.2_record.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
	function nextpage(str){
		window.location.href=str;
		console.log("123")
	}

</script>


<body>
	
	<h1 align="center">銷售紀錄
		<input type="button" value="上一頁" onclick="nextpage(2_clerk.html)"/>
	</h1>
	<!-- <table id="table" width="500" border="1" bgcolor="#cccccc" align="center">
	<th >時間: 5/20 10:38</th>  
	<th >金額:333</th>
	<th><input type="submit" value="詳情"/></th>
	</table> -->
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

	$sql_q1 = "select * from transaction;";
	$result1 = mysqli_query($conn,$sql_q1);
	echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');
	echo('<tr><th>銷售紀錄ID</th><th>時間</th><th>總金額</th></tr>');
	if($result1->num_rows > 0) {
		while($row = $result1->fetch_assoc()) {
			printf("<tr><td>%s</td> <td>%s</td> <td>%s</td> </tr>", 
			$row["ID"],
			$row["time"],
			$row["total"],
			);    
		}
	}

	mysqli_free_result($result1);
	$conn→close();		
	?>
	
</body>
	
</html>
