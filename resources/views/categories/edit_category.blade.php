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
                <a href="{{url('/categories.create')}}" class="btn btn-danger">Add Category</a>
                <a href="{{url('/categories')}}" class="btn btn-info">All Categories</a>
            </p>

          <hr>

          <form action="{{url('/categories')}}" method="post" enctype="multipart/form-data">
            @csrf  <!-- CSRF token use nah korle problem hobe -->

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Post Title" name="category_name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <select class="form-control" name="category_id">
              @foreach ($category as $row)
                <option value="{{ $row->id }}" <?php if($row->id==$project->category_id) echo "selected"; ?> >
                  {{ $row->name }}
                </option>
              @endforeach
            </select>

            <br>
              <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                Old Image: <img src="{{ url($category->image) }}" style="height: 40px; width: 80px">
                <label>Project Image</label>
                <input type="file" class="form-control" name="image" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Category Description</label>
                <textarea rows="5" class="form-control" name="category_description" required data-validation-required-message="Please enter a message.">{{ $project->details }}</textarea>
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
