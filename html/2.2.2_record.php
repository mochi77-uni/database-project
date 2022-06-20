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
		
	</h1>

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
    echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');
	echo('<tr><th>銷售紀錄ID</th><th>付款方式</th><th>結帳人員ID</th><th>時間</th><th>總金額</th><th>作廢時間</th></tr>');

    //整段放在2.2.2
    if (isset($_POST['trans_ID'])) {
        $trans_ID = $_POST['trans_ID'];
        $sql_q1 = "select * from transaction  where ID = '$trans_ID';";
        $sql_q2 = "select A.book_ID, A.transaction_ID, A.amount, B.name from books_trans as A, books as B where A.transaction_ID = '$trans_ID' and B.ID = A.book_ID;";
        $result1 = mysqli_query($conn,$sql_q1);
        $result2 = mysqli_query($conn,$sql_q2);
        if($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                printf("<tr><td>%s</td>",$row["ID"]);
                if($row["way"] == 0){
                    printf("<td>刷卡</td>");
                }
                else{
                    printf("<td>付現</td>");
                }
                printf("<td>%s</td> <td>%s</td> <td>%s</td><td>%s</td></tr> ", 
                $row["user_ID"],
                $row["time"],
                $row["total"],
                $row["invalid_time"]);    
            }
        }
        echo('</table>');
        echo('	<h2 align="center">商品明細<h2>');
        echo('<table id="table2" width="500" border="1" bgcolor="#cccccc" align="center">');
        echo('<tr><th>商品ID</th><th>商品數量</th><th>商品名稱</th></tr>');
        if($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                printf("<tr><td>%s</td> <td>%s</td><td>%s</td></tr> ",
                $row["book_ID"], 
                $row["amount"],
                $row["name"]);

            }
        }
        echo("</table>");
        echo("<div align='center'>");
        // echo('<form action="2.2.3_record.php" method="post">');

        echo('<input type="button" value="上一頁" onclick="nextpage(\'2.2_record.php\')"/>');
        session_start();
        $_SESSION['trans_ID'] = $trans_ID;
        echo('<input type="button" value="作廢" onclick="nextpage(\'2.2.3_record.php\')"/>');
        // echo('<input type="submit" value="作廢"');
        // echo "<br> <a href='2.2.3_record.php'>作廢</a>";
        // echo('</form>');

    }else{
        echo "資料不完全";
        echo('<input type="button" value="上一頁" onclick="nextpage(\'2.2_record.php\')"/>');

    }
    mysqli_free_result($result1);
    $conn→close();			
    ?>

</body>
	
</html>
