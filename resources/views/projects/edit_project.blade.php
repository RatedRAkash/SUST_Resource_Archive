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

            <form id="upload_file" class="" action="{{url('projects.update.'.$project->id)}}" method="post" enctype="multipart/form-data">
                @csrf  <!-- CSRF token use nah korle problem hobe -->

                <div data-bs-spy="scroll" style="height:700px; overflow-y:scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">

				<img src="{{ $project->image }}" class="rounded img-fluid" alt="No image available" style="height:350px;">

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



				<div class="card" id="resource-title">

                    <script>
                            function changeText_title()
                            {   //document.getElementById("div_project_description").textContent = editor_description.getData();
                                document.getElementById("div_project_name").textContent = document.getElementById("div_change_project_name").value;
                            }

                            function myFunction_title() {
                            var x = document.getElementById("div_change_project_name");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }

                    </script>

                    <h5 class="card-header">Thesis/Project Title <small class="pull-right"><button type="button" id="edit_button_title" onclick="changeText_title(); myFunction_title(); changeButtonText(this.id);" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

					<div class="card-body">
						<h5 class="card-title" name="project_name" id="div_project_name">{{ $project->project_name }}</h5>
                        <input class="input-text" type="text" id="div_change_project_name" name="project_name" style="display: none" value="{{ $project->project_name }}"/>


                        <p class="card-text" name="project_created_at"> <b>Started from:</b> {{ $project->created_at }} <br> <b>Last updated:</b> {{ $project->updated_at }} </p>

					</div>






                    <script>
                            function changeText_category()
                            {   //document.getElementById("div_project_description").textContent = editor_description.getData();
                                e = document.getElementById("Select_category_ID");
                                txt = e.options[e.selectedIndex].text;
                                document.getElementById("div_category").innerHTML = txt;
                            }

                            function myFunction_category() {
                            var x = document.getElementById("Change_category_ID_DIV");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }
                    </script>



					<div class="card-footer">
						<b>Tags: </b><i id="div_category">{{ $project->category->category_name}}</i>
                        <small class="pull-right"><button type="button" id="edit_button_category" onclick="changeText_category(); myFunction_category(); changeButtonText(this.id);" class="btn btn-sm btn-success float-right">Edit</button></small>

                        <br>
                        <br>

                        <div class="control-group" id="Change_category_ID_DIV" style="display: none">
                            <div class="form-group floating-label-form-group controls">
                                <b><label>Choose Category</label></b>
                                <select class="form-control" name="category_id" id="Select_category_ID">
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

				</div>

				<br>




				<div class="card text-dark bg-light mb-3" id="description">

                    <script>
                        function changeText_description()
                        {   //document.getElementById("div_project_description").textContent = editor_description.getData();
                            document.getElementById("div_project_description").innerHTML = editor_description.getData();
                        }

                        function myFunction_description() {
                            var x = document.getElementById("Editor_ID_description");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }
                    </script>


                    <h5 class="card-header"> Description <small class="pull-right"><button type="button" id="edit_button_description" onclick="changeText_description(); myFunction_description(); changeButtonText(this.id);" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

                    <div class="card-body" id="div_project_description">
						<p class="card-text" >
						{!!$project->project_description!!}
                        </p>
					</div>


					<div class="card-footer" id="Editor_ID_description" style="display: none">
						<b>Resources:</b>
						<br>

                        <div class="card-body">

                        <textarea name="project_description" id="written-text-description" required class="form-control" rows="5" placeholder="Content">{!!$project->project_description!!}</textarea>

                        <script src="ckeditor/ckeditor.js"></script>
                        <script>
                            editor_description = CKEDITOR.replace('project_description');
                        </script>

                        </div>

						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="img_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Image1.png &nbsp;(<i>Image File</i>)
								</div>

								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>




				<div class="card text-dark bg-light mb-3" id="section-abstract">
                    <script>
                        function changeText_abstract()
                        {
                            document.getElementById("div_project_abstract").innerHTML = editor_abstract.getData();
                        }

                        function myFunction_abstract() {
                            var x = document.getElementById("Editor_ID_abstract");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }
                    </script>


                    <h5 class="card-header"> Abstract <small class="pull-right"><button type="button" id="edit_button_abstract" onclick="changeText_abstract(); myFunction_abstract(); changeButtonText(this.id);" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

                    <div class="card-body" id="div_project_abstract">
						<p class="card-text" >
						{!!$project->project_abstract!!}
                        </p>
					</div>


					<div class="card-footer" id="Editor_ID_abstract" style="display: none">
                        <b>Edit Abstract:</b>
                        <br>

                        <div class="card-body">

                            <textarea name="project_abstract" id="written-text-abstract" required class="form-control" rows="5" placeholder="Content">{!!$project->project_abstract!!}</textarea>

                            <script src="ckeditor/ckeditor.js"></script>
                            <script>
                                editor_abstract = CKEDITOR.replace('project_abstract');
                            </script>

                        </div>

                        <div class="card text-white bg-dark mb-3">
                            <div class="row">
                                <div class="col col-sm-11">
                                    <img src="pdf_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
                                    Description &nbsp;(<i>Description</i>)
                                </div>
                                <div class="col">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
					</div>

				</div>





                <div class="card text-dark bg-light mb-3" id="section-paper-pdf">
                    <script>
                        function change_paper_pdf()
                        {
                            //document.getElementById("div_paper_pdf_url").src = document.getElementById("file").src;
                        }

                        function myFunction_change_paper_pdf() {
                        var x = document.getElementById("paper_pdf_container");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }
                    </script>

                <h5 class="card-header"> Full Paper <small class="pull-right"><button type="button" id="edit_button_pdf" onclick="myFunction_change_paper_pdf(); changeButtonText(this.id);" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

                        <div class="card-body" id="div_paper_pdf_url">
                            <p class="card-text">
                            @if($project->paper_pdf_url != null)
                                <iframe src="{{ $project->paper_pdf_url }}" style="width:750px; height:750px"></iframe>
                            @else
                                <iframe src="" style="height:50px"></iframe>
                            @endif
                            </p>
                        </div>


					<div class="card-footer" id="paper_pdf_container" style="display: none">
						<b>Change Paper pdf:</b>
						<br>

                        <div class="container">

                            @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <br>

                                <div class="form-group">
                                    <div class="control">
                                        <input type="file" class="form-control-file" id="pdf_file" name="pdf_file">
                                    </div>
                                </div>

                            <br><br><br>
                        </div>

						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
                                <img src="pdf_icon.jpg" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Paper.pdf &nbsp;(<i>Pdf File</i>)
								</div>
								<div class="col">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>

				</div>


		    <div class="card text-dark bg-light mb-3" id="section-presentation-slide">
                <script>
                    function change_presentation_slide()
                    {
                        document.getElementById("div_project_presentation_slide_url").src = document.getElementById("file").src;
                    }

                    function myFunction_presentation_slide() {
                    var x = document.getElementById("presentation_slide_container");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    }
                    else {
                        x.style.display = "none";
                    }
                }
                </script>

                <h5 class="card-header"> Presentation Slide <small class="pull-right"><button type="button" id="edit_button_presentation" onclick="myFunction_presentation_slide(); changeButtonText(this.id);" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

					<div class="card-body" id="div_project_presentation_slide_url">
						<p class="card-text">

                        @if($project->presentation_slide_url != null)
                            <iframe src="{{ $project->presentation_slide_url }}" style="width:750px; height:750px"></iframe>
                        @else
                            <iframe src="" style="height:50px"></iframe>
                        @endif

						</p>
					</div>

					<div class="card-footer" id="presentation_slide_container" style="display: none">
						<b>Change Presentation Slide:</b>
						<br>

                        <div class="container">
                            @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <br>

                                <div class="form-group">
                                    <div class="control">
                                        <input type="file" class="form-control-file" id="presentation_file" name="presentation_file">
                                    </div>
                                </div>

                            <br><br><br>
                        </div>

						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
                                <img src="presentation_icon.jpg" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Presentation1.ppt &nbsp;(<i>Presentation File</i>)
								</div>

								<div class="col">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>

				</div>


				<div class="card text-dark bg-light mb-3" id="code-link">
					<h5 class="card-header">Code Link<small class="pull-right"><button type="button" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

					<div class="card-body">
						<p class="card-text">
							Link is here...
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="exe_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									App1.exe &nbsp;(<i>Executable  File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card text-dark bg-light mb-3" id="section-5">
					<h5 class="card-header">Section 5 <small class="pull-right"><button type="button" class="btn btn-sm btn-success float-right">Edit</button></small></h5>

					<div class="card-body">
						<p class="card-text">
							This is the part 5 of the resourse.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="presentation_icon.jpg" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Presentation1.ppt &nbsp;(<i>Presentation File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								    </div>
							    </div>
						    </div>
					    </div>
				    </div>
				</div>
			</div>

			<div class="position-fixed top-22 end-0 w-25">
				<div class="container">
					<div class="card text-dark bg-light mb-3 ">
					  <div class="card-body">

                        <a href="{{url('projects.edit.'.$project->id)}}" class="btn btn-sm btn-info">Edit</a>


                        <button type="submit" class="btn btn-sm btn-danger">Save</button>

                        <br>
                        <br>

						<div id="list-example" class="list-group">
						  <a class="list-group-item list-group-item-action" href="#resource-title">Thesis/Project Title</a>
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
									  <a class="list-group-item list-group-item-action" href="#section-5">Section 5</a>

								  </div>
								</div>
							  </div>

						    </div>
						</div>


					        </div>
					    </div>
				    </div>

			    </div>
		    </form>
		</div>
	</div>

</div>

<br>
<br>
<br>
<br>
<br>

@endsection
