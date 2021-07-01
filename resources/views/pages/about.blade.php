@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <script type="text/javascript">
        document.getElementById('about').className = "active";

    </script>

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About Us</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ol>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Section ======= -->
    <section class="about" data-aos="fade-up">
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
                        <li><i class="icofont-check-circled"></i> Google captcha for preventing unauthorized sign-up.</li>
                        <li><i class="icofont-check-circled"></i> Beatiful user profile where users can upload profile photos, add websites and edit informatin.
                        There is also option to view their own and favourite projects.</li>
                        <li><i class="icofont-check-circled"></i> Option to manually add project categories and view the projects of each category.</li>
                        <li><i class="icofont-check-circled"></i> User can create project workspace by form to store their projects.
                        They can also add partner and supervisor.</li>
                        <li><i class="icofont-check-circled"></i>  CK-Editor is implemented to add more features in description section.</li>
                        <li><i class="icofont-check-circled"></i> User can upload PDF, Presentation slide and source code. Slide can be presented in google slide. Files are uploaded in google drive.</li>
                        <li><i class="icofont-check-circled"></i> Owner can edit their project. users can request for editing access.</li>
                        <li><i class="icofont-check-circled"></i> A user can add a project to the favourite list. Any update on the project will be notified to the users via email.</li>
                        <li><i class="icofont-check-circled"></i> A user can rate or comment on any project.</li>
                        <li><i class="icofont-check-circled"></i> From the mail, the user can automatically visit the site.</li>
                        <li><i class="icofont-check-circled"></i> There are features for filtering and sorting the projects.</li>
                        <li><i class="icofont-check-circled"></i> For any query users can contact from the contact us section.</li>


                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <!--<section class="facts section-bg" data-aos="fade-up">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">232</span>
                    <p>Clients</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">521</span>
                    <p>Projects</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p>Hours Of Support</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Hard Workers</p>
                </div>

            </div>

        </div>
    </section>--><!-- End Facts Section -->

    <!-- ======= Our Skills Section ======= -->
    <!--<section class="skills" data-aos="fade-up">
        <div class="container">

            <div class="section-title">
                <h2>Our Skills</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="skills-content">

                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="skill">HTML <i class="val">100%</i></span>
                    </div>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="skill">CSS <i class="val">90%</i></span>
                    </div>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="skill">JavaScript <i class="val">75%</i></span>
                    </div>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="skill">Photoshop <i class="val">55%</i></span>
                    </div>
                </div>

            </div>

        </div>
    </section>--><!-- End Our Skills Section -->

    <!-- ======= Tetstimonials Section ======= -->
    <!--<section class="testimonials" data-aos="fade-up">
        <div class="container">

            <div class="section-title">
                <h2>Tetstimonials</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                        Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram
                        malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis
                        minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim
                        velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum
                        veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim
                        culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum
                        quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

            </div>

        </div>
    </section>--><!-- End Ttstimonials Section -->

</main><!-- End #main -->

@endsection
