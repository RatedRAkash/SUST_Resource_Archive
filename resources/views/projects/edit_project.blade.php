@extends('layouts.mainLayout')

@section('content')

<br>
<br>
<br>
<br>
<br>
<br>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <p>
                <a href="{{url('/projects.create')}}" class="btn btn-danger">Add Project</a>
                <a href="{{url('/projects')}}" class="btn btn-info">All Projects</a>
            </p>
          
          <hr>

          <form action="{{url('projects.update.'.$project->id)}}" method="post" enctype="multipart/form-data">
            @csrf  <!-- CSRF token use nah korle problem hobe -->
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Project Name</label>
                <input type="text" class="form-control" placeholder="Post Title" name="project_name" required data-validation-required-message="Please enter your name." value= "{{$project->project_name}}">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Project Description</label>
                <textarea rows="5" class="form-control" name="project_description" required data-validation-required-message="Please enter a message.">{{ $project->project_description }}</textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>

@endsection