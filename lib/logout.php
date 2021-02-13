<?php
session_start();
$_SESSION['userid'] = null;
exit(json_encode(array('code' => 0, 'msg' => '退出成功')));