
@extends('index')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'HAJIALIEV')</title>
    <link rel="stylesheet" href="{{asset('assets/css/biznes.css')}}" />
    <style>
        .search form {
            margin-top: 30px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 15px;
        }

        .search form  input {
            width: 50%;
        }

        .biznes_items_container > div{
            width: 25%;
        }
        .biznes_items_container > div:nth-child(4n){
            border: none !important;
        }


    </style>

</head>
<body>

@section('content')
    <main role="main">
        <div class="center">
{{--            axtaris--}}
{{--            <section class="search">--}}
{{--                <form action="#" method="post" enctype="multipart/form-data">--}}
{{--                    <input type="text" placeholder="Search">--}}
{{--                </form>--}}
{{--            </section>--}}
            <section>
                <div class="biznes_items_container flex mt-5 " >
                    @foreach($data as $article)

                    <div class="biznes_item">
                        <div class="biznes_img_container" >
                            <a href="{{route("articles.cat",$article->slug)}}" target="_self" >
{{--                                <img src="{{$domain}}/{{$article->image}}">--}}
                                <img src="{{$article->image}}">

                            </a>
                        </div>
                        <div class="biznes_text" >
                            <a href="{{route("articles.cat",$article->slug)}}"  target="_self" class="biznes_title" >
                                {{$article->title}}
                            </a>
                            <p class="biznes_excerpt" >
                                {{$article->sub_title}}
                            </p>
                        </div>
                    </div>

                    @endforeach




                </div>
            </section>

            {{$data->links('pagination.default')}}

        </div>
    </main>

@endsection



</body>
</html>