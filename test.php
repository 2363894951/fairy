<?php
include 'lib/mysql.php';
$db=new Mysql();
$db->table('user')->field('*')->where('Id=6')->item();