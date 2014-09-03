<?php

header("Content-Type:text/html; charset=utf-8");

//載入DB
require_once "bootstrap.php";

date_default_timezone_set('Asia/Taipei');

//取得頁面欄位新留言
$newName = $_POST['name'];
$newTitle = $_POST['title'];
$newContent = $_POST['content'];
$newTime = new DateTime("now");
$newEmail = $_POST['email'];

//產生留言
$message = new Msg;
$message->setName($newName);
$message->setTitle($newTitle);
$message->setMsg($newContent);
$message->setTime($newTime);
$message->setEmail($newEmail);

//將新留言存到DB
$entityManager->persist($message);
$entityManager->flush();

if ($message != null) {
    echo "新增留言成功\n";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=list_msgs.php>';
} else {
    echo '您留言輸入不完全!';
//回到留言頁面
    echo '<meta http-equiv=REFRESH CONTENT=2;url=list_msgs.php>';
}
?>