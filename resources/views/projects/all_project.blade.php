@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <script type="text/javascript">
        document.getElementById('blog').className = "active";
    </script>

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>All Projects</h2>

                <ol>
                    @if(!Auth::guest())
                    <a href="{{url('/projects.create')}}" class="btn btn-success">Create Project</a>
                    @endif
                </ol>
            </div>
        </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">

                @foreach ($projects as $row)
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
                                        href="blog-single.html"><time datetime="2020-01-01">{{ $row->created_at }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a
                                        href="blog-single.html">12
                                        Comments</a></li>
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
                @endforeach

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li class="disabled"><i class="icofont-rounded-left"></i></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                        </ul>
                    </div>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">
                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="{{url('/projects.search')}}">
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
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>

                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            <div class="post-item clearfix">
                                <img src="assets/img/recent-posts-1.jpg" alt="">
                                <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/recent-posts-2.jpg" alt="">
                                <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/recent-posts-3.jpg" alt="">
                                <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/recent-posts-4.jpg" alt="">
                                <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/recent-posts-5.jpg" alt="">
                                <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
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

            </div><!-- End .row -->

        </div><!-- End .container -->

    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
