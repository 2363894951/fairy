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
    等级：Lv <?php echo $role['Lv']; ?><br>
    经验：<?php echo $role['Exp']; ?> <br>
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
    <a href="/main.php" style="color: #0f6674;font-size: 15px;margin-top: 3px">返回首页</a>
</div>