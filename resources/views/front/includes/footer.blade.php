@section('footer')
<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="#"><img src="{{asset('front/images/footerlogo.png')}}" alt="Logo Image"></a>
						<p class="copyright">BlugMaster @ 2018. All rights reserved.</p>
						<p class="copyright">Designed by <a href="" target="_blank">BIT 8th</a></p>
						<ul class="icons">
							<li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
							<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
							<li><a href="#"><i class="fab fa-vine"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							<li><a href="#">BEAUTY</a></li>
							<li><a href="#">HEALTH</a></li>
							<li><a href="#">MUSIC</a></li>
						</ul>
						<ul>
							<li><a href="#">SPORT</a></li>
							<li><a href="#">DESIGN</a></li>
							<li><a href="#">TRAVEL</a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form>
								<input class="email-input" type="text" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->


	<script src="{{asset('front/js/tether.min.js')}}"></script>

	<script src="{{asset('front/js/bootstrap.js')}}"></script>

	<script src="{{asset('front/js/scripts.js')}}"></script>

	<!--for login -->
	<script src="{{asset('front/js/login-js.js')}}"></script>

</html>
@endsection
