<!DOCTYPE html>
<html>
    <head>
        <title>Basic Website</title>
        <meta name="language" content="English">
        <meta name="description" content="It is a website about education">
        <meta name="keywords" content="blog,cms blog">
        <meta name="author" content="Delowar">
        <link rel="stylesheet" href="{{asset('public/asset/font-awesome-4.5.0/css/font-awesome.css')}}">	
        <link rel="stylesheet" href="{{asset('public/asset/css/nivo-slider.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{asset('public/asset/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/asset/css/app.css')}}">
        <script src="{{asset('public/asset/js/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/asset/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>



        <script type="text/javascript">
$(window).load(function () {
    $('#slider').nivoSlider({
        effect: 'random',
        slices: 10,
        animSpeed: 500,
        pauseTime: 5000,
        startSlide: 0, //Set starting Slide (0 index)
        directionNav: false,
        directionNavHide: false, //Only show on hover
        controlNav: false, //1,2,3...
        controlNavThumbs: false, //Use thumbnails for Control Nav
        pauseOnHover: true, //Stop animation while hovering
        manualAdvance: false, //Force manual transitions
        captionOpacity: 0.8, //Universal caption opacity
        beforeChange: function () {},
        afterChange: function () {},
        slideshowEnd: function () {} //Triggers after all slides have been shown
    });
});
        </script>
    </head>

    <body>
        <div class="headersection templete clear">
            <a href="#">
                <div class="logo">
                    <img src="{{asset('public/asset/images/logo.png')}}" alt="Logo"/>
                    <h2>Website Title</h2>
                    <p>Our website description</p>
                </div>
            </a>
            <div class="social clear">
                <div class="icon clear">
                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
                <div class="searchbtn clear">
                    <form action="" method="post">
                        <input type="text" name="keyword" placeholder="Search keyword..."/>
                        <input type="submit" name="submit" value="Search"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="navsection templete">
            <ul>
                <li><a id="active" href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/about')}}">About</a></li>	
                <li><a href="{{URL::to('/category')}}">Category</a></li>	
                <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                @guest
                <li><a href="{{URL::to('/login')}}">Login</a></li>
                @if (Route::has('register'))
                <li><a href="{{URL::to('/register')}}">Sign Up</a></li>	
                @endif
                @else
                <li>
                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
                @endguest
            </ul>
        </div>


        <div class="slidersection templete clear">
            <div id="slider">
                <a href="#"><img src="{{asset('public/asset/images/slideshow/01.jpg')}}" alt="nature 1" title="This is slider one Title or Description" /></a>
                <a href="#"><img src="{{asset('public/asset/images/slideshow/02.jpg')}}" alt="nature 2" title="This is slider Two Title or Description" /></a>
                <a href="#"><img src="{{asset('public/asset/images/slideshow/03.jpg')}}" alt="nature 3" title="This is slider three Title or Description" /></a>
                <a href="#"><img src="{{asset('public/asset/images/slideshow/04.jpg')}}" alt="nature 4" title="This is slider four Title or Description" /></a>
            </div>

        </div>
        <div class="contentsection contemplete clear">
            @yield('main_content')
            <div class="sidebar clear">
                <div class="samesidebar clear">
                    <h2>Categories</h2>
                    <?php
                    $all_category = DB::table('category')->get()->where('publication_status', 1);
                    ?>
                    <ul>
                        @foreach($all_category as $value )
                        <li><a href="{{URL::to('/category-blog/'.$value->category_id)}}">{{$value->category_name}}</a></li>	
                        @endforeach
                    </ul>
                </div>
                <div class="samesidebar clear">
                    <h2>Popular Post</h2>
                    <?php
                    $popular_post = DB::table('post')->where('publication_status', 1)->orderBy('hit_counter', 'desc')->limit(5)->get();
                    ?>
                    <div class="popular clear">
                        @foreach($popular_post as $value )
                        <h5><a href="">{{$value->post_title}}</a>({{$value->hit_counter}})</h5>
                        @endforeach
                    </div>

                </div>
                <div class="samesidebar clear">
                    <h2>Latest articles</h2>
                    <?php
                    $recent_post = DB::table('post')->orderBy('post_id', 'desc')->limit(5)->get();
                    ?>
                    <div class="popular clear">
                        @foreach($recent_post as $value )
                        <h5 style="color:black"><a href="{{URL::to('/post-details/'.$value->post_id)}}">{{$value->post_title}}</a></h5>	
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="footersection templete clear">
                <div class="footermenu clear">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <p>&copy; Copyright Training with live project.</p>
            </div>
            <div class="fixedicon clear">
                <a href="http://www.facebook.com"><img src="{{asset('public/asset/images/fb.png')}}" alt="Facebook"/></a>
                <a href="http://www.twitter.com"><img src="{{asset('public/asset/images/tw.png')}}" alt="Twitter"/></a>
                <a href="http://www.linkedin.com"><img src="{{asset('public/asset/images/in.png')}}" alt="LinkedIn"/></a>
                <a href="http://www.google.com"><img src="{{asset('public/asset/images/gl.png')}}" alt="GooglePlus"/></a>
            </div>
            <script type="text/javascript" src="{{asset('public/asset/js/scrolltop.js')}}"></script>

    </body>
</html>

