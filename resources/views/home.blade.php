@extends('index')



@section('content')


    <main role="main">
        <div class="main_in  w-100">
            <div class="center">

                <section class="post_container flex ">

                    <div class="post_left_main  flex">

                        <div class="post_container_left">


                            @foreach($last_articles  as $key => $article)
                                @if($key != 0)
                                    <div class="post_item  flex">

                                        <div class="post_item_text">
                                            <h2>
                                                <a href="/article/{{$article->slug}}" target="_self"
                                                   class="post_item_title">
                                                    {{$article->title}}
                                                </a>
                                            </h2>
                                            <p class="excerpt">
                                                {!! $article->sub_title !!}

                                            </p>
                                        </div>

                                        <a href="{{route("articles.cat",$article->slug)}}" target="_self"
                                           class="post_item_img">
                                            <img src="{{$article->image}}">
                                        </a>

                                    </div>
                                @endif
                            @endforeach
                        </div>


                        <div class="post_container_center">
                            @if(isset($last_articles))
                                <div class="center_img_container" style="height:360px;">
                                    <figure class="h-100" >
                                        <a href="{{route("articles.cat",$last_articles[0]->slug)}}" target="_self">
                                            <img src="{{$last_articles[0]->image}}" alt="big_post"
                                                 class="center_post_img"/>
                                        </a>
                                    </figure>
                                </div>

                                <div class="center_post_text">
                                    <h2 class="center_post_title">
                                        <a href="#" target="_self">
                                            {{$last_articles[0]->title}}
                                        </a>
                                    </h2>
                                    <p class="center_post_excerpt">
                                        {!! $last_articles[0]->sub_title !!}
                                        {{--                                {{  \Illuminate\Support\Str::limit($last_articles[0]->content,100,'.....') }}--}}

                                    </p>

                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="post_container_right">
                        <div class="most_read_container">


                            <div class="most_read_heading">
                                <h2>
                                    Самое читаемое
                                </h2>
                            </div>

                            <div class="most_read_inner">
                                <ul class="most_read_list d-flex flex-column ">

                                    @foreach($mostRead as $i =>  $articles)
                                        <li class="most_read_item flex">

                                            <span class="most_read_step">{{$i+1}}</span>
                                            <div class="flex flex-column ">
                                            <span class="most_read_title">
                                               <a href="{{route("articles.cat",$articles->slug)}}">
                                                   {{$articles->title}}
                                               </a>
                                            </span>
                                                <span class="most_read_excerpt">
                                            {!! $articles->sub_title !!}

                                            </span>
                                            </div>
                                        </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                </section>

                {{--            start of mail loop--}}

                @foreach($categoryArticles as $key => $value)

                    @if($key == 0)
                        <section class="biznes_container">

                            <div class="section_heading_container  flex justify-content-between align-items-center ">
                                <h2>
                                    {{$value->name}}
                                </h2>
                                <a href="category/{{$value->slug}}" target="_self">
                                    Смотреть все
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </a>
                            </div>


                            <div class="biznes_items_container flex ">
                                @foreach((array) json_decode($value->articles) as $article)
                                    <div class="biznes_item">
                                        <div class="biznes_img_container">
                                            <a href="{{route("articles.cat",$article->slug)}}" target="_self">
                                                <img src="{{$article->image}}">
                                            </a>
                                        </div>
                                        <div class="biznes_text">
                                            <a href="#" target="_self" class="biznes_title">
                                                {{$article->title}}
                                            </a>
                                            <p class="biznes_excerpt">
                                                {!! $article->sub_title !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </section>
                    @endif

                    @if($key == 1)
                        <section class="swift_container">

                            <div class="section_heading_container  flex justify-content-between align-items-center ">
                                <h2>
                                    {{$value->name}}
                                </h2>
                                <a href="category/{{$value->slug}}" target="_self">
                                    Смотреть все
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </a>
                            </div>

                            <div class="swift_main flex ">

                                <div class="swift_left_container flex ">
                                    @if(isset(json_decode($value->articles)[0]))
                                        <div class="swift_main_left">

                                            <div class="swift_main_left_img_container">
                                                <a href="{{route("articles.cat",json_decode($value->articles)[0]->slug)}}" target="_self">
                                                    <img src="{{json_decode($value->articles)[0]->image}}">
                                                </a>
                                            </div>

                                            <div>

                                                <div class="swift_main_left_text_container">
                                                    <h2>
                                                        <a href="#">
                                                            {{json_decode($value->articles)[0]->title}}
                                                        </a>
                                                    </h2>
                                                    <p class="swift_main_left_excerpt">
                                                        {!! json_decode($value->articles)[0]->sub_title !!}
                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                    @endif

                                    @if(isset(json_decode($value->articles)[1]))
                                        <div class="swift_main_center">
                                            <div class="swift_center_img_container">
                                                <a href="{{route("articles.cat",json_decode($value->articles)[1]->slug)}}" target="_self">
                                                    <img src="{{json_decode($value->articles)[1]->image}}">

                                                </a>
                                            </div>

                                            <div class="swift_center_text_container">
                                                <h2>
                                                    <a href="#" target="_self" class="swift_center_title">
                                                        {{json_decode($value->articles)[1]->title}}
                                                    </a>
                                                </h2>
                                                <p class="swift_center_excerpt">
                                                    {!! json_decode($value->articles)[1]->sub_title !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>


                                <div class="swift_main_right">
                                    @foreach((array) json_decode($value->articles) as $key2 => $article)
                                        @if($key2 != 0 && $key2 != 1)
                                            <div class="swift_right_post">
                                                <div class="swift_rigth_post_img">
                                                    <a href="{{route("articles.cat",$article->slug)}}" target="_self">
                                                        <img src="{{$article->image}}">
                                                    </a>
                                                </div>
                                                <h2 class="swift_right_post_title">
                                                    <a href="{{route("articles.cat",$article->slug)}}" target="_self">{{$article->title}}</a>
                                                </h2>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>

                            </div>

                        </section>
                    @endif

                    @if($key == 2)
                        <section class="opinion ">
                            <div class="section_heading_container  flex justify-content-between align-items-center ">
                                <h2>
                                    {{$value->name}}
                                </h2>
                                <a href="category/{{$value->slug}}" target="_self">
                                    Смотреть все
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </a>
                            </div>

                            <div class="opinion_main">
                                @if(isset(json_decode($value->articles)[0]))

                                    <div class="opinion_left_side">
                                        <h2>
                                            <a class="opinion_left_title" href="{{route("articles.cat",json_decode($value->articles)[0]->slug)}}" target="_self">
                                                {{json_decode($value->articles)[0]->title}}
                                            </a>
                                        </h2>

                                        <div class="opinion_left_excerpt">
                                            <p>
                                                {{json_decode($value->articles)[0]->sub_title}}
                                            </p>
                                        </div>

                                        <a href="category/{{$value->slug}}" class="keep_reading    ">
                                            ПРОДОЛЖАЙ ЧИТАТЬ
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor"
                                                 class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </a>

                                    </div>

                                    <div class="opinion_right_side">

                                        <figure class="opinion_right_img">
                                            <a href="{{route("articles.cat",json_decode($value->articles)[0]->slug)}}" target="_self">
                                                <img src="{{json_decode($value->articles)[0]->image}}">
                                            </a>
                                        </figure>

                                    </div>
                                @endif

                            </div>
                        </section>
                    @endif

                    @if($key == 3)
                        <section class="arts_travel_container flex  ">

                            <div class="art_side">

                                <div class="section_heading_container  flex justify-content-between align-items-center ">
                                    <h2>
                                        {{$value->name}}
                                    </h2>
                                    <a href="category/{{$value->slug}}" target="_self">
                                        Все
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </a>
                                </div>

                                <div class="art_items_container flex justify-content-between ">

                                    @if(isset(json_decode($value->articles)[0] ))

                                        <div class="art_item">

                                            <div class="art_item_img_container">
                                                <a href="{{route("articles.cat",json_decode($value->articles)[0]->slug)}}" target="_self">
                                                    <img src="{{json_decode($value->articles)[0]->image}}">
                                                </a>
                                            </div>

                                            <h2 class="art_item_title">
                                                <a href="{{route("articles.cat",$articles->slug)}}" target="_self">
                                                    {{json_decode($value->articles)[0]->title}}
                                                </a>
                                            </h2>

                                            <p class="art_item_excerpt">
                                                {!! json_decode($value->articles)[0]->sub_title !!}

                                            </p>


                                        </div>
                                    @endif
                                    @if(isset(json_decode($value->articles)[1]))

                                        <div class="art_item">

                                            <div class="art_item_img_container">
                                                <a href="{{route("articles.cat",json_decode($value->articles)[1]->slug)}}" target="_self">
                                                    <img src="{{json_decode($value->articles)[1]->image}}">
                                                </a>
                                            </div>

                                            <h2 class="art_item_title">
                                                <a href="{{route("articles.cat",$articles->slug)}}" target="_self">
                                                    {{json_decode($value->articles)[1]->title}}
                                                </a>
                                            </h2>

                                            <p class="art_item_excerpt">
                                                {!!json_decode($value->articles)[1]->sub_title  !!}

                                            </p>
                                        </div>

                                    @endif
                                </div>

                            </div>

                        </section>
                    @endif

                    @if($key == 4)
                        <section class="food">

                            <div class="section_heading_container  flex justify-content-between align-items-center ">
                                <h2>
                                    {{$value->name}}
                                </h2>
                                <a href="category/{{$value->slug}}" target="_self">
                                    Смотреть все
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor"
                                         class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </a>
                            </div>

                            <div class="food_main_div flex ">

                                <div class="food_left flex ">

                                    <div class="food_left_litlle_items">

                                        <div class="food_litlle_item">

                                            @if(isset(json_decode($value->articles)[0]))
                                                <div class="litlle_item_img">
                                                    <a href="{{route("articles.cat",json_decode($value->articles)[0]->slug)}}" target="_self">
                                                        <img src="{{json_decode($value->articles)[0]->image}}">
                                                    </a>
                                                </div>

                                                <h2 class="little_item_title">
                                                    <a href="{{route("articles.cat",json_decode($value->articles)[0]->slug)}}" target="_self">{{json_decode($value->articles)[0]->title}}</a>
                                                </h2>
                                        </div>
                                        @endif


                                        <div class="food_litlle_item  mt-5 ">

                                            @if(isset(json_decode($value->articles)[1]))
                                                <div class="litlle_item_img">
                                                    <a href="{{route("articles.cat",json_decode($value->articles)[1]->slug)}}" target="_self">
                                                        <img src="{{json_decode($value->articles)[1]->image}}">

                                                    </a>
                                                </div>

                                                <h2 class="little_item_title">
                                                    <a href="#" target="_self">
                                                        <a href="{{route("articles.cat",json_decode($value->articles)[1]->slug)}}" target="_self">{{json_decode($value->articles)[1]->title}}</a>
                                                    </a>
                                                </h2>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="food_left_big_item">
                                        @if(isset(json_decode($value->articles)[2]))
                                            <div class="big_item_img">
                                                <a href="{{route("articles.cat",json_decode($value->articles)[2]->slug)}}" target="_self">
                                                    <img src="{{json_decode($value->articles)[2]->image}}">
                                                </a>
                                            </div>

                                            <div>
                                                <h2 class="big_item_title">
                                                    <a href="{{route("articles.cat",json_decode($value->articles)[2]->slug)}}" target="_self">{{json_decode($value->articles)[2]->title}}</a>
                                                </h2>
                                                <p class="big_item_excerpt">
                                                    {!! json_decode($value->articles)[2]->sub_title !!}
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div class="food_right">
                                    @if(isset(json_decode($value->articles)[3]))

                                        <div class="food_right_img">
                                            <a href="{{route("articles.cat",json_decode($value->articles)[3]->slug)}}" target="_blank">
                                                <img src="{{json_decode($value->articles)[3]->image}}">
                                            </a>
                                        </div>

                                        <h2 class="food_right_title">
                                            <a href="#">
                                                <a href="{{route("articles.cat",json_decode($value->articles)[3]->slug)}}" target="_self">{{json_decode($value->articles)[3]->title}}</a>
                                            </a>
                                        </h2>

                                        <p class="food_right_excerpt">
                                            {!! json_decode($value->articles)[3]->sub_title !!}

                                        </p>
                                    @endif
                                </div>

                            </div>

                        </section>
                    @endif

                @endforeach
                {{--            <section class="newsletter">--}}

                {{--                <div class="newsletter_in">--}}
                {{--                    <div class="newsletter_text">--}}
                {{--                        <h2 class="newsletter_title">--}}
                {{--                            newsletter--}}
                {{--                        </h2>--}}
                {{--                        <h3 class="newsletter_excerpt">--}}
                {{--                            Get daily news into your inbox--}}
                {{--                        </h3>--}}
                {{--                    </div>--}}
                {{--                    <form class="newsletter_form" action="#" method="POST" enctype="multipart/form-data">--}}
                {{--                        <input type="text" placeholder="Your Name"/>--}}
                {{--                        <input type="email" placeholder="Your Email"/>--}}
                {{--                        <button type="submit">--}}
                {{--                            sign up--}}
                {{--                        </button>--}}
                {{--                    </form>--}}
                {{--                </div>--}}

                {{--            </section>--}}


                <section class="latest">

                    <div class="section_heading_container  flex justify-content-between align-items-center ">
                        <h2>
                            ПОСЛЕДНИЙ
                        </h2>
                        <a href="{{route('search')}}" target="_self">
                            Смотреть все
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="latest_container flex ">

                        <div class="latest_left">


                            <!-- Lates -->










                            <div class="last-articles">

                                @foreach($last_articles  as $article)

                                    @if(isset($article))
                                        <div class="latest_left_item  flex  justify-content-between ">

                                            <div class="latest_left_item_text">

                                                <ul class="latest_left_category_list">

                                                    <li>
                                                        <a href="category/{{$article->getCategory->slug}}" target="_self" class="list_item_link" style="">
                                                            {{$article->getCategory->name}}  </a>
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
                                    @endif

                                @endforeach
                            </div>

                            <button  type="submit" class="view_all_btn mt-5"  style="color:#fff;">
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
                                            url: "{{route('articles1.load')}}",
                                            data: {
                                                skip1,
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

                                <h2 class="latest_recent_post_title">Последние Посты</h2>
                                @foreach($last_articles  as $article)

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



                            @if(isset($reklams))
                                <div class="latest_about_us">
                                    <div class="latest_about_us_img   w-50">
                                        <img src="{{$reklams->image}}"
                                             alt="about_Us_img">
                                    </div>

                                    <h3 class="latest_about_us_title">{{$reklams->title}}</h3>

                                    <p class="latest_about_us_excerpt">
                                        {{$reklams->text}}
                                    </p>
                                </div>
                            @endif

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
                        @foreach($last_articles  as  $article)
                            <div class="mobile_main_item">
                                <div class="mobile_main_img w-100">
                                    <a class="mobile_main_link w-100 "  href="{{route("articles.cat",$article->slug)}}">
                                        <img class="w-100 h-100 "  src="{{$article->image}}" alt="item_img" style="object-fit: cover">
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
                var skip = 1;
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
                               url: "{{route('articles.load')}}",
                               data: {
                                   skip
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
                                   loading = false;
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

