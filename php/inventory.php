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

if (1) {
	$sql_q1 = "select * from storage;";
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

