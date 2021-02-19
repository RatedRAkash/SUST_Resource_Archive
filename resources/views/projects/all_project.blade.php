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

            <table class="table table-responsive">
                <tr>
                    <th>ID No.</th>
                    <th>Project Name</th>
                    <th>Created User Name</th>
                    <th>Category Name</th>
                    <th>Details</th>
                    <th>Image</th>
                </tr>

                @foreach ($projects as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->project_name }}</td>
                    <td>User Id Bosabo</td>
                    <td>{{ $row->category_id }}</td>
                    <td>{{ $row->project_description }}</td>
                    <td><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px"></td>


                    <td>

                      @if(!Auth::guest())
                        @if(Auth::user()->id==$row->user_id)
                          <a href="{{url('projects/'.$row->id.'/edit')}}" class="btn btn-sm btn-info">Edit</a>

                          <form action="{{url('projects/'.$row->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" style="submit">Delete</button>
                          </form>
                        @endif
                      @endif

                      <a href="{{url('projects.show.'.$row->id)}}" class="btn btn-sm btn-success">View</a> <!-- eikane "URL to" er por '.' dewa mane concatenation bujai-->
                      <a href="{{url('projects.edit.'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{url('projects.delete.'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
            </table>

      </div>
    </div>
  </div>

@endsection
