@extends('admin.home.home')

@section('content')
    <div class="mdui-tab mdui-tab-full-width" mdui-tab>
        <a href="#example4-tab1" class="mdui-ripple">全部素材</a>
        <a href="#example4-tab2" class="mdui-ripple">为审核素材</a>
    </div>
    <div id="example4-tab1" class="mdui-p-a-2">

        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead class="mdui-table" >
                <tr >
                    <th  class="mdui-table-col-numeric" >ID</th>
                    <th class="mdui-table-col-numeric" >title</th>
                    <th class="mdui-table-col-numeric">描述</th>
                    <th class="mdui-table-col-numeric">图片</th>
                    <th class="mdui-table-col-numeric">状态</th>
                    <th class="mdui-table-col-numeric">创建时间</th>
                    <th class="mdui-table-col-numeric">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articleSuccess as $k => $v)
                    <tr style="text-align: center">
                        <td class="mdui-table-col-numeric">{{$v->id}}</td>
                        <td class="mdui-table-col-numeric">{{$v->title}}</td>
                        <td class="mdui-table-col-numeric" >{{$v->desc}}</td>
                        <td class="mdui-table-col-numeric">
                            <img style="width: 50px;" src="{{asset($v->pic)}}">
                        </td>
                        <td class="mdui-table-col-numeric  " onclick="editStatus({{$v->id}},{{$v->type}})">已通过</td>
                        <td class="mdui-table-col-numeric  ">{{$v->created_at}}</td>
                        <td class="mdui-table-col-numeric" >
                            <a class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#example-{{$v->id}}'}" >查看详细</a>|
                            <a>删除</a>
                        </td>
                    </tr>

                    <div class="mdui-container">
                        {{--                <button class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#example-3'}">修改</button>--}}

                        <div class="mdui-dialog" id="example-{{$v->id}}">
                            <form method="POST">
                                @csrf
                                <div class="mdui-dialog-content"  >

                                    <div class="mdui-dialog-title" style="text-align: center">{{$v->title}}</div>

                                    <div  style="text-align: center" class="mdui-textfield mdui-textfield-floating-label">
                                        <p>{{$v->desc}}</p>
                                    </div>

                                    <div class="mdui-textfield mdui-textfield-floating-label" style="text-align: center">
                                        <img width="500px;" src="{{$v->pic}}">
                                    </div>



                                    <div  style="text-align: center" class="mdui-textfield mdui-textfield-floating-label">
                                        <p>{{$v->content}}</p>
                                    </div>
                                </div>
                      {{--          <div class="mdui-dialog-actions">

                                    <button class="mdui-btn mdui-ripple"  >通过</button>
                                </div>--}}



                            </form>
                        </div>
                    </div>
                @endforeach



                </tbody>
            </table>
        </div>


    </div>




{{--    未审核--}}
    <div id="example4-tab2" class="mdui-p-a-2">

    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable">
            <thead class="mdui-table" >
            <tr >
                <th  class="mdui-table-col-numeric" >ID</th>
                <th class="mdui-table-col-numeric" >title</th>
                <th class="mdui-table-col-numeric">描述</th>
                <th class="mdui-table-col-numeric">图片</th>
                <th class="mdui-table-col-numeric">状态</th>
                <th class="mdui-table-col-numeric">创建时间</th>
                <th class="mdui-table-col-numeric">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($article as $k => $v)
                <tr style="text-align: center">
                    <td class="mdui-table-col-numeric">{{$v->id}}</td>
                    <td class="mdui-table-col-numeric">{{$v->title}}</td>
                    <td class="mdui-table-col-numeric" ><?php echo substr($v->desc,0,90)?></td>
                    <td class="mdui-table-col-numeric">
                        <img style="width: 50px;" src="{{asset($v->pic)}}">
                    </td>
                    <td class="mdui-table-col-numeric  " onclick="editStatus({{$v->id}},{{$v->type}})">未审核</td>
                    <td class="mdui-table-col-numeric  ">{{$v->created_at}}</td>
                    <td class="mdui-table-col-numeric" >
                        <a class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#example-{{$v->id}}'}" >查看详细</a>|
                        <a>删除</a>
                    </td>
                </tr>

                <div class="mdui-container">
                    {{--<button class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#example-3'}">修改</button>--}}

                    <div class="mdui-dialog" id="example-{{$v->id}}">
                        <form action="{{route('admin.article.status',[$v->id])}}" method="POST">
                            @csrf
                            <div class="mdui-dialog-content"  >

                                <div class="mdui-dialog-title" style="text-align: center">{{$v->title}}</div>

                                <div  style="text-align: center" class="mdui-textfield mdui-textfield-floating-label">
                                   <p>{{$v->desc}}</p>
                                </div>

                                <div class="mdui-textfield mdui-textfield-floating-label" style="text-align: center">
                                  <img width="500px;" src="{{$v->pic}}">
                                </div>



                                <div  style="text-align: center" class="mdui-textfield mdui-textfield-floating-label">
                                    <p>{{$v->content}}</p>
                                </div>
                            </div>
                            <div class="mdui-dialog-actions" style="text-align: center;padding: 20px">
                                <input name="id" value="{{$v->id}}" hidden>
                                <input name="status" value="{{$v->type}}" hidden>

                                <button class="mdui-btn mdui-ripple"  >通过</button>
                            </div>



                        </form>
                    </div>
                </div>
            @endforeach



            </tbody>
        </table>
    </div>
@endsection
</div>
@section('myJS')


    <script>
       function editStatus($id,type) {
           alert($id + type)
       }
    </script>


    @endsection