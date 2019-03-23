@extends('admin.layout.layout')
@section('content')
    <div class="x-body">
        <form class="layui-form layui-form-pane">
            @csrf
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    用户名
                </label>
                <div class="layui-input-block">
                    <input type="text" id="L_name" name="name" lay-verify="name"
                           autocomplete="off" class="layui-input" value="{{ $data->name }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    手机号码
                </label>
                <div class="layui-input-block">
                    <input type="text" id="L_phone" name="phone"
                           autocomplete="off" class="layui-input" value="{{ $data->phone }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    邮箱
                </label>
                <div class="layui-input-block">
                    <input type="text" id="L_email" name="email"
                           autocomplete="off" class="layui-input" value="{{ $data->email }}">
                </div>
            </div>
            <div class="layui-form-item">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    提交
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


            //监听提交
            form.on('submit(add)', function(data){
                $.ajax({
                    url: '/admin/users/update',
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
                            content: '修改失败' //这里content是一个普通的String
                        });
                    }
                });
                return false;
            });


        });
    </script>
@stop