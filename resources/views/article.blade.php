<link rel="stylesheet" href="{{asset('assets/css/singlePage.css')}}" />

@extends('index')

@section('content')

    <main role="main" >
        <div class="center" >

            <div class="single_center" >

                <div class="flex  flex-column" >

{{--                    <ul class="latest_left_category_list">--}}
{{--                        <li>--}}
{{--                            <a href="#" target="_self" class="list_item_link" style="margin-top:3px;">--}}
{{--                                Category--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    <div class="page_title" >
                        <h1 style="font-family: 'Roboto BOLD';" >
                            {{$article->title}}
                        </h1>
                    </div>

                    <div class="page_excerpt" >
                        {{$article->sub_title}}
                    </div>
                </div>

            </div>

            <div class="main_img" >
                <img src="{{$article->image}}">
            </div>

            <div class="single_center" >
{{--                <div class="share_this flex " >--}}
{{--                    <span> Share this  </span>--}}
{{--                    <div>--}}
{{--                        <ul class="sosial_network_list"  >--}}

{{--                            <li class="sosial_list_item " data-title="Facebook"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-facebook-f"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-facebook-messenger"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-twitter"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-pinterest-p"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-linkedin-in"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-whatsapp"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-reddit-alien"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="far fa-envelope"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="mt-3">
                    {!! $article->content !!}
                </div>
            </div>

        </div>

        <div class="center" >
            <div class="single_center" >
{{--                <div class="share_this flex " >--}}
{{--                    <span> Share this  </span>--}}
{{--                    <div>--}}
{{--                        <ul class="sosial_network_list"  >--}}

{{--                            <li class="sosial_list_item " data-title="Facebook"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-facebook-f"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-facebook-messenger"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-twitter"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-pinterest-p"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-linkedin-in"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-whatsapp"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="fab fa-reddit-alien"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="sosial_list_item " data-title="Mesenger"  >--}}
{{--                                <a href="#" target="_self" >--}}
{{--                                    <i class="far fa-envelope"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="single_tags" >--}}
{{--                    <ul class="single_tags_list" >--}}

{{--                        <li>--}}
{{--                            <a href="#" target="_self" >Asia</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="#" target="_self" >journal</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="#" target="_self" >tech</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="#" target="_self" >travel</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="#" target="_self" >usa</a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </div>--}}


{{--                <div class="author_box flex " >--}}

{{--                    <div class="author_avatar" >--}}
{{--                        <a href="#" target="_self" >--}}
{{--                            <img src="{{asset('assets/images/default_author_img.png')}}" alt="author_img">--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="author_text" >--}}
{{--                        <h3 class="author_name" >--}}
{{--                            <a href="#" target="_self">--}}
{{--                                Investor Hajialiev--}}
{{--                            </a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}

{{--                </div>--}}

            </div>

            <div class="latest_from_blog" >
                <div class="lfb_block_heading" >
                    <h3>
                        ПОСЛЕДНИЕ ИЗ БЛОГА
                    </h3>
                </div>
                <div class="lfb_block_in flex " >
                    @foreach($last_articles  as $article)

                    <div class="lfb_item" >

                        <div class="item_img_container" >
                            <a href="{{route("articles.cat",$article->slug)}}" target="_self" >
                                <img src="{{$article->image}}">
                            </a>
                        </div>

                        <div class="item_heading" >
                            <h2>
                                <a href="{{route("articles.cat",$article->slug)}}" target="_self" >
                                    {{$article->title}}

                                </a>
                            </h2>
                        </div>

                        <p class="item_excerpt" >
                            {{$article->sub_title}}

                        </p>
                    </div>

                    @endforeach
                </div>
            </div>

        </div>

    </main>


@endsection

