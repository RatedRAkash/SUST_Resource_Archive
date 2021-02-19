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

              <h3>Project Name: {{ $project->project_name }}</h3>
              <p>Project Description: {{ $project->project_description }}</p>
              
        </div>
      </div>
    </div>
  </div>
@endsection