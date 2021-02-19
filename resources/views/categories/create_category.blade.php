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

          <hr>

          <form action="{{url('/categories.store')}}" method="post" enctype="multipart/form-data">
          @csrf

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Category Name" name="category_name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category Description</label>
                <textarea rows="5" class="form-control" placeholder="Details" name="category_description" required data-validation-required-message="Please enter a details."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>


            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Category Image</label>
                <input type="file" class="form-control" placeholder="Image" name="image" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>



            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Save</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
