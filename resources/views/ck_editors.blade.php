@extends('layouts.mainLayout')

@section('content')

<br>
<br>
<br>
<br>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

          <form action="{{url('')}}" method="post" enctype="multipart/form-data">
          @csrf
            
            <h1>CK-Editors</h1>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Comments:</label>
                <textarea rows="5" class="form-control" placeholder="Details" name="project_description" required data-validation-required-message="Please enter a details."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <textarea name="content"></textarea>
            <script src="ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content');
            </script>

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