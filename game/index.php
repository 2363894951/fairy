<?php
$db = new Mysql();
$user = $_SESSION['userid'];
$role = $db->table('role')->field('*')->where("Id=$user")->item();
$role_map = $role['map'];
if (isset($_GET['map'])) {
    $role_map = $_GET['map'];
    $db->table('role')->where("Id={$user}")->update(array('map'=>$role_map));
}
?>
<div style="height: 20px"></div>
<div style="text-align: left;color: white;font-size: 14px;margin-top: 10px">
    <h6 style="color: #f1c9a8">系统消息： 欢迎来到仙之梦！</h6>
    <h4>个人信息: </h4>
    姓名：<?php echo $role['name']; ?><br>
    等级：Lv 1<br>
    经验：10<br>
    <div>
        <span style="float: left">血量：</span>
        <div class="progress" style="width: 100px;float: left;margin-top: 4px">
            <div class="progress-bar bg-danger" role="progressbar"
                 style="width:<?php echo($role['Hp_ing'] / $role['Hp'] * 100 . '%'); ?>;">
            </div>
        </div>
        <span style="color:white;margin-top: 8px;">
                <?php echo '&nbsp' . ($role['Hp_ing'] . '/' . $role['Hp']); ?>
            </span>
    </div>
    <div>
        <span style="float: left">法力：</span>
        <div class="progress" style="width: 100px;float: left;margin-top: 4px">
            <div class="progress-bar bg-primary" role="progressbar"
                 style="width:<?php echo($role['Mp_ing'] / $role['Mp'] * 100 . '%'); ?>;">
            </div>
        </div>
        <span style="color:white;margin-top: 8px;">
                <?php echo '&nbsp' . ($role['Mp_ing'] . '/' . $role['Mp']); ?>
            </span>
    </div>
    <div style="height: 10px"></div>
    <a href="/main.php?page=role&id=self" style="color: #0f6674;font-size: 15px;margin-top: 3px">查看详情</a>
    <div style="height: 20px"></div>
    <?php
    $game_map = $db->table('map')->field('*')->where("id=$role_map")->item();
    ?>
    <h4>位置: <?php echo $game_map['name']; ?></h4>
    <div style="height: 10px"></div>
    <?php
    echo "<img src='../assets/image/map/map_$role_map.jpg' alt='' style='width: 150px;height: 150px'>";
    ?>
    <div style="height: 10px"></div>
    <h6><?php echo $game_map['content']; ?></h6>
    <?php
    if ($game_map['N']) {
        $n = $game_map['N'];
        $temp = $db->table('map')->field('*')->where("id=$n")->item();
        echo "北: <a href='main.php?map=$n' style='color: #fd7e14'>" . $temp['name'] . "</a><br>";
    }
    if ($game_map['S']) {
        $s = $game_map['S'];
        $temp = $db->table('map')->field('*')->where("id=$s")->item();
        echo "南: <a href='main.php?map=$s'>" . $temp['name'] . "</a> <br>";
    }
    if ($game_map['W']) {
        $w = $game_map['W'];
        $temp = $db->table('map')->field('*')->where("id=$w")->item();
        echo "西: <a href='main.php?map=$w'>" . $temp['name'] . "</a> <br>";
    }
    if ($game_map['E']) {
        $e = $game_map['E'];
        $temp = $db->table('map')->field('*')->where("id=$e")->item();
        echo "东: <a href='main.php?map=$e'>" . $temp['name'] . "</a> <br>";
    }
    ?>
    <div style="height: 20px"></div>
    <h4>环境:</h4>
    NPC: <br>
    玩家: <br>
    活动: <br>
    怪物: <br>
    <div style="height: 20px"></div>
    <h4>功能:</h4>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">角色</button>
        <button type="button" class="btn btn-secondary">背包</button>
        <button type="button" class="btn btn-secondary">装备</button>
        <button type="button" class="btn btn-secondary">法宝</button>
        <button type="button" class="btn btn-secondary">翅膀</button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">任务</button>
        <button type="button" class="btn btn-secondary">商城</button>
        <button type="button" class="btn btn-secondary">交易</button>
        <button type="button" class="btn btn-secondary">好友</button>
        <button type="button" class="btn btn-secondary">打坐</button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">排行</button>
        <button type="button" class="btn btn-secondary">副本</button>
        <button type="button" class="btn btn-secondary">福利</button>
        <button type="button" class="btn btn-secondary">聊天</button>
        <button type="button" class="btn btn-secondary">反馈</button>
    </div>

</div>