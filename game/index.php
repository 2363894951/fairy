<?php
$db = new Mysql();
$user = $_SESSION['userid'];
$game_name = $db->table('role')->field('name')->where("Id=$user")->item();
?>
<div style="font-size: 20px;margin-top: 30px;position: absolute"></div>
<div style="text-align: left;color: white;font-size: 14px">
    <h3>个人信息: </h3>
    角色昵称：<?php echo $game_name['name']; ?>
</div>