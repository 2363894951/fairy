<?php
$db = new Mysql();
$user = $_SESSION['userid'];
$role = $db->table('role')->field('*')->where("Id=$user")->item();
$role_map = $role['map'];
if (isset($_GET['map'])) {
    $role_map = $_GET['map'];
    $db->table('role')->where("Id={$user}")->update(array('map' => $role_map));
}
?>
<div style="height: 20px"></div>
<div style="text-align: left;color: white;font-size: 14px;margin-top: 10px">
    <h6 style="color: #f1c9a8">系统消息： 欢迎来到仙之梦！</h6>
    <h4>个人信息: </h4>
    姓名：<?php echo $role['name']; ?><br>
    等级：Lv <?php echo $role['Lv']; ?><br>
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
    <a href="/main.php?page=role&role=self" style="color: #0f6674;font-size: 15px;margin-top: 3px">查看详情</a>
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
        echo "北: <a href='main.php?map=$n' style='color: #f0e6c6'>" . $temp['name'] . "</a><br>";
    }
    if ($game_map['S']) {
        $s = $game_map['S'];
        $temp = $db->table('map')->field('*')->where("id=$s")->item();
        echo "南: <a href='main.php?map=$s' style='color: #f0e6c6'>" . $temp['name'] . "</a> <br>";
    }
    if ($game_map['W']) {
        $w = $game_map['W'];
        $temp = $db->table('map')->field('*')->where("id=$w")->item();
        echo "西: <a href='main.php?map=$w' style='color: #f0e6c6'>" . $temp['name'] . "</a> <br>";
    }
    if ($game_map['E']) {
        $e = $game_map['E'];
        $temp = $db->table('map')->field('*')->where("id=$e")->item();
        echo "东: <a href='main.php?map=$e' style='color: #f0e6c6'>" . $temp['name'] . "</a> <br>";
    }
    ?>
    <div style="height: 20px"></div>
    <h4>环境:</h4>

    NPC:
    <?php
    if ($game_map['npc']) {
        $map_npc = explode(',', $game_map['npc']);
        echo "| ";
        foreach ($map_npc as $key => $value) {
            $npc = $db->table('npc')->field('name')->where("Id=$value")->item();
            echo "<a href='main.php?npc=$value&page=npc' style='color: #f0e6c6'>" . $npc['name'] . "</a> | ";
        }
    }
    echo "<br>"
    ?>

    玩家:
    <?php
    if (($game_map['role'])) {
        $map_role = explode(',', $game_map['role']);
        echo "| ";
        foreach ($map_role as $key => $value) {
            $role = $db->table('role')->field('name')->where("Id=$value")->item();
            echo "<a href='main.php?role=$value&page=role' style='color: #f0e6c6'>" . $role['name'] . "</a> | ";
        }
    }
    echo "<br>"
    ?>

    活动:
    <?php
    if ($game_map['activity']) {
        $map_activity = explode(',', $game_map['activity']);
        echo "| ";
        foreach ($map_activity as $key => $value) {
            $activity = $db->table('activity')->field('name')->where("Id=$value")->item();
            echo "<a href='main.php?activity=$value&page=activity' style='color: #f0e6c6'>" . $activity['name'] . "</a> | ";
        }
    }
    echo "<br>"
    ?>
    怪物:
    <?php
    if ($game_map['monster']) {
        $map_monster = explode(',', $game_map['monster']);
        echo "| ";
        foreach ($map_monster as $key => $value) {
            $monster = $db->table('monster')->field('name')->where("Id=$value")->item();
            echo "<a href='main.php?monster=$value&page=monster' style='color: #f0e6c6'>" . $monster['name'] . "</a> | ";
        }
    }
    echo "<br>"
    ?>
    <div style="height: 20px"></div>
    <h4>功能:</h4>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/main.php?page=role&role=self" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">角色</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">背包</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">装备</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">法宝</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">翅膀</button>
        </a>
    </div>
    <div style="height: 10px"></div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">炼丹</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">炼器</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">妖宠</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">副本</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">技能</button>
        </a>
    </div>
    <div style="height: 10px"></div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">传送</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">交易</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">商城</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">聊天</button>
        </a>
        <a href="/main.php?page=unfinished" style="margin-left: 5px">
            <button type="button" class="btn btn-secondary">反馈</button>
        </a>
    </div>

</div>