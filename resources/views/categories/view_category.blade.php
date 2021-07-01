@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Category</h2>

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Categories</a></li>
                </ol>
            </div>

        </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{ URL::to($category->image) }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{url('categories.show.'.$category->id)}}">{{ $category->category_name }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                        href="{{url('categories.show.'.$category->id)}}">{{ $category->user->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                        href="{{url('categories.show.'.$category->id)}}"><time>{{ $category->created_at }}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {{ $category->category_description }}
                            </p>
                        </div>
                        <div class="read-more">
                                <a href="{{url('projects.more_filter.search_side_bar?search_category='.$category->id)}}">View Projects</a>
                        </div>
                    </article><!-- End blog entry -->



                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="icofont-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            @foreach ($categories_list as $row)
                                <ul>
                                    <li><a href="{{url('categories.show.'.$row->id)}}">{{$row->category_name}} <span>( {{$row->project->count()}} )</span></a></li>
                                </ul>
                            @endforeach

                        </div><!-- End sidebar categories-->

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

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div><!-- End row -->

        </div><!-- End container -->

    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
