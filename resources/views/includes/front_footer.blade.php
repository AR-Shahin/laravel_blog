<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <h6 class="text-white">{{$link->text}}</h6>
                </div>
                <div class="contact-details">
                    <p>{{$link->address}}</p>
                    <p>Phone: {{$link->phone}}</p>
                    <p>Email: <a href="mailto:{{$link->email}}">{{$link->email}}</a></p>
                    <ul class="social-menu">
                        <li class="list-inline-item"><a href="{{$link->fb}}"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="{{$link->tw}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="{{$link->insta}}"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="{{$link->linke}}"><i class="fa fa-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="{{$link->pin}}"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menus d-flex">
                    <ul class="list-unstyled">
                        <li> <a href="{{route('users.profile')}}">My Account</a></li>
                        <li> <a href="#">Add Listing</a></li>
                        <li> <a href="#">Pricing</a></li>
                        <li> <a href="#">Privacy &amp; Policy</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li> <a href="#">Our Partners</a></li>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">How It Works</a></li>
                        <li> <a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-posts">
                    @foreach($top_posts as $tp)
                    <a href="{{route('single.post',$tp->slug)}}">
                        <div class="post d-flex align-items-center">
                            <div class="image"><img src="{{asset($tp->image)}}" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>{{$tp->title}}</strong><span class="date last-meta">{{$tp->created_at->format('F j, Y')}}</span></div>
                        </div></a>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>{{$site->copyright}}</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">{{$site->footer_txt}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- JavaScript files-->
<script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('frontend')}}/vendor/popper.js/umd/popper.min.js"> </script>
<script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="{{asset('frontend')}}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/wow.min.js"></script>
<script src="{{asset('frontend')}}/js/front.js"></script>
<script src="{{asset('frontend')}}/js/custom.js"></script>
<script src="{{asset('asset')}}/ajax.js"></script>
</body>
</html>