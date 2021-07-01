@extends('projects.project_layout')

@if(!Auth::guest())
    @section('content_project_navbar')
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
        <a class="nav-link active" href="{{ url('/projects') }}">All Projects</a>
        </li>
        @if(!Auth::guest())
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.create')}}">Create Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.my_projects.'.Auth::user()->id)}}">My Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/project_requests')}}">Project Requests</a>
        </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.more_filter')}}">More Filtering</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/project.my_favorites')}}">Favorites</a>
        </li>
        @endif
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
                                        href="{{url('/users_profile.show.'.$row->user->id)}}">{{ $row->user->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                        href="{{url('projects.show.'.$row->id)}}"><time datetime="2020-01-01">{{ $row->created_at }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a
                                        href="{{url('projects.show.'.$row->id)}}">{{ $row->commentsection->count() }}  Comments</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                            {!!$row->project_description!!}
                            </p>
                                @php
                                    $flag = 0
                                @endphp

                                @if(!Auth::guest())
                                    @if(Auth::user()->id != $row->user_id)
                                        @if(@isset($favorites))
                                            @foreach($favorites as $favorite)
                                                @if($favorite->project_id==$row->id)
                                                @php
                                                    $flag = 1
                                                @endphp
                                                <div class="read-more">
                                                    <form action="{{url('projects.project_favorite.'.$row->id)}}" method="post" enctype="multipart/form-data" name="fav_project_form" id="fav_project_form">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">Remove From Favorites</button>
                                                    </form>
                                                </div>
                                                <br>
                                                @endif
                                            @endforeach

                                            @if($flag==0)
                                                <div class="read-more">
                                                    <form action="{{url('projects.project_favorite.'.$row->id)}}" method="post" enctype="multipart/form-data" name="fav_project_form" id="fav_project_form">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success">Add to Favorites</button>
                                                    </form>
                                                </div>
                                                <br>
                                            @endif
                                        @endif
                                    @endif
                                @endif

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

                    <!-- <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li class="disabled"><i class="icofont-rounded-left"></i></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                        </ul>
                    </div> -->

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
                                <h4><a href="{{url('projects.show.'.$project->id)}}">{{$project->name}}</a></h4>
                                <time datetime="2020-01-01">{{$project->updated_at}}</time>
                            </div>
                        @endforeach


                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div><!-- End .row -->

        </div><!-- End .container -->

    </section><!-- End Blog Section -->

@endsection
