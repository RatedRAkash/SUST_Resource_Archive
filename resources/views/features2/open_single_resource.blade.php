@extends('layouts.mainLayout')

@section('content')
<main id="main">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!--<link rel="stylesheet" href="assets/vendor/bootstrap/view_project_bootstrap.min.css">-->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
	<style>
	/* The sidebar menu */
		a {
			text-decoration: none !important
		}
		.sidenav {
			  position: fixed;
			  z-index: 1;
			  overflow-x: hidden;
			  padding: 8px 0;
		}
	</style>

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
					<li><a href="/resources">Resources</a></li>
				</ol>
			</div>

		</div>
	</section><!-- End About Us Section -->


	<div class="container px-4">
		<div class="row gx-5">
			<div class="col-8">

				<div data-bs-spy="scroll" style="height:700px; overflow-y:scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">

				<img src="assets/img/resource/no-image.png" class="rounded img-fluid" alt="No image available" style="width:850px;height:250px;">
				<br><br>

				<div class="card" id="resource-title">
					<h5 class="card-header" >Thesis/Project Title</h5>

					<div class="card-body">
						<h5 class="card-title">Dolorum optio tempore voluptas dignissimos cumque fuga qui
							quibusdam quia reiciendis</h5>
						<p class="card-text"> <b>Started form:</b> December 28, 2020 <br> <b>Last updated:</b> December 28, 2020 </p>
					</div>

					<div class="card-footer">
						<b>Tags:</b> ML, AI, Thesis, NLP
					</div>
				</div>

				<br>

				<div class="card text-dark bg-light mb-3" id="abstract">
					<h5 class="card-header">Abstract</h5>

					<div class="card-body">
						<p class="card-text">
							A product description is the marketing copy that explains what a product is and why it’s worth purchasing.
							The purpose of a product description is to supply customers with important information about the features and benefits of the product so they’re compelled to buy.

							However, entrepreneurs and marketers alike are susceptible to a common mistake that comes up when writing product descriptions.
							Even professional copywriters make it sometimes: writing product descriptions that simply describe your products.

							Why is it wrong? Because great product descriptions need to augment your product pages by selling your products to real people,
							not just acting as back-of-the-box dispensers of information for search engines (though search engine optimization can't be an afterthought, of course).

							Let’s have a look at nine simple ways to persuade visitors to your online store with product descriptions that sell.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="assets/img/resource/img_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Image1.png &nbsp;(<i>Image File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card text-dark bg-light mb-3" id="section-1">
					<h5 class="card-header">Section 1</h5>

					<div class="card-body">
						<p class="card-text">
							This is the part 1 of the resourse.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="assets/img/resource/pdf_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									PDF1.pdf &nbsp;(<i>PDF File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card text-dark bg-light mb-3" id="section-2">
					<h5 class="card-header">Section 2</h5>

					<div class="card-body">
						<p class="card-text">
							This is the part 2 of the resourse.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="assets/img/resource/video_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Video1.mpg &nbsp;(<i>Video File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card text-dark bg-light mb-3" id="section-3">
					<h5 class="card-header">Section 3</h5>

					<div class="card-body">
						<p class="card-text">
							This is the part 3 of the resourse.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="assets/img/resource/program_icon.jpg" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Code1.cpp &nbsp;(<i>Program File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card text-dark bg-light mb-3" id="section-4">
					<h5 class="card-header">Section 4</h5>

					<div class="card-body">
						<p class="card-text">
							This is the part 4 of the resourse.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="assets/img/resource/exe_icon.png" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									App1.exe &nbsp;(<i>Executable  File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card text-dark bg-light mb-3" id="section-5">
					<h5 class="card-header">Section 5</h5>

					<div class="card-body">
						<p class="card-text">
							This is the part 5 of the resourse.
						</p>
					</div>

					<div class="card-footer">
						<b>Resources:</b>
						<br>
						<div class="card text-white bg-dark mb-3">
							<div class="row">
								<div class="col col-sm-11">
									<img src="assets/img/resource/presentation_icon.jpg" class="rounded img-fluid" alt="No image available" style="width:50px;height:50px;">
									Presentation1.ppt &nbsp;(<i>Presentation File</i>)
								</div>
								<div class="col">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>
				</diV>
			</div>

			<div class="position-fixed top-22 end-0 w-25">
				<div class="container">
					<div class="card text-dark bg-light mb-3 ">
					  <div class="card-body">

                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                        <br>
                        <br>

						<div id="list-example" class="list-group">
						  <a class="list-group-item list-group-item-action" href="#resource-title">Thesis/Project Title</a>
						  <a class="list-group-item list-group-item-action" href="#abstract">Abstract</a>

						<div class="accordion" id="accordionExample">

							  <div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
								  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Sections
								  </button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								  <div class="accordion-body">
									  <a class="list-group-item list-group-item-action" href="#section-1">Section 1</a>
									  <a class="list-group-item list-group-item-action" href="#section-2">Section 2</a>
									  <a class="list-group-item list-group-item-action" href="#section-3">Section 3</a>
									  <a class="list-group-item list-group-item-action" href="#section-4">Section 4</a>
									  <a class="list-group-item list-group-item-action" href="#section-5">Section 5</a>

								  </div>
								</div>
							  </div>

						</div>
						</div>


					  </div>
					</div>
				</div>

			</div>

		</div>
	</div>

    <br>
    <br>
    <br>
    <br>
    <br>
</main>

@endsection
