
@extends('layouts.login')

@section('content')



<div class="hero_area">
    <!-- header section strats -->
    <section class="slider_section">
        <div class="slider_container bg-primary">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            A Library
                                        </h1>
                                        <p>
                                            Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!-- end header section -->
    <!-- slider section -->



    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">

                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1 class="text-primary display-3">Our Book</h1>
                    </div>

                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 btn btn-primary rounded-pill active" href="{{ url("/list/all")}}">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            @foreach ($authors as $author)
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 text-light rounded-pill btn btn-primary" href="{{ url("/list/$author->id")}}">
                                    <span class="text-dark" style="width: 130px;">{{$author->name}}</span>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                        <div class="float-right mb-5">
                            <form action="{{ route('search') }}" method="POST">
                                @csrf

                                <label for="search_query">Search:</label>
                                <input type="text" id="search_query" name="query" placeholder="Enter search query">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach ($books as $book)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ '/storage/'.$book->image }}" style="height: 200px!important;" class="img-fluid w-100 rounded-top" alt="ttt">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$book->author->name}}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{$book->name}}</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div>
                                                    @if($book->status == 1)
                                                    <span class="badge badge-success" style="font-size: 16px;">Avaliable</span>

                                                    @else
                                                    <span class="badge badge-warning" style="font-size: 16px;">Issued</span>

                                                    @endif
                                                </div>
                                                <div class="d-flex justify-content-between flex-lg-wrap mt-3">

                                                    <a href="{{ url("/detail/$book->id")}}" class="btn btn-primary border border-secondary rounded-pill px-3 text-white">Details</a>

                                                    <!-- @if($book->status == 0)
                                                        @php
                                                           $issue =  $issues->where('book_id',$book->id);
                                                           dd($issue);
                                                        @endphp
                                                        <p>Return Date: {{$issue->return_date}}</p>
                                                    @endif -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- end slider section -->
    </div>



    <section class="info_section  layout_padding2-top">
        <div class="social_container">
            <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_form ">
                            <h5>
                                Newsletter
                            </h5>
                            <form action="#">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            NEED HELP
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span> Gb road 123 london Uk </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+01 12345678901</span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> demo@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section -->
        <footer class=" footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">Free Html Templates</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->

    </section>

    <!-- end info section -->


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="js/custom.js"></script>

    </body>

    </html>

    @endsection