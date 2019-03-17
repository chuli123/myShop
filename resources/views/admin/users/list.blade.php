@extends('admin.layout.layout')
@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a>
            <cite>首页</cite>
        </a>
        <a href="{{ url('/admin/users/list') }}">会员管理</a>
        <a>
            <cite>会员列表</cite>
        </a>
      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">刷新</i>
        </a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so">
                <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加用户','{{ url('/admin/users/add') }}',600,400)"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：{{ $data->total() }} 条</span>
        </xblock>
        <table class="layui-table x-admin">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>ID</th>
                <th>用户名</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>角色</th>
                <th>加入时间</th>
                <th>最后登录时间</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach( $data as $user)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>角色</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td class="td-manage">
                    <a title="编辑"  onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
            {{ $data->links() }}
        </div>
@stop
@section('script')
    <script>
        layui.use('laydate', function(){
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });

        /*用户-停用*/

        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            });
        }



        function delAll (argument) {

            var data = tableCheck.getData();

            layer.confirm('确认要删除吗？'+data,function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
                $(".layui-form-checked").not('.header').parents('tr').remove();
            });
        }
    </script>
@stop