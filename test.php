<?php
require_once 'lib/mysql.php';
$db=new Mysql();
$res =$db->table('user')->where('Id = 5')->item();
print_r($res);
