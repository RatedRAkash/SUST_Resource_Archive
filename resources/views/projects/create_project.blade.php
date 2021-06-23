@extends('projects.project_layout')

@if(!Auth::guest())
    @section('content_project_navbar')
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/projects') }}">All Projects</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{url('/projects.create')}}">Create Project</a>
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
    </ul>
    @endsection
@endif


@section('content_project')
<div class="container-fluid">
    <div class="row justify-content-center">
      		<div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
      			<div class="card px-0 pt-4 pb-0 mt-3 mb-3">

<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
    <h2 id="heading">Form for creating a new project</h2>
    <p>Fill all field marked in * to go to next step</p>


        <div class="card-body">
        <form action="{{url('/projects.store')}}" method="post" enctype="multipart/form-data" id="msform">
        @csrf

        <!-- progressbar -->
        <ul id="progressbar">
            <li id="introduction" class="active"><strong>Name</strong></li>
            <li id="domain"><strong>Category</strong></li>
            <li id="settings"><strong>Picture</strong></li>
            <li id="confirm"><strong>Finish</strong></li>
        </ul>

        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <br>

        <!-- fieldsets -->


        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Project Information:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 1 - 4</h2>
                    </div>
                </div>

                <label class="fieldlabels">Title: *</label>
                <input class="input-text" type="text" name="project_name" placeholder="Title of your researh/project" required/>

                <label class="fieldlabels">Description: *</label>
                <div class="card-body">

                    <textarea class="form-control textarea-text" name="project_description" id="project_description" rows="5" placeholder="Tell us about your researh/project ..."></textarea>
                        <script src="ckeditor/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace('project_description');
                        </script>

                </div>

            </div>
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>

        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Workspace Domain:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 2 - 4</h2>
                    </div>
                </div>
                <label class="fieldlabels">This workspace is for ___________ . *</label>
                <select type="text" name="option_project_or_thesis" class="selectpicker my-select" data-width="100%" aria-label="Default select example">
                    <option disabled selected>Choose between thesis and project.</option>
                    <option value="thesis">Thesis</option>
                    <option value="project">Project</option>
                </select>

    <br><br>
            <div id="project-domains">
                <label class="fieldlabels">Select Category for your workspace. *</label>
                <select type="text" name="category_id" class="selectpicker my-select" data-width="100%" aria-label="Default select example">
                    @foreach ($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                    @endforeach
            </select>




</div><br>


            <label class="fieldlabels">Is this a personal work/academic work/contest work?*</label>
            <select type="text" name="option_workspace_type" class="selectpicker my-selec" onchange="active_field(this.value)" data-width="100%" aria-label="Default select example">
                <option disabled selected>Choose your answer.</option>
                <option value="personal">Personal</option>
                <option value="academic" >Academic</option>
                <option value="contest">Contest</option>
            </select><br><br>

            <script>
                    function active_field(value){

                        if (value=="Personal"){
                            document.getElementById("academic_option").className = "d-none";
                            document.getElementById("contest_option").className = "d-none";
                        }

                        if (value=="Academic"){
                            document.getElementById("academic_option").className = "d-block";
                            document.getElementById("contest_option").className = "d-none";
                        }

                        if (value=="Contest"){
                            document.getElementById("contest_option").className = "d-block";
                            document.getElementById("academic_option").className = "d-none";
                        }


                    }
                </script>

            </div>
            <input type="button" name="next" class="next action-button" value="Next" />
            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
        </fieldset>

        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Settings:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 3 - 4</h2>
                    </div>
                </div>

                <label for="cover_photo" class="form-label">Project Image: *</label>
                <input class="form-control" type="file" id="cover_photo" name="image">
                <br>
                <label class="fieldlabels">Privacy Settings: *</label>
                <select type="text" name="option" class="selectpicker my-select" aria-label="Default select example" data-width="100%" onchange="active_field2(this.value)" >
                    <option value="public" selected>Public(Everyone can see)</option>
                    <option value="private">Private(You can customize who can see)</option>
                    <option value="hidden">Hidden(Only you and your teammate can see)</option>
                </select>
                <br>

                <div class="d-none" id="private-option">
    <br>
                <label class="fieldlabels">Select person who can see</label>
                <select id="users" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" onchange="selectAll(this)">

                    <option value="All" selected >Select All</option>
                    @foreach ($all_users as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach

                </select>
                <br>
            </div>
    <br>

                <div id="project-partner">
                <label class="fieldlabels">Add partners </label>
                <select id="partners" name="partner_id" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" >

                    @foreach($all_users as $row)
                    @if(Auth::user()->id!=$row->id)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endif
                    @endforeach

                </select>

                </div>
                <br>

                <div id="project-suprervisor">
                <label class="fieldlabels">Add supervisor </label>
                <select id="suprervisors" name="supervisor_id" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" >

                    @foreach($all_users as $row)
                    @if(Auth::user()->id!=$row->id)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endif
                    @endforeach

                </select>
                </div>


                <script>
                    var old_selectedValue = $(document.getElementById('users')).val();

                    function selectAll(select){
                        console.log("Welcome")
                        var selectedValue = $(select).val();
                        console.log(selectedValue);
                        if (selectedValue.includes("All") === true && old_selectedValue.includes("All")=== false){
                            console.log("Welcome Inside 1(added)");
                            for (var i = 0; i < select.options.length; i++) {
                                select.options[i].selected = true;
                            }
                        }
                        else if (selectedValue.includes("All") === false && old_selectedValue.includes("All")=== true){
                            console.log("Welcome Inside 1(discard)");
                            for (var i = 0; i < select.options.length; i++) {
                                select.options[i].selected = false;
                            }
                        }
                        old_selectedValue = $(select).val();
                        $('.selectpicker').selectpicker('refresh')
                    }


                    function active_field2(value){
                        console.log("Inside");
                        if (value=="private"){
                            console.log("Inside2");
                            document.getElementById("private-option").className = "d-block";
                        }
                    else{
                            document.getElementById("private-option").className = "d-none";
                        }

                    }

                </script>




            </div>
            <input type="submit" name="next" class="next action-button" value="Submit" />
            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />

        </fieldset>

        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Finish:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 4 - 4</h2>
                    </div>
                </div> <br><br>
                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                <div class="row justify-content-center">
                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                </div> <br><br>
                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <h5 class="purple-text text-center">You Have Successfully Created A Resource</h5>
                    </div>
                </div>
            </div>
        </fieldset>


    </form>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
