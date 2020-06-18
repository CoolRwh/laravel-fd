
@extends('web.home.Base')


@section('content')


    <div class="row">

        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">上传素材</h4>
                </div>
                <div class="content">
                    <form action="{{route('article.update',[$article->id])}}"  method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label>
                                    <input type="text" class="form-control border-input" placeholder="标题" name="title" value="{{$article->title}}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>描述</label>
                                        <input type="text" class="form-control border-input" placeholder="Home Address" name="desc" value="{{$article->desc}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>缩略图</label>

                                        <input type="text" id="pic" class="form-control border-input" placeholder="Home Address" name="pic" value="{{$article->pic}}">
                                        <a href="javascript:void(0)" onclick="uploadPhoto()">选择图片</a>
                                        <input type="file" id="photoFile" style="display: none;" onchange="upload()" >
                                        <img id="preview_photo" onclick="uploadPhoto()" src="{{asset($article->pic)}}" width="150px" height="150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea name="content" rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">@isset($article->id){{$article->content}}@endisset</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" >Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection





@section('myJS')

    <script type="text/javascript">

        function uploadPhoto() {
            $("#photoFile").click();
        }

        /**
         * 上传图片
         */
        function upload() {
            if ($("#photoFile").val() == '') {
                return;
            }
            var formData = new FormData();
            formData.append('pic', document.getElementById('photoFile').files[0]);

            console.log(formData);
            $.ajax({
                // url:"/upload/image",
                url:"/article_image_upload",
                type:"post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.code == 1) {
                        $("#preview_photo").attr("src",data.url);
                        $("#productImg").val(data.path);
                        $('#pic').val(data.path);

                    } else {
                        alert(data.msg);
                    }
                },
                error:function(data) {
                    alert("上传失败")
                }
            });
        }
    </script>


@endsection

