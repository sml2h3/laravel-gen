<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>欢迎登陆七天约读管理系统 </title>

    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('bower_components/gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form>
                    <h1>七天约读管理系统</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" id="username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" id="password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-block btn-primary submit" href="javascript:;;" id="signin_btn">登录</a>
                        <a class="reset_pass" href="#">忘记密码?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">新用户?
                            <a href="#signup" class="to_register"> 申请注册用户 </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> 天津蚁尚科技有限公司</h1>
                            <p>©2016 All Rights Reserved. 天津蚁尚科技有限公司</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>申请账号</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-block btn-primary submit" href="index.html">申请注册</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">已经是注册成员 ?
                            <a href="#signin" class="to_register"> 立即登录 </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> 天津蚁尚科技有限公司</h1>
                            <p>©2016 All Rights Reserved. 天津蚁尚科技有限公司</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('bower_components/gentelella/vendors/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/gentelella/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('bower_components/gentelella/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{ asset('bower_components/gentelella/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
<script>
    $('#signin_btn').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            url:'login',
            method:'post',
            data:{
                username:username,
                password:password
            },
            success:function (result) {
                var r = JSON.parse(result);
                switch(r.code){
                    case '100000':
                        //登陆成功
                        location.href=r.result;
                        break;
                    case '100001':
                        new PNotify({
                            title: '错误码'+r.code,
                            text: r.result,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                        break;
                    case '100002':
                        new PNotify({
                            title: '错误码'+r.code,
                            text: r.result,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                        break;
                }
            },
            error:function (err,result) {
                console.log(err);
                console.log(JSON.stringify(result));
            }
        })
    })
</script>
</body>
</html>
