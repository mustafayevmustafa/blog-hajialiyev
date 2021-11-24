<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,minimal-ui">
    <title>@yield('title', 'HAJIALIEV')</title>
    <link rel="icon" href="{{asset('assets/css/logo/title_logo.png')}}"/>

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/css/biznes.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/css/styleResponsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}"/>

    <link rel="stylesheet"
          href="{{asset('assets/css/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.css')}}"/>

    <script src="{{asset('assets/js/jquery-latest.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>

    <script src="https://kit.fontawesome.com/ebd3ca4071.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @if(\Illuminate\Support\Facades\App::environment() == 'production')
        <script id="https">
            if (location.href.indexOf('https:') !== 0) {
                location.href = location.href.replace('http:', 'https:');
                document.getElementById('https').remove();
            }
        </script>
    @endif
</head>
<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YVC0PBMQF7"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YVC0PBMQF7');
</script>
<header class="header">
    <div class="center">

        <div class="header_top  justify-content-between align-items-center">

            <div class="header_top_left ">
{{--                <button class="my_btn open_aside ">--}}
{{--                    <i class="fas fa-bars"></i>--}}
{{--                </button>--}}
                <button class="my_btn open_search">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <div class="header_top_middle">
                <h1>
                    <a href="{{route("home")}}">
                        <img src="{{asset('assets/css/logo/header_logo.png')}}" alt="header_logo"/>
                    </a>
                </h1>
            </div>
            <div class="header_top_right  flex align-items-center justify-content-between">
                <ul class="sosial_list  flex justify-content-between align-items-center ">

                    <li class="sosial_list_item">
                        <a href="http://fb.me/hajmagroupofcompanies%20" target="_self">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="sosial_list_item">
                        <a href="https://twitter.com/OfHajma" target="_self">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                    <li class="sosial_list_item">
                        <a href="http://instagram.com/hajma_group_of_companies/" target="_self">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>

                    <li class="sosial_list_item">
                        <a href="mailto:office@hajma.info" target="_self">
                            <i class="far fa-envelope"></i>
                        </a>
                    </li>


                </ul>
            </div>
        </div>

        <div class="header_bottom_container">
            <div class="header_bottom ">
                <div class="header_bottom_in">
                    <ul class="header_bottom_list flex  justify-content-center  " role="navigation">
                        @foreach($categories as $category)

                            @if (!empty($category->subcat))
                                <li class="header_bottom_list_item">
                                    <a href="{{route('category',$category->slug)}}">
                                        {{$category->name}}
                                    </a>

                                    @if(count($category->subcat) > 0)
                                        <ul class="header_bottom_list_item_dropdown_menu2 flex-column ">@endif
                                            @foreach($category->subcat as $sub)
                                                <li>
                                                    <a href="{{route('category',$sub->slug)}}">
                                                        {{$sub->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                            @if(count($category->subcat) > 0) </ul>@endif
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>

    </div>

    <div class="header_sticky py-2 ">
        <div class="center  flex  ">

                    <span>
                        <a href="#" target="_self">
                            <img src="{{asset('assets/css/logo/title_logo.png')}}" alt="stickylogo">
                        </a>
                    </span>

            <div class="header_bottom  ">
                <div class=" flex flex-column justify-content-center ">
                    <nav class="flex flex-column justify-content-center w-100">
                        <ul class="header_bottom_list  ">

                            @foreach($categories as $category)

                                @if (!empty($category->subcat))
                                    <li class="header_bottom_list_item">
                                        <a href="{{route('category',$category->slug)}}">
                                            {{$category->name}}
                                        </a>

                                        @if(count($category->subcat) > 0)
                                            <ul class="header_bottom_list_item_dropdown_menu2 flex-column ">@endif
                                                @foreach($category->subcat as $sub)
                                                    <li>
                                                        <a href="{{route('category',$sub->slug)}}">
                                                            {{$sub->name}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @if(count($category->subcat) > 0) </ul>@endif
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </nav>
                </div>
            </div>

        </div>

    </div>

    <div class="mobile_header ">

        <div class="center flex justify-content-between align-items-center  ">
            <div class="mobile_header_left">
                <div class="header_top_left flex justify-content-center align-items-center ">
                    <button class="my_btn open_aside ">
                        <i class="fas fa-bars"></i>
                    </button>

                </div>
            </div>

            <div class="mobile_header_center">
                <a href="{{route('home')}}" target="_self">
                    <img src="{{asset('assets/css/logo/mobil_header_logo.png')}}" alt="mobil_header_logo">
                </a>
            </div>

            <div class="mobile_header_right">

            </div>
        </div>

    </div>

</header>

@yield('content')


<footer>
    <div class="center">
        <div class=" widget_container row w-100  m-0">
            <div class="col-6">
                <h3 class="widget_title">
                    <span>
                      О нас
                    </span>
                </h3>
                <div class="text_widget">
                    <p>
                        @if(isset($about))
                        <img src="{{$about->image}}" alt="footer_banner">
                       @endif
                    @if(isset($about))
                        {{$about->text}}
                    @endif

                </div>
            </div>
            <div class="col-3">
                <h3 class="widget_title">
                    <span>
                        @if(isset($about))
                            {{$about->title}}
                        @endif
                    </span>
                </h3>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="center flex justify-content-between ">

            <div class="footer_bottom_info ">

                <div class="footer_logo">
                    <a href="#" target="_self">
                        <img src="{{asset('assets/css/logo/footer_logo.png')}}" alt="footer_logo"/>
                    </a>
                </div>

                <p class="footer_copyright" >
                        © 2021 -Все права защищены <a href="https://www.hajma.info/" target="_blank"> HajMa Group of Companies</a>
                </p>

            </div>

            <div class="footer_bottom_sosial">
                <ul class="footer_bottom_sosial_list ">

                    <li>
                        <a href="http://fb.me/hajmagroupofcompanies%20" target="_self">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/OfHajma" target="_self">
                            <i class="fab fa-twitter-square"></i>
                        </a>
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
        </div>
    </div>

</footer>

<div class="aside">
    <div class="aside_in">

        <ul class="aside_menu flex flex-column p-3">

            @foreach($categories as $category)

                @if (count($category->subcat) == 0)
                    <li>
                        <a href="{{route('category',$category->slug)}}">
                            {{$category->name}}
                        </a>
                    </li>
                @endif

                @if(count($category->subcat) > 0)
                    <li class="aside_submenu">
                        <div class="flex justify-content-between w-100  ">
                            <a data-toggle="collapse" href="#collapse1"
                               class="flex  justify-content-between w-100 ">
                                <p>  {{$category->name}}</p>
                                <span>
                            <i class="fas fa-angle-right"></i>
                        </span>
                            </a>

                        </div>

                        <div id="collapse1" class="panel-collapse collapse">
                            <ul class="aside_submenu_list  flex-column ">
                                @foreach($category->subcat as $sub)
                                    <li>
                                        <a href="{{route('category',$sub->slug)}}">
                                            {{$sub->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    </li>

                @endif
            @endforeach

        </ul>


        <ul class="sosial_list  flex justify-content-between align-items-center  p-3 ">
            <li class="sosial_list_item px-2 ">
                <a href="http://fb.me/hajmagroupofcompanies%20" title="Facebook">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>

            <li class="sosial_list_item  px-2  ">
                <a href="https://twitter.com/OfHajma" title="Twitter">
                    <i class="fab fa-twitter-square"></i>
                </a>
            </li>

            <li class="sosial_list_item px-2 ">
                <a href="http://instagram.com/hajma_group_of_companies/" title="instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>

            <li class="sosial_list_item  px-2 ">
                <a href="mailto:office@hajma.info" title="Mail">
                    <i class="far fa-envelope"></i>
                </a>
            </li>

        </ul>

        {{--        <form action="#" method="POST"  enctype="multipart/form-data"  id="aside_form"  class="m-3 " >--}}
        {{--            <div class="aside_input_block   flex justify-content-between align-items-center" >--}}
        {{--                <input type="text" placeholder="Type & hit enter" class="p-3" />--}}
        {{--                <button type="submit" title="Go"  class="p-3" >--}}
        {{--                    <i class="fas fa-search"></i>--}}
        {{--                </button>--}}
        {{--            </div>--}}
        {{--        </form>--}}
    </div>
</div>


<!-- Axtaris  -->
<div class="search_area">
    <div class="center  flex flex-column  justify-content-center align-items-center h-100 ">
                <span class="close_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                         class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </span>
        <div class="search_area_form_container">
            <form action="{{route('search')}}" method="GET" enctype="multipart/form-data" class="search_area_form">
                <div class="w-100 h-100 flex ">
                    <input type="text" name="search" placeholder="Поиск"/>
                    <button type="submit" title="Go">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
