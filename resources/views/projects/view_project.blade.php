@extends('layouts.mainLayout')

@section('content')

<br>
<br>
<br>
<br>
<br>
<br>

@push('styles')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <!-- Optional JavaScript; choose one of the two! -->

    <link rel="stylesheet" href="assets/vendor/bootstrap/view_project_bootstrap.min.css">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
	<br>
	<style>
	/* The sidebar menu */
		.sidenav {
			  position: fixed;
			  z-index: 1;
			  overflow-x: hidden;
			  padding: 8px 0;
		}
	</style>
@endpush

	<div class="container px-4">
		<div class="row gx-5">
			<div class="col-8">

           	<div data-bs-spy="scroll" style="height:700px; overflow-y:scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">

               <style>
                    .image-preview{
                        min-height: 50px;
                        min-width: 50px;
                        border: 2px solid #dddddd;
                        margin-top: 15px;

                        display: flex:
                        align-items: center;
                        justify-content: center;
                        font-weight: bold:
                        color: #cccccc;
                    }

                    .image-preview__image{
                        width: 100%;
                    }

                </style>

                <div class="image-preview" id="imagePreview">
                    <img src="{{ $project->image }}" class="image-preview__image" alt="No image available" style="height:350px;">
                    <span class="image-preview__default-text"></span>
                </div>

                <br><br>

                <script>
                    function changeButtonText(id) {
                        var x = document.getElementById(id);
                        if (x.textContent === "Edit") {
                            x.textContent = "Done";
                        } else {
                            x.textContent = "Edit";
                        }
                    }
                </script>



				<div class="card" id="project-title">


                    <h5 class="card-header">{{ $project->project_or_thesis }} Title</h5>

					<div class="card-body">
						<h5 class="card-title" name="project_name" id="div_project_name">{{ $project->project_name }}</h5>
                        <p class="card-text" name="project_created_at"> <b>Started from:</b> {{ $project->created_at }} <br> <b>Last updated:</b> {{ $project->updated_at }} </p>

					</div>


					<div class="card-footer">
						<b>Tags: </b><i id="div_category">{{ $project->category->category_name}}</i>
                    </div>

				</div>

				<br>




				<div class="card text-dark bg-light mb-3" id="description">

                    <h5 class="card-header">Description</h5>

                    <div class="card-body" id="div_project_description">
						<p class="card-text" >
						{!!$project->project_description!!}
                        </p>
					</div>

				</div>




				<div class="card text-dark bg-light mb-3" id="section-1">

                    <h5 class="card-header">Abstract</h5>

                    <div class="card-body" id="div_project_abstract">
						<p class="card-text" >
						{!!$project->project_abstract!!}
                        </p>
					</div>

				</div>




            <div class="card text-dark bg-light mb-3" id="section-2">

                <h5 class="card-header">Full Paper Pdf</h5>

                        <div class="card-body" id="div_paper_pdf_url">
                            <p class="card-text">
                            @if($project->paper_pdf_url != null)
                                <iframe src="{{ $project->paper_pdf_url }}" style="width:750px; height:750px"></iframe>
                            @else
                                <iframe src="" style="height:50px"></iframe>
                            @endif
                            </p>
                        </div>

			</div>


		<div class="card text-dark bg-light mb-3" id="section-3">

                <h5 class="card-header">Presentation Slide</h5>

					<div class="card-body" id="div_project_presentation_slide_url">
						<p class="card-text">

                        @if($project->presentation_slide_url != null)
                            <iframe src="{{ $project->presentation_slide_url }}" style="width:750px; height:750px"></iframe>
                        @else
                            <iframe src="" style="height:50px"></iframe>
                        @endif

						</p>
					</div>

				</div>


				<!-- CODE LINK SLIDE -->
                <div class="card text-dark bg-light mb-3" id="section-4">

                    <h5 class="card-header">Code Link</h5>

					<div class="card-body" id="div_project_code_link_url">
						<p class="card-text">

                        @if($project->link_to_dataset != null)
                            <span><a href="https://{{$project->link_to_dataset}}" target="_blank"><input type="text" name="textbox_link_to_dataset" id="textbox_link_to_dataset" readonly=true class="form-control" style="color:blue" value="{{$project->link_to_dataset}}"></a></span>
                        @else
                            <span><input type="text" name="textbox_link_to_dataset" id="textbox_link_to_dataset" readonly=true class="form-control" value="No Link has been added"></span>
                        @endif

						</p>

					</div>

				</div>



                <!-- COMMENT SECTION START -->
                <div class="card text-dark bg-light mb-3" id="section-5">
					<h5 class="card-header">Comments</h5>

					<div class="card-body">
						<p class="card-text">

						</p>
					</div>

					<div class="card-footer">
						<b>All Comments : {{$comments->count()}}</b>
						<br>
                        <br>
                                    <style>
                                        body{
                                            margin-top:20px;
                                            background-color:#e9ebee;
                                        }
                                        .be-comment-block {
                                            margin-bottom: 50px !important;
                                            border: 1px solid #edeff2;
                                            border-radius: 2px;
                                            padding: 50px 70px;
                                            border:1px solid #ffffff;
                                        }
                                        .textarea{
                                            color: #000000;
                                        }
                                        .comments-title {
                                            font-size: 16px;
                                            color: #262626;
                                            margin-bottom: 15px;
                                            font-family: 'Conv_helveticaneuecyr-bold';
                                        }
                                        .be-img-comment {
                                            width: 60px;
                                            height: 60px;
                                            float: left;
                                            margin-bottom: 15px;
                                        }
                                        .be-ava-comment {
                                            width: 60px;
                                            height: 60px;
                                            border-radius: 50%;
                                        }
                                        .be-comment-content {
                                            margin-left: 80px;
                                        }
                                        .be-comment-content span {
                                            display: inline-block;
                                            width: 49%;
                                            margin-bottom: 15px;
                                        }
                                        .be-comment-name {
                                            font-size: 13px;
                                            font-family: 'Conv_helveticaneuecyr-bold';
                                        }
                                        .be-comment-content a {
                                            color: #383b43;
                                        }
                                        .be-comment-content span {
                                            display: inline-block;
                                            width: 49%;
                                            margin-bottom: 15px;
                                        }
                                        .be-comment-time {
                                            text-align: right;
                                        }
                                        .be-comment-time {
                                            font-size: 11px;
                                            color: #b4b7c1;
                                        }
                                        .be-comment-text {
                                            font-size: 13px;
                                            line-height: 18px;
                                            color: #7a8192;
                                            display: block;
                                            background: #f6f6f7;
                                            border: 1px solid #edeff2;
                                            padding: 15px 20px 20px 20px;
                                        }
                                        .form-group.fl_icon .icon {
                                            position: absolute;
                                            top: 1px;
                                            left: 16px;
                                            width: 48px;
                                            height: 48px;
                                            background: #f6f6f7;
                                            color: #b5b8c2;
                                            text-align: center;
                                            line-height: 50px;
                                            -webkit-border-top-left-radius: 2px;
                                            -webkit-border-bottom-left-radius: 2px;
                                            -moz-border-radius-topleft: 2px;
                                            -moz-border-radius-bottomleft: 2px;
                                            border-top-left-radius: 2px;
                                            border-bottom-left-radius: 2px;
                                        }
                                        .form-group .form-input {
                                            font-size: 13px;
                                            line-height: 50px;
                                            font-weight: 400;
                                            color: #b4b7c1;
                                            width: 100%;
                                            height: 50px;
                                            padding-left: 20px;
                                            padding-right: 20px;
                                            border: 1px solid #edeff2;
                                            border-radius: 3px;
                                        }
                                        .form-group.fl_icon .form-input {
                                            padding-left: 70px;
                                        }
                                        .form-group textarea.form-input {
                                            height: 150px;
                                        }
                                    </style>



                            <div class="card text-dark bg-light mb-3" id="section-5">
                            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                            <div class="container">
                            <div class="be-comment-block">


                                @foreach($comments as $comment)
                                <div class="be-comment">
                                    <div class="be-img-comment">
                                        <a href="{{url('/users_profile.show.'.$comment->user->id)}}">
                                            <img src="{{$comment->user_profile->image}}" alt="" class="be-ava-comment">
                                        </a>
                                    </div>
                                    <div class="be-comment-content">
                                        <span class="be-comment-name">
                                            <a href="{{url('/users_profile.show.'.$comment->user->id)}}">{{$comment->user->name}}</a>
                                        </span>
                                        <span class="be-comment-time">
                                            <i class="fa fa-clock-o"></i>
                                            {{$comment->created_at}}
                                        </span>
                                        <p class="be-comment-text">
                                            {{$comment->comment_text}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach

                                @if(!Auth::guest())
                                <form action="{{url('projects.store_comment_section.'.$project->id)}}" method="post" enctype="multipart/form-data" id="msform" class="form-block">
                                    @csrf
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <!-- <div class="form-group fl_icon">
                                                    <div class="icon"><i class="fa fa-user"></i></div>
                                                    <input class="form-input" type="text" placeholder="Your name">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 fl_icon">
                                                <div class="form-group fl_icon">
                                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                                    <input class="form-input" type="text" placeholder="Your email">
                                                </div> -->

                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <textarea class="form-input" name="comment_text" placeholder="Your text"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- COMMENT SECTION END -->
                        <div class="card text-dark bg-light mb-3" id="section-6">
                        <style>
                            .rating {
                                display: flex;
                                flex-direction: row-reverse;
                                justify-content: center
                            }

                            .rating>input {
                                display: none
                            }

                            .rating>label {
                                position: relative;
                                width: 1em;
                                font-size: 3vw;
                                color: #FFD600;
                                cursor: pointer
                            }

                            .rating>label::before {
                                content: "\2605";
                                position: absolute;
                                opacity: 0
                            }

                            .rating>label:hover:before,
                            .rating>label:hover~label:before {
                                opacity: 1 !important
                            }

                            .rating>input:checked~label:before {
                                opacity: 1
                            }

                            .rating:hover>input:checked~label:before {
                                opacity: 0.4
                            }

                            .Rating_h1{
                                text-align: center
                            }

                            .Rating_h1 {
                                margin-top: 50px
                            }

                            @media only screen and (max-width: 600px) {
                                .Rating_h1 {
                                    font-size: 3px
                                }
                            }
                        </style>

                            @if(!Auth::guest())
                                @if(@isset($project_rating))
                                    @if($project_rating=='[]')
                                    <h1 class="Rating_h1">Give Rating </h1>
                                    <form action="{{url('projects.project_rating.'.$project->id)}}" method="post" enctype="multipart/form-data" id="msform" class="form-block">
                                        @csrf
                                            <div class="row">
                                                <div class="rating">
                                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary" style="font-size: 0.8em">Submit</button>
                                            </div>
                                    </form>
                                    @endif
                                @endif
                            @endif

                        </div>


                    </div>

                </div>

            </div>

        </div>



            <!-- SIDEBAR -->

			<div class="position-fixed top-22 end-0 w-25">
				<div class="container">
					<div class="card text-dark bg-light mb-3 ">
					  <div class="card-body">

                      @if(!Auth::guest())

                        @if(Auth::user()->id==$project->user_id)
                            <a href="{{url('projects.edit.'.$project->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{url('projects.delete.'.$project->id)}}" class="btn btn-sm btn-danger">Delete</a>

                        <!-- Jei USER Access chaise -->
                        @elseif($project_request!="[]")
                            @if(Auth::user()->id==$project_request->request_user_id)
                                <!-- Access Paile ACCESS_CODE=1 tokon EDIT button dekhabo-->
                                @if($project_request->access_code==1)
                                    <a href="{{url('projects.edit.'.$project->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <!-- Ei chara Wait for Access dekhabo -->
                                @else
                                    <a><button type="submit" class="btn btn-sm btn-success">Wait for Access</button><a>
                                @endif
                            @endif


                        @else
                            <form id="Request_button" class="" action="{{url('projects.project_request.'.$project->id)}}" method="post" enctype="multipart/form-data">
                                @csrf  <!-- CSRF token use nah korle problem hobe -->
                                <a><button type="submit" class="btn btn-sm btn-success">Request Access</button><a>
                            </form>
                        @endif


                      @endif

                        <br>
                        <br>

						<div id="list-example" class="list-group">
						  <a class="list-group-item list-group-item-action" href="#resource-title">{{ $project->project_or_thesis }} Title</a>
						  <a class="list-group-item list-group-item-action" href="#abstract">Description</a>

						<div class="accordion" id="accordionExample">

							  <div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
								  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Sections
								  </button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								  <div class="accordion-body">
									  <a class="list-group-item list-group-item-action" href="#section-1">Abstract</a>
									  <a class="list-group-item list-group-item-action" href="#section-2">Paper Pdf</a>
									  <a class="list-group-item list-group-item-action" href="#section-3">Presentation</a>
									  <a class="list-group-item list-group-item-action" href="#section-4">Code Link</a>
									  <a class="list-group-item list-group-item-action" href="#section-5">Comments</a>

								  </div>
								</div>
							  </div>

						    </div>

						</div>


				        </div>
				    </div>
			    </div>
			 </div>
		</div>

	</div>

</div>


<br>
<br>
<br>
<br>
<br>

@endsection
