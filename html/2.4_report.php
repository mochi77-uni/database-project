<!--localhost/database-project/html/2.4_report.php -->

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
	
	<h1 align="center">營收報表
		
	</h1>
	<div align ="center">

		<p></p>
		<input type="button" value="上一頁" onclick='window.location.href="2_route.php"');
/>
        <p></p>
	</div>	
<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "db_project";
$dbname = "db_project";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!mysqli_set_charset($conn,"utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (1) {
	$sql_q1 = "select sum( total ) from transaction where way = '0' and invalid_time = '1970-11-11 00:00:00';";
    $sql_q2 = "select sum( total ) from transaction where way = '1'  and invalid_time = '1970-11-11 00:00:00';";
    $sql_q3 = "select sum( total ) from transaction where invalid_time = '1970-11-11 00:00:00';";
    $sql_q4 = "select sum( total ) from transaction where invalid_time <> '1970-11-11 00:00:00'";
	$result1 = mysqli_query($conn,$sql_q1);
    $result2 = mysqli_query($conn,$sql_q2);
    $result3 = mysqli_query($conn,$sql_q3);
    $result4 = mysqli_query($conn,$sql_q4);
    if(1){
        echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');
        echo('<tr><th>現金</th><th>刷卡</th><th>總額</th><th>作廢總額</th></tr>');
        if($result1->num_rows > 0){
            while($row = $result1->fetch_row()) {
                printf("<td>%d</td>",  
                $row[0]);
            }
        }
        if($result2->num_rows > 0){
            while($row = $result2->fetch_row()) {
                printf("<td>%d</td>",  
                $row[0]);
            }
        }
        if($result3->num_rows > 0){
            while($row = $result3->fetch_row()) {
                printf("<td>%d</td>",  
                $row[0]);
            }
        }
        if($result4->num_rows > 0){
            while($row = $result4->fetch_row()) {
                printf("<td>%d</td>",  
                $row[0]);
            }
        }
        echo('</tr></table>');
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
