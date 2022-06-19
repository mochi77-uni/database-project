<!-- localhost/database-project/html/3.1_product_report.php -->

<html>
<head>
	<title>統計商品銷售紀錄</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
    function refresh(order){
        if (order == 1){
            var result ="<?php setOrder1(); ?>"
            document.write(result);
        }
        else if (order == 2){
            var result ="<?php setOrder1(); ?>"
            document.write(result);
        }
        else{
            console.log("no order")
        }
        
    }
    function nextpage(str){
		window.location.href=str;
		// console.log("123")
	}

</script>

<body>
	
	<h1 align="center">各商品銷售紀錄
		
	</h1>
<!-- <?php

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
    echo("123");
    session_start();

    if($_SESSION['order'] == NULL){
        $_SESSION['order']=1;
    }

    // if($_SESSION['order'] == NULL){
    //     printf("null");
    //     $_SESSION['order']=1;
    // }
    // else{
    //     printf("not null");
    // }
    $choice = $_SESSION['order'];
    printf($choice);

    // 俊彥從這裡開始寫
    if ($choice != NULL) {
        
        // 1 從下往上
        if($choice == 1){
            $sql_q1 = "select A.book_ID, B.name, sum(A.amount) from books_trans as A, books as B where A.book_ID = B.ID group by A.book_ID, B.name ORDER BY sum(amount) ASC;";
            $result1 = mysqli_query($conn,$sql_q1);
            if($result1->num_rows > 0){
                // echo "Book_ID   Name    amount<br>";
                // while($row = $result1->fetch_assoc()) {
                //     echo $row[book_ID] . $row[name] . $row[sum(A.amount)];
                // }
            }
            mysqli_free_result($result1);

        }
        // 2 從上往下
        else if($choice == 2){
            $sql_q2 = "select A.book_ID, B.name, sum(A.amount) from books_trans as A, books as B where A.book_ID = B.ID group by A.book_ID, B.name ORDER BY sum(amount) DESC;";
            $result2 = mysqli_query($conn,$sql_q2);
            if($result2->num_rows > 0){
                // echo "Book_ID   Name    amount<br>";
                // while($row = $result2->fetch_assoc()) {
                //     echo $row[book_ID] . $row[name] . $row[sum(A.amount)];
                // }
            }
            mysqli_free_result($result2);

        }
        else{
        printf('%d error input<br>', $choice);
        }

        echo('<div align="center">');
    }else{
        echo "資料不完全";
    }
    // 到這裡結束囉

    // echo('	<div align ="center">
    //     <p></p>
    //     <input type="button" value="從高到低" onclick="refresh(1)"/>
    //     <input type="button" value="從低到高" onclick="refresh(2)"/>
    //     <input type="button" value="上一頁" onclick="nextpage(\'3_administrator.html\')"/>
    //     </div>	
    // ');
    $conn→close();	
				
    function setOrder1($order){
        session_start();
        $_SESSION['order'] = 1;
        echo("<br> order="+ $order);
    }
    function setOrder2($order){
        session_start();
        $_SESSION['order'] = 2;
        echo("<br> order="+ $order);
    }
?> -->

</body>
	
</html>



