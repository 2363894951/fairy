<?php
session_start();
$user = null;
$name =null;
if (isset($_SESSION['userid'])) {
    $user = $_SESSION['userid'];
    require_once 'lib/mysql.php';
    $db = new Mysql();
    $res = $db->table('user')->field('name')->where("Id=$user")->item();
    $name=$res['name'];
}

?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>仙之梦</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-image: url("assets/image/background.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        width: 100%;
        height: 100%;
        align-items: center;
        margin: auto;
        text-align: center;
    }
</style>
<body>
<nav class="navbar navbar-light bg-light" style="opacity: 0.8">
    <div style="color:black;font-size: 18px">仙之梦</div>
    <div class="button">
        <?php

        if ($user) {
            $html = <<<EOF
            <span>$name</span>
            <span>($user)</span>
            <button type="button" class="btn btn-outline-danger" onclick="logout()" ">退出</button>
            EOF;
            echo $html;
        } else {
            $html = <<<EOF
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#login">登录</button>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#register">注册</button>
            EOF;
            echo $html;
        }
        ?>
    </div>
</nav>
<!-- 登录模态框 -->
<div class="modal fade" id="login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- 模态框头部 -->
            <div class="modal-header">
                <h4 class="modal-title">登录-仙之梦</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- 模态框主体 -->
            <?php require "assets/common/login.html" ?>
            <!-- 模态框底部 -->
        </div>
    </div>
</div>
<!-- 注册模态框 -->
<div class="modal fade" id="register">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- 模态框头部 -->
            <div class="modal-header">
                <h4 class="modal-title">注册-仙之梦</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- 模态框主体 -->
            <div class="modal-body">
                <?php require "assets/common/register.html" ?>
            </div>
        </div>
    </div>
</div>
<div class="container main">
    <div style="color: white;font-size: 18px;margin: 20px;position: absolute">请选择您要游玩的服务器 :</div>
    <ul class="list container">
        <li class="btn btn-primary btn-lg btn-block ">诛仙之战</li>
        <li class="btn btn-secondary btn-lg btn-block">未开放</li>
        <li class="btn btn-secondary btn-lg btn-block">未开放</li>
        <li class="btn btn-secondary btn-lg btn-block">未开放</li>
    </ul>
</div>
</body>
<footer>
    <div class="container footer">
        <div class="container footer-title">Copyright © 2021 Drizzle. All Rights Reserved.</div>
    </div>
</footer>
</html>
<script>
    function logout() {
        if (!confirm('确定要退出吗？')) {
            return;
        }
        $.get('lib/logout.php', {}, function (res) {
            if (res.code === 0) {
                alert('退出成功');
                setTimeout(function () {
                    parent.window.location.reload()
                }, 100);
            }
        }, 'json');
    }
</script>