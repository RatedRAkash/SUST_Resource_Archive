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
            <a href="{{url('/categories.create')}}" class="btn btn-danger">Add Project</a>
            <a href="{{url('/categories')}}" class="btn btn-info">All Projects</a>
          </p>

              <h3>Category Name: {{ $category->category_name }}</h3>
              <p>Category Description: {{ $category->category_description }}</p>

        </div>
      </div>
    </div>
  </div>
@endsection
