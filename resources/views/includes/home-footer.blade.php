@if(is_null(Route::currentRouteName()))
<footer class="footer-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-3 footer-logo">
				<a href="#">
					<img class="img-fluid" src="{{ asset('public/assets/images/white-logo.png') }}">
				</a>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
				<p class="email">Email: info@rentsecure.ca</p>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col">
						<h4>COMPANY INFO</h4>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">How We Work</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
					<div class="col">
						<h4>OUR SERVICES</h4>
						<ul>
							<li><a href="#">Aliquam tincidunt</a></li>
							<li><a href="#">Mauris eu risus</a></li>
							<li><a href="#">Vestibulum auctor</a></li>
							<li><a href="#">Dapibus neque</a></li>
							<li><a href="#">Nunc dignissim risus</a></li>
						</ul>
					</div>
					<div class="col address-sec">
						<h4>GET IN TOUCH</h4>
						<p class="address"><strong>Address</strong>   12648 Agave Bay St Victorville,<br/> CA 92392United States</p>
						<ul>
							<li><a href="#">USA: +1 1234567890</a></li>
							<li><a href="#">UK: +44 1234567890</a></li>
							<li><a href="#">Canada: +1 1234567890</a></li>
							<li><a href="#">Australia: +61 1234567890</a></li>
						</ul>
					</div>
					<div class="col">
						<h4>Social Signals</h4>
						<ol>
							<li><a href="#"><i class="bi bi-facebook"></i></a></li>
							<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
							<li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
							<li><a href="#"><i class="bi bi-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="copyright">
			<p>Copyright © 2024 RentSecure.ca</p>
			<ul>
				<li><a href="#">Terms of Use</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Sitemap</a></li>
			</ul>
		</div>
		</div>
	</div>
</footer>
@endif

<!-- Web Script -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/js/main.js') }}"></script>
<script src="{{ asset('public/assets/js/select2.min.js') }}" defer></script>
<!----Custom Js ----------------------------------------------->

<script src="{{ asset('public/assets/js/register.js') }}"></script>

<!----Custom Js ----------------------------------------------->
</body>
</html>
