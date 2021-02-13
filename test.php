<?php
require_once 'lib/mysql.php';
$db=new Mysql();
$res =$db->table('user')->field('Id')->where('Id > 0')->order('Id','desc')->list();
echo '<pre>';
print_r($res);