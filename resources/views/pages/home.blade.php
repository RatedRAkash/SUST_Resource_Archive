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
                        <div class="section-title">
                            <h2>Categories</h2>
                        </div>
                        <div class="container">

                            <div class="row">


                                @foreach ($categories as $row)

                                <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ URL::to($row->image) }}" alt="...">
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title"><a
                                                    href="{{url('categories.show.'.$row->id)}}">{{ $row->category_name }}</a>
                                            </h5>
                                            <p class="card-text">{{ $row->category_description }}</p>
                                            <div class="read-more"><a href="{{url('categories.show.'.$row->id)}}"><i
                                                        class="icofont-arrow-right"></i> Read More</a></div>
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
            <div class="container">
                <br>
                <div class="section-title">
                    <h2>Projects</h2>
                </div>
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
                                            href="">{{ $row->commentsection->count() }} Comments</a></li>
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

            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>SUST CSE RESOURCE ARCHIEVE</h3>
                        <p class="font-italic">
                            The features we provides:
                        </p>
                        <ul>
                            <li><i class="icofont-check-circled"></i> User register and login</li>
                            <li><i class="icofont-check-circled"></i> Google captcha for preventing unauthorized
                                sign-up.</li>
                            <li><i class="icofont-check-circled"></i> Beatiful user profile where users can upload
                                profile photos, add websites and edit informatin.
                                There is also option to view their own and favourite projects.</li>
                            <li><i class="icofont-check-circled"></i> Option to manually add project categories and view
                                the projects of each category.</li>
                            <li><i class="icofont-check-circled"></i> User can create project workspace by form to store
                                their projects.
                                They can also add partner and supervisor.</li>
                            <li><i class="icofont-check-circled"></i> CK-Editor is implemented to add more features in
                                description section.</li>
                            <li><i class="icofont-check-circled"></i> User can upload PDF, Presentation slide and source
                                code. Slide can be presented in google slide. Files are uploaded in google drive.</li>
                            <li><i class="icofont-check-circled"></i> Owner can edit their project. users can request
                                for editing access.</li>
                            <li><i class="icofont-check-circled"></i> A user can add a project to the favourite list.
                                Any update on the project will be notified to the users via email.</li>
                            <li><i class="icofont-check-circled"></i> A user can rate or comment on any project.</li>
                            <li><i class="icofont-check-circled"></i> From the mail, the user can automatically visit
                                the site.</li>
                            <li><i class="icofont-check-circled"></i> There are features for filtering and sorting the
                                projects.</li>
                            <li><i class="icofont-check-circled"></i> For any query users can contact from the contact
                                us section.</li>


                        </ul>
                    </div>
                </div>

            </div>



        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->

@endsection
