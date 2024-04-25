@extends('layouts.login')

@section('content')


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


<div class="container-fluid">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
            <h1 class="display-3 text-primary my-5">Book Detail Page</h1>
                <div class="row g-4">
                    <div class="col-lg-6">
                        
                        <div class="border rounded">

                            <img src="{{  '/storage/'.$book->image}}" style="height:220px !important; width: 420px !important ;" class="img-fluid rounded" alt="Image">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">Name : {{$book->name}}</h4>
                        <h4 class="fw-bold mb-3">Category : {{$book->category->name}}</h4>
                        <h4 class="fw-bold mb-3">Author : {{$book->author->name}}</h4>
                        <h4 class="fw-bold mb-3">Status :   @if($book->status == 1)
                      <span class="badge badge-success">Avaliable</span>

                      @else
                      <span class="badge badge-warning">Issue</span>

                      @endif</h4>
                        

                       
              
                    </div>
                    <div class="col-lg-12">

                            <h4>Review : </h4>
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>{{$book->review}}</p>
                                <p>{{$book->review}}</p>
                              
                            </div>
                           
                            
                        </div>
                    </div>
                  
                 
                       
                    

                  
                </div>
            </div>
        </div>



    </div>
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