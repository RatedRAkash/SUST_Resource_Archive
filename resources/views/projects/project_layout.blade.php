@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <script type="text/javascript">
        document.getElementById('projects').className = "active";
    </script>

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h4>Projects</h4>

                @yield('content_project_navbar')

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Projects</li>
                </ol>

            </div>

        </div>
    </section><!-- End About Us Section -->




      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	    <script src="https://use.fontawesome.com/52c50009ac.js"></script>
     <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>


      <style>
    		* {
    			margin: 10;
    			padding: 10;
    		}

    		html {
    			height: 100%
    		}

        body{
              background:#eee;
        }

       .btn {
          margin-bottom: 5px;
       }

    		p {
    			color: grey
    		}

    		#heading {
    			text-transform: uppercase;
    			color: #2f617a;

    			font-weight: normal
    		}

    		#msform {
    			text-align: center;
    			position: relative;
    			margin-top: 20px
    		}

    		#msform fieldset {
    			background: white;
    			border: 0 none;
    			border-radius: 0.5rem;
    			box-sizing: border-box;
    			width: 100%;
    			margin: 0;
    			padding-bottom: 20px;
    			position: relative
    		}

    		.form-card {
    			text-align: left
    		}

    		#msform fieldset:not(:first-of-type) {
    			display: none
    		}

    		#msform .input-text,
    		#msform .textarea-text {
    			padding: 8px 15px 8px 15px;
    			border: 1px solid #ccc;
    			border-radius: 0px;
    			margin-bottom: 25px;
    			margin-top: 2px;
    			width: 100%;
    			box-sizing: border-box;
    			font-family: montserrat;
    			color: #2C3E50;
    			background-color: #ECEFF1;
    			font-size: 16px;
    			letter-spacing: 1px
    		}

    		#msform input:focus,
    		#msform textarea:focus {
    			-moz-box-shadow: none !important;
    			-webkit-box-shadow: none !important;
    			box-shadow: none !important;
    			border: 1px solid #2f617a;
    			outline-width: 0
    		}

    		#msform .action-button {
    			width: 100px;
    			background: #2f617a;
    			font-weight: bold;
    			color: white;
    			border: 0 none;
    			border-radius: 0px;
    			cursor: pointer;
    			padding: 10px 5px;
    			margin: 10px 0px 10px 5px;
    			float: right
    		}

    		#msform .action-button:hover,
    		#msform .action-button:focus {
    			background-color: #216da4
    		}

    		#msform .action-button-previous {
    			width: 100px;
    			background: #616161;
    			font-weight: bold;
    			color: white;
    			border: 0 none;
    			border-radius: 0px;
    			cursor: pointer;
    			padding: 10px 5px;
    			margin: 10px 5px 10px 0px;
    			float: right
    		}

    		#msform .action-button-previous:hover,
    		#msform .action-button-previous:focus {
    			background-color: #000000
    		}

    		.card {
    			z-index: 0;
    			border: none;
    			position: relative
    		}

    		.fs-title {
    			font-size: 25px;
    			color: #2f617a;
    			margin-bottom: 15px;
    			font-weight: normal;
    			text-align: left
    		}

    		.purple-text {
    			color: #2f617a;
    			font-weight: normal
    		}

    		.steps {
    			font-size: 25px;
    			color: gray;
    			margin-bottom: 10px;
    			font-weight: normal;
    			text-align: right
    		}

    		.fieldlabels {
    			color: gray;
    			text-align: left
    		}

    		#progressbar {
    			margin-bottom: 30px;
    			overflow: hidden;
    			color: lightgrey
    		}

    		#progressbar .active {
    			color: #2f617a
    		}

    		#progressbar li {
    			list-style-type: none;
    			font-size: 15px;
    			width: 25%;
    			float: left;
    			position: relative;
    			font-weight: 400
    		}

    		#progressbar #introduction:before {
    			font-family: FontAwesome;
    			content: "\f129"
    		}

    		#progressbar #domain:before {
    			font-family: FontAwesome;
    			content: "\f1b3"
    		}

    		#progressbar #settings:before {
    			font-family: FontAwesome;
    			content: "\f085 "
    		}

    		#progressbar #confirm:before {
    			font-family: FontAwesome;
    			content: "\f00c"
    		}

    		#progressbar li:before {
    			width: 50px;
    			height: 50px;
    			line-height: 45px;
    			display: block;
    			font-size: 20px;
    			color: #ffffff;
    			background: lightgray;
    			border-radius: 50%;
    			margin: 0 auto 10px auto;
    			padding: 2px
    		}

    		#progressbar li:after {
    			content: '';
    			width: 100%;
    			height: 2px;
    			background: lightgray;
    			position: absolute;
    			left: 0;
    			top: 25px;
    			z-index: -1
    		}

    		#progressbar li.active:before,
    		#progressbar li.active:after {
    			background: #2f617a
    		}

    		.progress {
    			height: 20px
    		}

    		.progress-bar {
    			background-color: #2f617a
    		}

    		.fit-image {
    			width: 100%;
    			object-fit: cover
    		}

    		.Scroll {
    			height:100px;
    			overflow-y: scroll;
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

      <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>

    	<!--  Select js is added at mainlayout-->

    	<script type='text/javascript'>
      	$(document).ready(function(){

      		var current_fs, next_fs, previous_fs; //fieldsets
      		var opacity;
      		var current = 1;
      		var steps = $("fieldset").length;

      		setProgressBar(current);

      		$(".next").click(function(){

      		current_fs = $(this).parent();
      		next_fs = $(this).parent().next();

      		//Add Class Active
      		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      		//show the next fieldset
      		next_fs.show();
      		//hide the current fieldset with style
      		current_fs.animate({opacity: 0}, {
      		step: function(now) {
      		// for making fielset appear animation
      		opacity = 1 - now;

      		current_fs.css({
      		'display': 'none',
      		'position': 'relative'
      		});
      		next_fs.css({'opacity': opacity});
      		},
      		duration: 500
      		});
      		setProgressBar(++current);
      		});

      		$(".previous").click(function(){

      		current_fs = $(this).parent();
      		previous_fs = $(this).parent().prev();

      		//Remove class active
      		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      		//show the previous fieldset
      		previous_fs.show();

      		//hide the current fieldset with style
      		current_fs.animate({opacity: 0}, {
      		step: function(now) {
      		// for making fielset appear animation
      		opacity = 1 - now;

      		current_fs.css({
      		'display': 'none',
      		'position': 'relative'
      		});
      		previous_fs.css({'opacity': opacity});
      		},
      		duration: 500
      		});
      		setProgressBar(--current);
      		});

      		function setProgressBar(curStep){
      		var percent = parseFloat(100 / steps) * curStep;
      		percent = percent.toFixed();
      		$(".progress-bar")
      		.css("width",percent+"%")
      		}

      		$(".submit").click(function(){
      		return false;
      		})


      	});


      </script>




    @yield('content_project')


</main>

@endsection
