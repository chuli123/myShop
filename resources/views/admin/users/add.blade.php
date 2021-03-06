@extends('admin.layout.layout')
@section('content')
    <div class="x-body">
        <form class="layui-form layui-form-pane">
            @csrf
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>用户名
                </label>
                <div class="layui-input-block">
                    <input type="text" id="L_name" name="name" required="" lay-verify="name"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    手机号码
                </label>
                <div class="layui-input-block">
                    <input type="text" id="L_phone" name="phone" required="" lay-verify="phone"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    邮箱
                </label>
                <div class="layui-input-block">
                    <input type="text" id="L_email" name="email" required="" lay-verify="email"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>密码
                </label>
                <div class="layui-input-block">
                    <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>确认密码
                </label>
                <div class="layui-input-block">
                    <input type="password" id="L_repass" name="repassword" required="" lay-verify="repassword"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    添加
                </button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </form>
    </div>
@stop
@section('script')
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            var form = layui.form
                ,layer = layui.layer;

            //自定义验证规则
            // form.verify({
            //     pass: [/(.+){6,12}$/, '密码必须6到12位']
            //     ,repass: function(value){
            //         if($('#L_pass').val()!=$('#L_repass').val()){
            //             return '两次密码不一致';
            //         }
            //     }
            // });

            //监听提交
            form.on('submit(add)', function(data){
                $.ajax({
                    url: '/admin/users/store',
                    method: 'post',
                    data: data.field,
                    success: function (res) {
                        layer.alert(res.msg, {icon: 6},function () {
                            //关闭当前frame
                            x_admin_close();
                            // 可以对父窗口进行刷新
                            x_admin_father_reload();
                        });
                    },
                    error : function() {
                        layer.open({
                            type: 0,
                            content: '添加失败' //这里content是一个普通的String
                        });
                    }
                });
                return false;
            });


        });
    </script>
@stop