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

            <table class="table table-responsive">
                <tr>
                    <th>ID No.</th>
                    <th>Category Name</th>
                    <th>Created User Name</th>
                    <th>Category Description</th>
                </tr>

                @foreach ($categories as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->category_name }}</td>
                    <td>User Name Dibo</td>
                    <td>{{ $row->category_description }}</td>

                    <td><img src="" style="height: 40px; width: 70px"></td>

                    <td>

                      @if(!Auth::guest())
                        @if(Auth::user()->id==$row->user_id)
                          <a href="{{url('categories/'.$row->id.'/edit')}}" class="btn btn-sm btn-info">Edit</a>

                          <form action="{{url('categories/'.$row->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" style="submit">Delete</button>
                          </form>
                        @endif
                      @endif

                      <a href="{{url('categories.show.'.$row->id)}}" class="btn btn-sm btn-success">View</a> <!-- eikane "URL to" er por '.' dewa mane concatenation bujai-->
                      <a href="{{url('categories.delete.'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>

                  </td>
                </tr>
                @endforeach
            </table>

      </div>
    </div>
  </div>

@endsection
