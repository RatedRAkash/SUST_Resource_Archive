@extends('features.features_list')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <h1 class="title">Upload a file</h1>
    </div>

    <form id="upload_file" class="" action="/upload" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
            <label class="label">Attach File</label>
            <div class="control">
                <input type="file" class="form-control-file" id="file" name="file" required>
            </div>
        </div>

        <br>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link is-outlined">Upload</button>
            </div>
        </div>
    </form>
    <br><br><br>
</div>
@endsection