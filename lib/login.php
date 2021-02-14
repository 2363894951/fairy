<?php
if (!isset($_POST["userid"])) {
    echo "无效的请求";
    exit();
}
$id = $_POST['userid'];
$password = $_POST['password'];
require_once "mysql.php";
$db = new Mysql();
if (strpos($id, "@") != '') {
    $res = $db->table('user')->field('*')->where("email=$id and password='$password'")->item();
} else {
    $res = $db->table('user')->field('*')->where("Id=$id and password='$password'")->item();
}
if (!$res) {
    exit(json_encode(array('code' => 0, 'msg' => '登录失败')));
}
session_start();
$_SESSION['userid'] = $res['Id'];
exit(json_encode(array('code' => 1, 'msg' => '登录成功')));




