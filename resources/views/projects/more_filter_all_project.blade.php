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
        <a class="nav-link" href="{{url('/project_requests')}}">Project Requests</a>
        </li>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{url('/projects.more_filter')}}">More Filtering</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/project.my_favorites')}}">Favorites</a>
        </li>

    </ul>
    @endsection
@endif



@section('content_project')

    <script type="text/javascript">
        document.getElementById('projects').className = "active";
    </script>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
            background:#eee;
        }

        .btn {
            margin-bottom: 5px;
        }

        .grid {
            position: relative;
            width: 100%;
            background: #fff;
            color: #666666;
            border-radius: 2px;
            margin-bottom: 25px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }

        .grid .grid-body {
            padding: 15px 20px 15px 20px;
            font-size: 0.9em;
            line-height: 1.9em;
        }

        .search table tr td.rate {
            color: #f39c12;
            line-height: 50px;
        }

        .search table tr:hover {
            cursor: pointer;
        }

        .search table tr td.image {
            width: 100px;
        }

        .search table tr td img {
            width: 100px;
            height: 80px;
        }

        .search table tr td.rate {
            color: #f39c12;
            line-height: 50px;
            width:80px;
        }

        .search table tr td.price {
            font-size: 1.5em;
            line-height: 50px;
        }

        .search #price1,
        .search #price2 {
            display: inline;
            font-weight: 600;
        }

        div.dropdown-menu.open{
    		  max-height: 314px !important;
    		  overflow: hidden;
    		}
    		ul.dropdown-menu.inner{
    		  max-height: 110px !important;
    		  overflow-y: auto;
    		}
    </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>



<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>



<section class="projects" data-aos="fade-up">
<div class="container">
<div class="row">
  <!-- BEGIN SEARCH RESULT -->
  <div class="col-md-12">
    <div class="grid search">
      <div class="grid-body">
        <div class="row">
          <!-- BEGIN FILTERS -->
          <div class="col-md-3">
            <h2 class="grid-title"><i class="fa fa-filter"></i> Filters </h2>
            <hr>

            <!-- BEGIN FILTER BY CATEGORY -->
            <h4>By category:</h4>
            <label class="fieldlabels">Select the category</label>
            <select class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>

                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>

                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>
            </select>

            <!-- END FILTER BY CATEGORY -->

            <div class="padding"></div>

            <!-- BEGIN FILTER BY Authors -->
            <h4>By author:</h4>
            <label class="fieldlabels">Select the Author</label>
            <select class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>

                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>

                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>
            </select>

            <!-- END FILTER BY Authors -->


            <div class="padding"></div>

            <!-- BEGIN FILTER BY Course -->
            <h4>By course:</h4>
            <label class="fieldlabels">Select the Courses</label>
            <select class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>

                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>

                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
                <option>Onions</option>
            </select>

            <!-- END FILTER BY Course -->




            <div class="padding"></div>

            <!-- BEGIN FILTER BY DATE -->
            <h4>By date:</h4>
            From
            <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
              <input type="text" class="form-control">
              <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input1" value="">

            To
            <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2">
              <input type="text" class="form-control">
              <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input2" value="">
            <!-- END FILTER BY DATE -->

            <div class="padding"></div>

            <!-- BEGIN FILTER BY Rating -->
            <h4>By rating:</h4>
            Between <div id="price1">0</div> to <div id="price2">5</div>
            <div class="slider-primary">
              <div class="slider slider-horizontal" style="width: 152px;"><div class="slider-track"><div class="slider-selection" style="left: 30%; width: 50%;"></div><div class="slider-handle round" style="left: 30%;"></div><div class="slider-handle round" style="left: 80%;"></div></div><div class="tooltip top hide" style="top: -30px; left: 50.1px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">300 : 800</div></div><input type="text" class="slider" value="" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="[300,800]" data-slider-tooltip="hide"></div>
            </div>
            <!-- END FILTER BY Rating -->






          </div>
          <!-- END FILTERS -->
          <!-- BEGIN RESULT -->
          <div class="col-md-9">
            <h2><i class="fa fa-file-o"></i> Projects </h2>
            <hr>
            <!-- BEGIN SEARCH INPUT -->
            <div class="input-group">
              <input type="text" class="form-control" value="web development">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <!-- END SEARCH INPUT -->
            <p>Showing all results matching "web development"</p>

            <div class="padding"></div>

            <div class="row">
              <!-- BEGIN ORDER RESULT -->
              <div class="col-sm-6">
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Order by
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Name</a></li>
                    <li><a href="#">Date</a></li>
                    <li><a href="#">View</a></li>
                    <li><a href="#">Rating</a></li>
                  </ul>
                </div>
              </div>
              <!-- END ORDER RESULT -->

              <div class="col-md-6 text-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-default active"><i class="fa fa-list"></i></button>
                  <button type="button" class="btn btn-default"><i class="fa fa-th"></i></button>
                </div>
              </div>
            </div>

            <!-- BEGIN TABLE RESULT -->
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>

                @foreach ($projects as $row)
                <a href="{{url('projects.show.'.$row->id)}}">
                <tr>
                  <td class="image"><br><img src="{{ URL::to($row->image) }}" class="img-fluid" style="width:100px;height:100px;"></td>
                  <td class="product">
                      <h4><b><a href="{{url('projects.show.'.$row->id)}}">{{ $row->project_name }}</a></b></h4>
                      @if($row->partner_id != null)
                        <b>Owner ({{ $row->user->name }}) , Partner ({{$row->partner->name}}), Supervisor ({{$row->supervisor->name}})</b>
                      @else
                        <b>Owner ({{ $row->user->name }}) , Supervisor ({{$row->supervisor->name}})</b>
                      @endif
                      <br><br>
                      <p style="text-align: justify"> {!! $row->project_description !!}
                      <br><b>{{ $row->created_at }}</b></p>
                  </td>

                  <td class="rate text-right">
                      <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
                    </td>
                </tr>
                </a>
                @endforeach


              </tbody></table>
            </div>
            <!-- END TABLE RESULT -->

            <!-- BEGIN PAGINATION -->
            <ul class="pagination">
              <li class="disabled"><a href="#">«</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
            </ul>
            <!-- END PAGINATION -->
          </div>
          <!-- END RESULT -->
        </div>
      </div>
    </div>
  </div>
  <!-- END SEARCH RESULT -->
</div>
</div>
</section>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>

@endsection
