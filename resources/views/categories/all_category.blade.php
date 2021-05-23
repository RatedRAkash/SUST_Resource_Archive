@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <script type="text/javascript">
        document.getElementById('categories').className = "active";
    </script>

    <!-- ======= Our Services Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Categories</h2>
                <ol>
                    @if(!Auth::guest())
                    <a href="{{url('/categories.create')}}" class="btn btn-success">Add Category</a>
                    @endif
                </ol>

            </div>


        </div>
    </section><!-- End Our Categories Section -->

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

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="{{url('/categories.search')}}">
                                    @if(@isset($search_text))
                                        <input type="text" name="query" value="{{$search_text}}">
                                        <button type="submit"><i class="icofont-search"></i></button>
                                    @else
                                        <input type="text" name="query">
                                        <button type="submit"><i class="icofont-search"></i></button>
                                    @endif
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Categories</h3>

                        @foreach ($categories as $row)
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="{{url('categories.show.'.$row->id)}}">{{$row->category_name}} <span>( {{$row->project->count()}} )</span></a></li>
                            </ul>
                        </div><!-- End sidebar categories-->
                        @endforeach


                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">

                            @foreach ($project_latest as $project)
                                <div class="post-item clearfix">
                                    <img src="{{ URL::to($project->image) }}" alt="">
                                    <h4><a href="blog-single.html">{{$project->name}}</a></h4>
                                    <time datetime="2020-01-01">{{$project->updated_at}}</time>
                                </div>
                            @endforeach

                        </div><!-- End sidebar recent posts-->

                        <h3 class="sidebar-title">Tags</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>

                        </div><!-- End sidebar tags-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div><!-- End row -->

        </div><!-- End container -->

    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
