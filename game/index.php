<?php
$db = new Mysql();
$user = $_SESSION['userid'];
$role = $db->table('role')->field('*')->where("Id=$user")->item();
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
    <h4 >位置: 残老村</h4>
    北: <br>
    南: <br>
    西: <br>
    东: <br>
    <div style="height: 20px"></div>
    <h4 >环境:</h4>
    NPC: <br>
    玩家: <br>
    活动: <br>
    怪物: <br>
    <div style="height: 20px"></div>
    <h4 >功能:</h4>
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