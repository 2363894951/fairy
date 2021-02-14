<?php
$db = new Mysql();
$user=$_SESSION['userid'];
$game_name = $db->table('role')->field('name')->where("Id=$user")->item();
?>
个人信息：<br>
角色昵称：<?php echo $game_name['name']; ?>