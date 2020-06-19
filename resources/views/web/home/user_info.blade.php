@extends('web.home.Base')


@section('content')

    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                    {{--                <img src="assets/img/background.jpg" alt="...">--}}
                </div>
                <div class="content">
                    <div class="author">
                        {{--                    <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="...">--}}
                        <h4 class="title"> {{$info->username}}<br>
                            <a href="#"><small>{{$info->email}}</small></a>
                        </h4>
                    </div>
                    <p class="description text-center">
                        "I like the way you work it <br>
                        No diggity <br>
                        I wanna bag it up"
                    </p>
                </div>
                <hr>
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <h5><a class="price"></a><br><small>余额</small></h5>
                        </div>
                        <div class="col-md-3">
                            <h5>24.60<br><small>昨日消费</small></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>{{$info->article}}/条<br><small>发布素材</small></h5>
                        </div>

                        <div class="col-md-12">
                           开启时间： <h5> <a class="open_time"></a> </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('myJS')
    <script type="text/javascript">


        window.onload = function () {
            getPrice();
        }

        function getPrice() {
            setTimeout(getPrice,5*1000);
            $.ajax({
                url: '{{route('user.price')}}',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    console.log(data.price)
                    $('.price').html(data.price);
                    $('.open_time').html(data.open_time);
                }
            })
        }


    </script>
@endsection