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

            <table class="table table-responsive">
                <tr>
                    <th>ID No.</th>
                    <th>Project Name</th>
                    <th>Grant Access to User</th>
                    <th>Access Status</th>
                </tr>

                @foreach ($project_request as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->project->project_name }}</td>
                    <td>{{ $row->user->name }}</td>


                <td>

                    @if(!Auth::guest())
                        @if(Auth::user()->id==$row->owner_id)
                            @if($row->access_code==0)
                                <a href="{{url('/project_access/'. $row->request_user_id.'/'. $row->owner_id.'/access_code=1')}}" class="btn btn-sm btn-success">Give Access</a>
                            @else
                                <a href="{{url('/project_access/'. $row->request_user_id.'/'. $row->owner_id.'/access_code=0')}}" class="btn btn-sm btn-danger">Deny Access</a>
                            @endif
                        @endif
                    @endif

                  </td>

                </tr>
                @endforeach
            </table>

      </div>
    </div>
  </div>

@endsection
