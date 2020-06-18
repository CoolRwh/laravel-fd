@extends('admin.home.home')

@section('content')

    <div class="mdui-table-fluid" style="margin-top: 5%;">

       <div>
           <a mdui-dialog="{target: '#add-233'}">添加用户</a>
       </div>

        <table class="mdui-table mdui-table-hoverable">
            <thead class="mdui-table" >
            <tr >
                <th  class="mdui-table-col-numeric" >ID</th>
                <th class="mdui-table-col-numeric" >用户名</th>
                <th class="mdui-table-col-numeric">邮箱</th>
                <th class="mdui-table-col-numeric">余额</th>
                <th class="mdui-table-col-numeric">状态</th>
                <th class="mdui-table-col-numeric">创建时间</th>
                <th class="mdui-table-col-numeric">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $k => $v)
            <tr style="text-align: center">
                <td class="mdui-table-col-numeric">{{$v->id}}</td>
                <td class="mdui-table-col-numeric">{{$v->name}}</td>
                <td class="mdui-table-col-numeric" >{{$v->email}}</td>
                <td class="mdui-table-col-numeric">{{$v->price}}</td>
                <td class="mdui-table-col-numeric">{{$v->status}}</td>
                <td class="mdui-table-col-numeric">{{$v->created_at}}</td>
                <td class="mdui-table-col-numeric" >
                    <a class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#example-{{$v->id}}'}" > 修改</a>
                    <a class="mdui-btn mdui-ripple mdui-color-theme-accent" mdui-dialog="{target: '#exampleDialog-{{$v->id}}'}">充值</a>
                    <a href="javascript:void(0);"  class="mdui-btn mdui-color-theme-accent mdui-ripple delBtn"
                       data-id="{{$v->id}}"
                       data-msg="{{$v->name}}">删除</a>
                </td>
            </tr>

{{--            修改用户信息--}}

            <div class="mdui-container">
                <div class="mdui-dialog" id="example-{{$v->id}}">
                    <form action="{{route('user.update',[$v->id])}}" method="POST">
                        @csrf
                    <div class="mdui-dialog-content">

                        <div class="mdui-dialog-title">{{$v->name}}- 修改</div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">用户名</label>
                            <input class="mdui-textfield-input" type="text" value="{{$v->name}}"/>
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">密码</label>
                            <input class="mdui-textfield-input" type="email" name="password" value="{{$v->password}}"/>
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">状态</label>

                        </div>


                    </div>
                    <div class="mdui-dialog-actions" style="text-align: center;padding: 10px">

                        <button class="mdui-btn mdui-ripple" >提交</button>
                    </div>
                    </form>
                </div>
            </div>


{{--                充值--}}
            <div class="mdui-dialog" id="exampleDialog-{{$v->id}}">
                <form action="{{route('admin.user.add_price')}}" method="post">
                    @csrf
                    <input hidden name="user_id" value="{{$v->id}}">

                <div class="mdui-dialog-title">正在给-【 {{$v->name}} 】充值！</div>
                <div class="mdui-dialog-content" >
                    <input  class="mdui-textfield-input" type="text" name="price" style="text-align: center;"/>

                </div>
                <div class="mdui-dialog-actions" style="text-align: center">
                    <button class="mdui-btn mdui-ripple" type="submit">确定</button>
                </div>
                </form>
            </div>


            @endforeach

            </tbody>
        </table>
    </div>

    <div class="mdui-container">


        <div class="mdui-dialog" id="add-233">
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="mdui-dialog-content">

                    <div class="mdui-dialog-title">添加用户</div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">用户名</label>
                        <input class="mdui-textfield-input" type="text" name="name" value="{{old('name')}}"/>
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">Email</label>
                        <input class="mdui-textfield-input" type="email" name="email" value="{{old('email')}}"/>
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">password</label>
                        <input class="mdui-textfield-input" type="password" name="password" />
                    </div>


                </div>
                <div class="mdui-dialog-actions">

                    <button class="mdui-btn mdui-ripple" >提交</button>
                </div>


            </form>
        </div>
    </div>





    @endsection



@section('myJS')

    <script>
        //顶部批量删除

        $('.delBtn').click(function() {


          var id=$(this).attr('data-id');
            var msg=$(this).attr('data-msg');

            layer.confirm('确定要删除 【'+msg+'】吗？', {icon: 3, title:'提示'},
                function(index){
                    $.post('/admin/user/'+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function (data) {
                        if (data.code === 1){
                            window.location.reload();
                        }
                    })
                });
            return false;
        })

    </script>
    @endsection

