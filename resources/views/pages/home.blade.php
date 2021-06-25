@extends('layouts.mainLayout')

@section('content')

<script type="text/javascript">
    document.getElementById('header').className = "fixed-top header-transparent";
    document.getElementById('home').className = "active";
</script>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Welcome to <span>Resource Archive</span></h2>
                <p class="animated fadeInUp">"A resource sharing platform for CSE, SUST."</p>
                <a href="" class="btn-get-started animated fadeInUp">Get Started</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Welcome to <span>Resource Archive</span></h2>
                <p class="animated fadeInUp">"One platform to get idea, build idea, share idea."</p>
                <a href="" class="btn-get-started animated fadeInUp">Get Started</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Welcome to <span>Resource Archive</span></h2>
                <p class="animated fadeInUp">"Create project, make research, get community support and so on!!!"</p>
                <a href="" class="btn-get-started animated fadeInUp">Get Started</a>
            </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">




                <!-- ======= Category Details Section ======= -->
                    <section class="service-details">

                        <div class="container">

                        <div class="row">


                        @foreach ($categories as $row)

                        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ URL::to($row->image) }}" alt="...">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{url('categories.show.'.$row->id)}}">{{ $row->category_name }}</a></h5>
                                    <p class="card-text">{{ $row->category_description }}</p>
                                    <div class="read-more"><a href="{{url('categories.show.'.$row->id)}}"><i class="icofont-arrow-right"></i> Read More</a></div>
                                </div>

                            </div>

                        </div>
                    @endforeach

                    </section><!-- End Category Details Section -->

                </div><!-- End blog entries list -->

        </div><!-- End container -->

    </section><!-- End Category Section -->


    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
        <!-- ======= Blog Section ======= -->
        <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">>
            @foreach($projects as $row)
                <br>
                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry">

                            <div class="entry-img">
                                <img src="{{ URL::to($row->image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{url('projects.show.'.$row->id)}}">{{ $row->project_name }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                            href="blog-single.html">{{ $row->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                            href=""><time datetime="2020-01-01">{{ $row->created_at }}</time></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a
                                            href="">{{ $row->commentsection->count() }}  Comments</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                {!!$row->project_description!!}
                                </p>
                                <div class="read-more">
                                    <a href="{{url('projects.show.'.$row->id)}}">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->

                    </div><!-- End blog entries list -->

                </div>
                @endforeach
            </div>

        </section><!-- End Blog Section -->

    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section class="features">
        <div class="container">

            <div class="section-title">
                <h2>Features</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit
                    in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="assets/img/features-1.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="assets/img/features-2.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">
                    <h3>Corporis temporibus maiores provident</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="assets/img/features-3.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5">
                    <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
                    <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit
                        aut
                        quia voluptatem hic voluptas dolor doloremque.</p>
                    <ul>
                        <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                        <li><i class="icofont-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                    </ul>
                </div>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="assets/img/features-4.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">
                    <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->

@endsection
