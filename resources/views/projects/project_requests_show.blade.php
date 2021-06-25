@extends('projects.project_layout')

@if(!Auth::guest())
    @section('content_project_navbar')
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/projects') }}">All Projects</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.create')}}">Create Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.my_projects.'.Auth::user()->id)}}">My Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{url('/project_requests')}}">Project Requests</a>
        </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/projects.more_filter')}}">More Filtering</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/project.my_favorites')}}">Favorites</a>
        </li>
    </ul>
    @endsection
@endif

@section('content_project')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row">

        <div class="col-md-12">
        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">

                <thead>

                   <th>Project ID</th>
                   <th>Project Name</th>
                   <th>Grant Access to User</th>
                   <th>Access Status</th>


               </thead>
    <tbody>

        @foreach ($project_request as $row)
        <tr>

            <td><a href="{{url('projects.show.'.$row->id)}}">{{ $row->id }}</a></td>
            <td><a href="{{url('projects.show.'.$row->id)}}">{{ $row->project->project_name }}</a></td>
            <td><a href="{{url('users_profile.show.'.$row->request_user_id)}}">{{ $row->user->name }}</a></td>
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



    </tbody>

</table>


            </div>

        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">

        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


        </div>
      </div>

        </div>
    <!-- /.modal-content -->
    </div>
      <!-- /.modal-dialog -->
</div>

@endsection
