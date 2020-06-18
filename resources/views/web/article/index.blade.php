@extends('web.home.Base')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Striped Table</h4>
                    <p class="category">Here is a subtitle for this table</p>

                    <a href="{{route('article.create')}}" class="btn btn-info btn-fill btn-wd">添加素材</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr><th>ID</th>
                            <th>title</th>
                            <th>pic</th>
                            <th>desc</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr></thead>
                        <tbody>


                        @foreach($article as $k => $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->title}}</td>
                                <td><img src="{{asset($v->pic)}}" style="width: 50px;"></td>
                                <td><?php echo substr( $v->desc,0,60)?></td>

                                <td>
                                    @if($v->type == 0)
                                        <p class="text-danger">未审核</p>
                                    @else
                                        <p class="text-success">已发表</p>
                                    @endif
                                </td>
                                <td>
                                    <a href=" {{route('article.edit',[$v->id])}}">修改</a> |
                                    <a href="javascript:void(0);" id="delBtn" data-msg="{{$v->title}}" data-url="/article/{{$v->id}}">删除</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @if(is_array($article))
                        <p style="text-align: center">没有创建素材请先添加 <a href="{{route('article.create')}}">立即添加</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('myJS')
    <script>

        //顶部批量删除
        $('#delBtn').click(function() {

            var url=$(this).attr('data-url');
            var msg=$(this).attr('data-msg');

            layer.confirm('确定要删除 【'+msg+'】吗？', {icon: 3, title:'提示'},
                function(index){
                $.post(url,{'_token':"{{csrf_token()}}",'_method':'delete'},function (data) {
                    if (data.code === 1){
                        window.location.reload();
                    }
                })
            });
            return false;
        })

    </script>


    @endsection