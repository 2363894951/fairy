function login() {
    const userid = $('#userid').val();
    const password = $('#password').val();
    if (userid === '') {
        alert("玩家ID不能为空！")
        return;
    }
    if (password === '') {
        alert("玩家密码不能为空！")
        return;
    }
    $.post('../../lib/login.php', {userid: userid, password: password}, function (res) {
        if (res.code === 0) {
            alert("登录失败！");
        } else {
            alert("登录成功！");
            setTimeout(function () {
                window.location.href = '/main.php';
            }, 100);
        }
    }, 'json')
}

function register() {
    const name = $('#name').val();
    const email = $('#email').val();
    const paw = $('#paw').val();
    if (name === '') {
        alert("请填写玩家昵称！");
        return;
    }
    if (email === '') {
        alert("请填写玩家邮箱！");
        return;
    }
    if (paw === '') {
        alert("请填写玩家密码！");
        return;
    }
    $.post('../../lib/register.php', {name: name, email: email, password: paw}, function (res) {
        if (res.code === 0) {
            alert("注册失败！" + res.msg);
        } else {
            setTimeout(function () {
                alert(res.msg);
                parent.window.location.reload();
            }, 100);
        }
    }, 'json')
}

function logout() {
    if (!confirm('确定要退出吗？')) {
        return;
    }
    $.get('lib/logout.php', {}, function (res) {
        if (res.code === 0) {
            alert('退出成功');
            setTimeout(function () {
                window.location.href = "/";
            }, 100);
        }
    }, 'json');
}