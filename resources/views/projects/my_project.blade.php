@extends('projects.project_layout')

@if(!Auth::guest())
    @section('content_project_navbar')
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/projects') }}">All Projects</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.create')}}">Create Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{url('/projects.my_projects.'.Auth::user()->id)}}">My Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/project_requests')}}">Project Requests</a>
        </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.more_filter')}}">More Filtering</a>
        </li>
    </ul>
    @endsection
@endif


@section('content_project')

    <script type="text/javascript">
        document.getElementById('projects').className = "active";
    </script>

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">

                @foreach($projects as $row)
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
                                        href="blog-single.html">{{ $row->commentsection->count() }}  Comments</a></li>
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
                        {{$projects->links()}}
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
                            @foreach ($categories as $row)
                                <ul>
                                    <li><a href="{{url('categories.show.'.$row->id)}}">{{$row->category_name}} <span>( {{$row->project->count()}} )</span></a></li>
                                </ul>
                            @endforeach

                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">

                        @foreach($project_latest as $project)
                            <div class="post-item clearfix">
                                <img src="{{ URL::to($project->image) }}" alt="">
                                <h4><a href="blog-single.html">{{$project->name}}</a></h4>
                                <time datetime="2020-01-01">{{$project->updated_at}}</time>
                            </div>
                        @endforeach


                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div><!-- End .row -->

        </div><!-- End .container -->

    </section><!-- End Blog Section -->

@endsection
