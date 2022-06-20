<!--localhost/database-project/html/2.3.2inventory.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
	function setTable(){
		var table = document.getElementById("table")
		var obj = table.insertRow(-1);
		obj.innerHTML = 
		'<th >商品<input type="text" name="product"/></th>'+
		'<th >數量<input type="text" name="amount"/></th>'

	}
</script>

<body>
	
	<h1 align="center">銷售紀錄
		
	</h1>
	<!-- <form action="create.php" method="post">	 -->
	<!-- </form> -->
	<div align="center">
		<p></p>
		<input type="button" value="上一頁" onclick="window.history.go(-1)"/>
	</div>	

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

if (isset($_POST['books_ID'])) {
    $booksID = $_POST['books_ID'];
	$sql_q1 = "select A.books_ID, B.name, A.number from storage as A, books as B where A.books_ID = B.ID and A.books_ID = '$booksID';";
	$result1 = mysqli_query($conn,$sql_q1);
    if($result1){
        if($result1->num_rows > 0){
            echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');
            echo('<tr><th>書本ID</th><th>書本名稱</th><th>剩餘數量</th></tr>');
        
            while($row = $result1->fetch_row()) {
                printf("<td>%s</td> <td>%s</td> <td>%s</td></tr> ", 
                $row[0] , 
                $row[1] , 
                $row[2]);
            }
            echo('</table>');
        }
    }
    else{
    printf('error input<br>');
    }

}else{
	echo "資料不完全";
}
mysqli_free_result($result1);
$conn→close();	
				
?>

</body>
	
</html>
