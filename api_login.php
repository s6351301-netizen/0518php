<?php 
$dsn="mysql:host=localhost;charset=utf8;dbname=super";
$pdo=new PDO($dsn,'root','');

$sql="select count(*) from `members` where `account`='{$_POST['account']}' AND `password`='{$_POST['password']}'";

//$result=$pdo->query($sql)->fetch(); 用陣列方式取出資料，會得到一個陣列，裡面有一個元素是count(*)的值，可以用$result[0]來取得
$result=$pdo->query($sql)->fetchColumn();//用fetchColumn()方法直接取出count(*)的值，會得到一個數字，可以直接使用$result來判斷登入是否成功


?>
<pre>
    <?= print_r($result);  
        /* if($result[0]==1){  //用$result[0]來判斷登入是否成功，因為count(*)的值會放在$result陣列的第一個元素中，所以用$result[0]來取得，如果等於1表示有找到符合條件的資料，登入成功；如果不等於1表示沒有找到符合條件的資料，登入失敗
            echo "登入成功";
        }else{
            echo "登入失敗";

        } */
        if($result==1){   //用$result來判斷登入是否成功，因為fetchColumn()方法直接取出count(*)的值，所以$result就是count(*)的值，如果等於1表示有找到符合條件的資料，登入成功；如果不等於1表示沒有找到符合條件的資料，登入失敗
            echo "登入成功";
        }else{
            echo "登入失敗";

        }
    ?>
</pre>