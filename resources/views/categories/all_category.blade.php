@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <script type="text/javascript">
        document.getElementById('services').className = "active";
    </script>

    <!-- ======= Our Services Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Categories</h2>
                <ol>
                    @if(!Auth::guest())
                    <a href="{{url('/categories.create')}}" class="btn btn-success">Add Category</a>
                    @endif
                </ol>

            </div>


        </div>
    </section><!-- End Our Categories Section -->

    <!-- ======= Service Details Section ======= -->
    <section class="service-details">

        <div class="container">

            <div class="row">


            @foreach ($categories as $row)

            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">

                <div class="card">
                    <div class="card-img">
                        <img src="{{ URL::to($row->image) }}" alt="...">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><a href="{{url('categories.show.'.$row->id)}}">{{ $row->category_name }}</a></h5>
                        <p class="card-text">{{ $row->category_description }}</p>
                    <div class="read-more"><a href="{{url('categories.show.'.$row->id)}}"><i class="icofont-arrow-right"></i> Read More</a></div>
                </div>

            </div>

            @endforeach

        </div>
    </section><!-- End Service Details Section -->

@endsection
