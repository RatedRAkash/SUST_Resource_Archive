@extends('layouts.mainLayout')

@section('content')

<main id="main">

    <script type="text/javascript">
        document.getElementById('about').className = "active";
    </script>

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h4>Resources</h4>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Resources</li>
                </ol>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="/resources">All Resources</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Create New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Resources</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Favourite</a>
        </li>
      </ul>

      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	    <script src="https://use.fontawesome.com/52c50009ac.js"></script>
     <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>

      <style>
    		* {
    			margin: 0;
    			padding: 0;
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
    			color: #673AB7;
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
    			border: 1px solid #673AB7;
    			outline-width: 0
    		}

    		#msform .action-button {
    			width: 100px;
    			background: #673AB7;
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
    			background-color: #311B92
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
    			color: #673AB7;
    			margin-bottom: 15px;
    			font-weight: normal;
    			text-align: left
    		}

    		.purple-text {
    			color: #673AB7;
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
    			color: #673AB7
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
    			background: #673AB7
    		}

    		.progress {
    			height: 20px
    		}

    		.progress-bar {
    			background-color: #673AB7
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


        <div class="container-fluid">
      		<div class="row justify-content-center">
      			<div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
      				<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
      					<h2 id="heading">Form for creating a new workspace</h2>
      					<p>Fill all field marked in * to go to next step</p>



      					<form id="msform">
      						<!-- progressbar -->
      						<ul id="progressbar">
      							<li id="introduction" class="active"><strong>Introduction</strong></li>
      							<li id="domain"><strong>Domain</strong></li>
      							<li id="settings"><strong>Settings</strong></li>
      							<li id="confirm"><strong>Finish</strong></li>
      						</ul>

      						<div class="progress">
      							<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      						</div>

      						<br>

      						<!-- fieldsets -->


      						<fieldset>
      							<div class="form-card">
      								<div class="row">
      									<div class="col-7">
      										<h2 class="fs-title">Workspace Information:</h2>
      									</div>
      									<div class="col-5">
      										<h2 class="steps">Step 1 - 4</h2>
      									</div>
      								</div>

      								<label class="fieldlabels">Title: *</label>
      								<input class="input-text" type="text" name="title" placeholder="Title of your researh/project" required/>

      								<label class="fieldlabels">Description: </label>
      								<textarea class="form-control textarea-text" name="abstract" id="abstract" rows="5" placeholder="Tell us about your researh/project ..."></textarea>

      								<label for="cover_photo" class="form-label">Cover Photo:</label>
      								<input class="form-control" type="file" id="cover_photo">


      							</div>
      							<input type="button" name="next" class="next action-button" value="Next" />
      						</fieldset>

      						<fieldset>
      							<div class="form-card">
      								<div class="row">
      									<div class="col-7">
      										<h2 class="fs-title">Workspace Domain:</h2>
      									</div>
      									<div class="col-5">
      										<h2 class="steps">Step 2 - 4</h2>
      									</div>
      								</div>
      								<label class="fieldlabels">This workspace is for ___________ . *</label>
      								<select type="text" name="option" class="selectpicker my-select" data-width="100%" aria-label="Default select example">
      								  <option disabled selected>Choose between thesis and project.</option>
      								  <option value="thesis">Thesis</option>
      								  <option value="project">Project</option>
      								</select>

                      <br><br>
                      <div id="project-domains">
      								<label class="fieldlabels">Select domains for your workspace. *</label>
      								<select id="partners" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" >

      								  <option>Machine Learning</option>
      								  <option>Artificial Intelligence</option>
      								  <option>Deep Learning</option>
      								  <option>Database</option>
      								  <option>Graphics</option>
      								  <option>Security</option>
      								  <option>Blockchain</option>
      								  <option>Natural Language Processing</option>

      								</select>
                    </div><br>


      								<label class="fieldlabels">Is this a personal work/academic work/contest work?*</label>
      								<select type="text" name="option" class="selectpicker my-selec" onchange="active_field(this.value)" data-width="100%" aria-label="Default select example">
      								  <option disabled selected>Choose your answer.</option>
      								  <option value="Personal">Personal</option>
      								  <option value="Academic" >Academic</option>
      								  <option value="Contest">Contest</option>
      								</select><br><br>


                      <div class="d-none" id="academic_option">
      								<label class="fieldlabels">Course Details *</label>
      								<select id="partners" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" >

      								  <option>CSE420-Machine Learning</option>
      								  <option>CSE420-Artificial Intelligence</option>
      								  <option>CSE450-Project(iv)</option>
      								  <option>CSE420-Database</option>
      								  <option>CSE420-Graphics</option>
      								  <option>CSE420-Object Oriented Programming</option>
      								  <option>CSE420-Networking</option>

      								</select>
      								<br>
      							 </div>

      								<div class="d-none" id="contest_option">
      								<label class="fieldlabels">Contest Details </label>
      								<textarea class="form-control textarea-text" name="abstract" id="abstract" rows="5" placeholder="Tell us about the contest in details(name, category, position etc...)"></textarea>
      								<br>
      								</div>

                      <script>
      									function active_field(value){

      										if (value=="Personal"){
      											document.getElementById("academic_option").className = "d-none";
      											document.getElementById("contest_option").className = "d-none";
      										}

      										if (value=="Academic"){
      											document.getElementById("academic_option").className = "d-block";
      											document.getElementById("contest_option").className = "d-none";
      										}

      										if (value=="Contest"){
      											document.getElementById("contest_option").className = "d-block";
      											document.getElementById("academic_option").className = "d-none";
      										}


      									}
      								</script>

      							</div>
      							<input type="button" name="next" class="next action-button" value="Next" />
      							<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
      						</fieldset>

      						<fieldset>
      							<div class="form-card">
      								<div class="row">
      									<div class="col-7">
      										<h2 class="fs-title">Settings:</h2>
      									</div>
      									<div class="col-5">
      										<h2 class="steps">Step 3 - 4</h2>
      									</div>
      								</div>
      								<label class="fieldlabels">Privacy Settings: *</label>
      								<select type="text" name="option" class="selectpicker my-select" aria-label="Default select example" data-width="100%" onchange="active_field2(this.value)" >
      								  <option value="public" selected>Public(Everyone can see)</option>
      								  <option value="private">Private(You can customize who can see)</option>
      								  <option value="hidden">Hidden(Only you and your teammate can see)</option>
      								</select>
      								<br>

      								<div class="d-none" id="private-option">
                      <br>
      								<label class="fieldlabels">Select person who can see</label>
      								<select id="users" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" onchange="selectAll(this)">

      								  <option value="All" selected >Select All</option>
      								  <option selected>Nuhash</option>
      								  <option selected>Shovo</option>
      								  <option selected>Akash</option>
      								  <option selected>Borhan</option>

      								</select>
      								<br>
      								</div>
                      <br>

                      <div id="project-partner">
      								<label class="fieldlabels">Add partners </label>
      								<select id="partners" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" >

      								  <option>Nuhash</option>
      								  <option>Shovo</option>
      								  <option>Akash</option>
      								  <option>Borhan</option>

      								</select>
      								</div>
      								<br>

      								<div id="project-suprervisor">
      								<label class="fieldlabels">Add supervisor </label>
      								<select id="supervisors" class="selectpicker my-select" multiple data-selected-text-format="count > 3" data-live-search="true" data-width="100%" >

      								  <option>Nuhash</option>
      								  <option>Shovo</option>
      								  <option>Akash</option>
      								  <option>Borhan</option>

      								</select>
      								</div>


      								<script>
      									var old_selectedValue = $(document.getElementById('users')).val();

      									function selectAll(select){
      										console.log("Welcome")
      										var selectedValue = $(select).val();
      										console.log(selectedValue);
      										if (selectedValue.includes("All") === true && old_selectedValue.includes("All")=== false){
      											console.log("Welcome Inside 1(added)");
      											for (var i = 0; i < select.options.length; i++) {
      												select.options[i].selected = true;
      											}
      										}
      										else if (selectedValue.includes("All") === false && old_selectedValue.includes("All")=== true){
      											console.log("Welcome Inside 1(discard)");
      											for (var i = 0; i < select.options.length; i++) {
      												select.options[i].selected = false;
      											}
      										}
      										old_selectedValue = $(select).val();
      										$('.selectpicker').selectpicker('refresh')
      									}


      									function active_field2(value){
      										console.log("Inside");
      										if (value=="private"){
      											console.log("Inside2");
      											document.getElementById("private-option").className = "d-block";
      										}
                          else{
      										  document.getElementById("private-option").className = "d-none";
      									  }

      									}

      								</script>




      							</div>
      							<input type="button" name="next" class="next action-button" value="Submit" />
      							<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
      						</fieldset>

      						<fieldset>
      							<div class="form-card">
      								<div class="row">
      									<div class="col-7">
      										<h2 class="fs-title">Finish:</h2>
      									</div>
      									<div class="col-5">
      										<h2 class="steps">Step 4 - 4</h2>
      									</div>
      								</div> <br><br>
      								<h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
      								<div class="row justify-content-center">
      									<div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
      								</div> <br><br>
      								<div class="row justify-content-center">
      									<div class="col-7 text-center">
      										<h5 class="purple-text text-center">You Have Successfully Created A Resource</h5>
      									</div>
      								</div>
      							</div>
      						</fieldset>
      					</form>
      				</div>
      			</div>
      		</div>
      	</div>







</main>

@endsection
