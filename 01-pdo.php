<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO練習-網頁與資料庫座新增刪查練習    </title>
</head>
<body>
    <h1>PDO練習</h1>
<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";  //資料庫連線字串
$pdo=new PDO($dsn,'root','');  //建立PDO物件，連線到資料庫

$sql="SELECT * FROM `dept` "; //SQL語法，從dept資料表中選取所有欄位的資料
$depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); //執行SQL語法，並將結果以關聯式陣列的形式取出，存入$depts變數中
echo "<pre>"; //以預格式化的方式輸出$depts變數的內容，方便閱讀
print_r($depts); //輸出$depts變數的內容，顯示從資料庫中取出的資料
echo "</pre>"; //結束預格式化輸出


$sql_insert="INSERT INTO `dept` (`code`,`name`) VALUES('601','中餐科')";
$pdo->exec($sql_insert);
echo "<h2>新增資料</h2>"; //輸出新增成功的訊息
echo "<hr>"; //輸出水平線，分隔不同的內容
$depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); //再次執行SQL語法，取出更新後的資料，存入$depts變數中
echo "<pre>"; //以預格式化的方式輸出$depts變數的內容，方便閱讀
print_r($depts); //輸出$depts變數的內容，顯示從資料庫中取出的資料
echo "</pre>"; //結束預格式化輸出   


echo "<h2>更新資料</h2>";
$sql_update="UPDATE `dept` SET `code`='602' , `name`='西餐科' WHERE `id`='8'";
$pdo->exec($sql_update);
echo $sql_update;
echo "<hr>";
$depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($depts);
echo "</pre>";


echo "<h2>刪除資料</h2>";
$sql_delete="DELETE FROM `dept` WHERE `id`='9'";
$pdo->exec($sql_delete);
echo $sql_delete;
echo "<hr>";
$depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($depts);
echo "</pre>";

echo "<h2>查詢資料</h2>";
$sql_select="SELECT * FROM `dept` WHERE `code`='602'";
$dept=$pdo->query($sql_select)->fetch(PDO::FETCH_ASSOC);    
echo $sql_select;
echo "<hr>";
echo "<pre>";
print_r($dept);
echo "</pre>";



?>
</body>
</html>