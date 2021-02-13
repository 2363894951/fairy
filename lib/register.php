<?php
if (!isset($_POST["email"])) {
    echo "无效的请求";
    exit();
}
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
require_once "mysql.php";
$db = new Mysql();
$res = $db->table('user')->field('*')->where("email='$email'")->item();
if ($res) {
    exit(json_encode(array('code' => 0, 'msg' => '邮箱已注册')));
} else {
    $data = ['name' => $name, 'email' => $email, 'password' => $password];
    $id = $db->table('user')->insert($data);
    session_start();
    $_SESSION['userid']=$id;
    exit(json_encode(array('code' => 1, 'msg' => '注册成功,您的ID为 ' . $id . '请牢记您的ID，这将最为登录的依据。')));
}



