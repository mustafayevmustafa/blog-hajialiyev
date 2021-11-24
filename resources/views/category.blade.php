
@extends('index')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'HAJIALIEV')</title>
    <link rel="stylesheet" href="{{asset('assets/css/biznes.css')}}" />

</head>
<body>

@section('content')
    <main role="main">
        <div class="main_in  w-100">
            <div class="center">

            <section  class="page_heading" >

                <div class="title_area" >
                    <h1 class="section_title" >
                        {{$category->name}}
                    </h1>
                </div>

                <div class="page_excerpt_area" >
                    <p>
                        {{$category->category_title}}

                    </p>
                </div>

            </section>

            <section class="latest">

                <div class="section_heading_container  flex justify-content-between align-items-center ">
                    <h2>
                        последний
                    </h2>
                </div>

                <div class="latest_container flex ">

                    <div class="latest_left">


                        <!-- Lates -->


                        <div class="last-articles">

                        @foreach($articles as $article)
                            <div class="latest_left_item  flex  justify-content-between ">

                                <div class="latest_left_item_text">

                                    <ul class="latest_left_category_list">
                                        <li>
                                            <a href="{{route("articles.cat",$article->slug)}}" target="_self" class="list_item_link" style="">
                                                {{$article->name}}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" target="_self" class="list_item_link">
                                                {{$article->title}}/{{$category->name}}

                                            </a>
                                        </li>


                                    </ul>

                                    <h2 class="left_item_title">
                                        <a href="{{route("articles.cat",$article->slug)}}" target="_self">
                                            {{$article->title}}
                                        </a>
                                    </h2>

                                    <p class="latest_left_item_excerpt">
                                        {!!$article->sub_title  !!}

                                    </p>

                                </div>

                                <div class="latest_left_item_img">
                                    <a href="{{route("articles.cat",$article->slug)}}" target="_self">
                                        <img src="{{$article->image}}">

                                    </a>
                                </div>

                            </div>
                                @endforeach
                        </div>


                        <button type="submit" class="view_all_btn mt-5 " style="color:#fff;">
                            Смотреть ещё
                        </button>

                        <script>
                            var skip1 = 5;
                            var allLoaded1 = false;
                            var loading1 = false;
                            $('.view_all_btn').click(function(){
                                if(!allLoaded1 && !loading1){
                                    $.ajax({
                                        type: "GET",
                                        url: "{{route('categories1.load')}}",
                                        data: {
                                            skip1,
                                            category: {{$category->id}},

                                        },
                                        beforeSend: function (){
                                            $('.view_all_btn').attr('disabled', true);
                                            loading1 = true;
                                        },
                                        success: function (data) {
                                            loading1 = false;
                                            $('.view_all_btn').attr('disabled', false);

                                            if(!data.length){
                                                allLoaded1 = true;
                                                $('.view_all_btn').addClass('d-none');
                                                return;
                                            }

                                            data.forEach(function(article){
                                                $('.last-articles').append(article);
                                            });
                                        },
                                        error: function (err) {
                                            loading1 = true;
                                            console.log(err.message);
                                        }
                                    });
                                    skip1 += 5;
                                }
                            });
                        </script>



                    </div>

                    <div class="latest_right">

                        <div class="latest_recent_posts">

                            <h2 class="latest_recent_post_title">Недавние Посты</h2>
                            @foreach($articles  as $article)

                                <ul class="latest_recent_post_list flex flex-column">
                                    <li>
                                    <li>
                                        <a href="{{route("articles.cat",$article->slug)}}" target="_self">
                                            {{$article->title}}
                                        </a>
                                    </li>
                                </ul>
                            @endforeach

                        </div>

                        <div class="follow">

                            <h3 class="follow_title">СЛЕДИТЬ</h3>

                            <ul class="latest_sosial_list">
                                <li>
                                    <a href="http://fb.me/hajmagroupofcompanies%20" target="_self">
                                        <i class="fab fa-facebook-f"></i>                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/OfHajma" target="_self">
                                        <i class="fab fa-twitter"></i>                                    </a>
                                </li>
                                <li>
                                    <a href="http://instagram.com/hajma_group_of_companies/" target="_self">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="mailto:office@hajma.info" target="_self">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </li>


                            </ul>
                        </div>


                        <div class="the_box_magazine">
                            <a href="#" target="_self">
                                @if(isset($reklams))
                                <img src="{{$reklams->image}}" alt="reklam">
                                @endif
                            </a>
                        </div>


                    </div>

                </div>

            </section>
            </div>

        </div>
        <div class="mobile_main w-100 ">
            <div class="center">
                <div class="mobile_main_container w-100">
                    <div class="articles-data">
                        @foreach($articles as $article)
                            <div class="mobile_main_item">
                                <div class="mobile_main_img w-100">
                                    <a class="mobile_main_link w-100 "  href="{{route("articles.cat",$article->slug)}}">
                                        <img class="w-100"  src="{{$article->image}}" alt="item_img" style="object-fit: cover">
                                    </a>
                                </div>

                                <div class="mobile_main_title w-100" >
                                    <a href="/article/{{$article->slug}}">
                                        <h2>
                                            {{$article->title}}
                                        </h2>
                                    </a>
                                </div>

                                <div class="mobile_main_category w-100">
                                    <a href="#">
                                        {{$article->getCategory->name}}
                                    </a>
                                </div>

                                <div class="mobile_main_excerpt w-100">
                                    <p>
                                        {!! $article->sub_title !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="article-loader" class="w-100 d-none">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var skip = 5;
                var allLoaded = false;
                var loading = false;
                $(window).scroll(function () {
                    if($(window).width() > 480) return;
                    // console.log("window height:" + $(window).height());
                    // console.log("scroll top:" + $(window).scrollTop());
                    // console.log("document height:" +  $(document).height());
                    // $(window).height() + $(window).scrollTop() == $(document).height()
                    if ($(window).scrollTop() >  $(document).height() - $(window).height() - 100) {
                        if(!allLoaded && !loading){
                            $.ajax({
                                type: "GET",
                                url: "{{route('categories.load')}}",
                                data: {
                                    skip,
                                    category: {{$category->id}},
                                },
                                beforeSend: function (){
                                    $('#article-loader').removeClass('d-none');
                                    loading = true;
                                },
                                success: function (data) {
                                    loading = false;
                                    $('#article-loader').addClass('d-none');

                                    if(!data.length){
                                        allLoaded = true;
                                        return;
                                    }

                                    data.forEach(function(article){
                                        $('.articles-data').append(article);
                                    });
                                },
                                error: function (err) {
                                    loading = true;
                                    console.log(err.message);
                                }
                            });
                            skip += 5;
                        }
                    }
                });
            </script>
        </div>

    </main>
@endsection






</body>
</html>