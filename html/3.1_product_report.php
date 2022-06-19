<!-- localhost/database-project/html/3.1_product_report.php -->

<html>
<head>
	<title>統計商品銷售紀錄</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
    function nextpage(str){
		window.location.href=str;
		// console.log("123")
	}

</script>

<body>
	
	<h1 align="center">各商品銷售紀錄
        <form method="post">
            <input type="submit" name="button1"
                    value="從高到低"/>
            
            <input type="submit" name="button2"
                    value="從低到高"/>
            <input type="button" value="上一頁"/>
        </form>
        


	</h1>

    <?php
        // ******** update your personal settings ******** 
        $servername = "localhost";
        $username = "root";
        $password = "db_project";
        $dbname = "db_project";

        // Connecting to and selecting a MySQL database
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql_q1 = "select A.book_ID, B.name, sum(A.amount) from books_trans as A, books as B where A.book_ID = B.ID group by A.book_ID, B.name ORDER BY sum(amount) ASC;";
        $result1 = mysqli_query($conn,$sql_q1);
        $sql_q2 = "select A.book_ID, B.name, sum(A.amount) from books_trans as A, books as B where A.book_ID = B.ID group by A.book_ID, B.name ORDER BY sum(amount) DESC;";
        $result2 = mysqli_query($conn,$sql_q2);

        if (!$conn->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $conn->error);
            exit();
        }

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $choice = 1;
        if(isset($_POST['button1'])) {
            // echo "This is Button1 that is selected";
            $choice = 1;

        }
        if(isset($_POST['button2'])) {
            // echo "This is Button2 that is selected";
            $choice = 2;

        }

        // 俊彥從這裡開始寫
                // 1 從下往上
        if($choice == 1){
            // echo "choice 1";
            if($result1->num_rows > 0){
                echo('<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">');
                echo('<tr><th>書本ID</th><th>書本名稱</th><th>剩餘數量</th></tr>');
            
                while($row = $result1->fetch_assoc()) {
                    printf("<td>%s</td> <td>%s</td> <td>%s</td></tr> ", 
                    $row[book_ID] , 
                    $row[name] , 
                    $row[sum(A.amount)]);
                }
                echo('</table>');
            }
            

        }
        // 2 從上往下
        else if($choice == 2){
            // echo "choice 2";

            if($result2->num_rows > 0){
                echo "Book_ID   Name    amount<br>";
                while($row = $result2->fetch_assoc()) {
                    echo $row[book_ID] . $row[name] . $row[sum(A.amount)];
                }
            }
            

        }
        else{
            printf('%d error input<br>', $choice);
        }
        // 到這裡結束囉
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        $conn→close();	
    ?>
</body>
	
</html>



