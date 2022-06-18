<!--localhost/database-project/html/2.2.2_record.php -->

<html>
<head>
	<title>銷售紀錄詳情</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
	function nextpage(str){
		window.location.href=str;
		// console.log("123")
	}

</script>


<body>
	
	<h1 align="center">銷售紀錄詳情
		<input type="button" value="上一頁" onclick="nextpage('2.2_record.php')"/>
	</h1>

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

    //整段放在2.2.2
    if (isset($_POST['trans_ID'])) {
        $trans_ID = $_POST['trans_ID'];
        $sql_q1 = "select * from transaction where ID = '$trans_ID';";
        $result1 = mysqli_query($conn,$sql_q1);
        if($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                printf("%s %d %s %d %s %s<br>", 
                $row["ID"],
                $row["way"],
                $row["user_ID"],
                $row["time"],
                $row["total"],
                $row["invalid_time"]);    
            }
        }
        echo "<br> <a href='record3.php'>作廢</a>";
    }else{
        echo "資料不完全";
    }
    mysqli_free_result($result1);
    $conn→close();			
    ?>

</body>
	
</html>
