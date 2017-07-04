<?php $this->layout('public_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>
<section id="home">
	<div class="home-pattern"></div>
	<div id="main-carousel" class="carousel slide" data-ride="carousel"> 
		<ol class="carousel-indicators">
			<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#main-carousel" data-slide-to="1"></li>
			<li data-target="#main-carousel" data-slide-to="2"></li>
		</ol><!--/.carousel-indicators--> 
		<div class="carousel-inner">
			<div class="item active" style="background-image: url(assets/publique/images/slider/slide3.jpg)"> 
				<div class="carousel-caption"> 
					<div> 
							<h2 class="heading animated bounceInDown">Big Band</h2><!-- 
							<p class="animated bounceInUp"></p> 
							<a class="btn btn-default slider-btn animated fadeIn" href="#"></a> -->
						</div> 
					</div> 
				</div>
				<div class="item" style="background-image: url(assets/publique/images/slider/slide2.jpg)"> 
					<div class="carousel-caption"> <div> 
						<h2 class="heading animated bounceInDown">Big Band</h2><!-- 
						<p class="animated bounceInUp">Everything is outstanding</p> <a class="btn btn-default slider-btn animated fadeIn" href="#">Get Started</a>--> 
					</div> 
				</div> 
			</div> 
			<div class="item" style="background-image: url(assets/publique/images/slider/slide1.jpg)"> 
				<div class="carousel-caption"> 
					<div> 
						<h2 class="heading animated bounceInRight">Big Band</h2><!-- 
						<p class="animated bounceInLeft">100% Responsive HTML template</p> 
						<a class="btn btn-default slider-btn animated bounceInUp" href="#">Get Started</a> -->
					</div> 
				</div> 
			</div>
		</div><!--/.carousel-inner-->

		<a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		<a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div> 

</section><!--/#home-->

<section id="our-team">
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="title-one">Le Groupe</h2>
				<p>Un groupe jeune, dynamique et professionnel.</p>
			</div>
		</div>
		<div id="team-carousel" class="carousel slide" data-interval="false">
					<!--<a class="member-left" href="#team-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="member-right" href="#team-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>-->
					<div class="carousel-inner team-members">
						<div class="row item active">
							<div class="col-sm-6 col-md-3">
								<div class="single-member">
									<img src="assets/publique/images/our-team/member1.jpg" alt="team member" />
									<h4>Pierre Ancelin</h4>
									<h5>Keyboards, Vocals</h5>
									<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>-->
									<div class="socials">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#"><i class="fa fa-dribbble"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="single-member">
									<img src="assets/publique/images/our-team/member2.jpg" alt="team member" />
									<h4>Geoffrey Mollet</h4>
									<h5>Hang Drums, Vocals</h5>
									<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>-->
									<div class="socials">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#"><i class="fa fa-dribbble"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="single-member">
									<img src="assets/publique/images/our-team/member3.jpg" alt="team member" />
									<h4>Philippe Nowak</h4>
									<h5>Guitars, Vocals</h5>
									<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>-->
									<div class="socials">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#"><i class="fa fa-dribbble"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="single-member">
									<img src="assets/publique/images/our-team/member4.jpg" alt="team member" />
									<h4>Olivier ROULET</h4>
									<h5>Accordéons, Vocals</h5>
									<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>-->
									<div class="socials">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#"><i class="fa fa-dribbble"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</section><!--/#Our-Team-->
		<section id="services" class="parallax-section">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-8 col-sm-offset-2">
						<h2 class="title-one">Prestations</h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="our-service">
							<div class="services row">
								<div class="col-sm-4">
									<div class="single-service">
										<i class="fa fa-th"></i>
										<h2>Musique de rue</h2>
										<p>Avec toute son énergie BigBand vous propose son nouveau spectacle de rue</p>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="single-service">
										<i class="fa fa-html5"></i>
										<h2>Soirée privées</h2>
										<p>L'energie et l'authenticité de BigBand pour vos soirées privées </p>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="single-service">
										<i class="fa fa-users"></i>
										<h2>Concerts</h2>
										<p>Tout le professionnalisme et le show du BigBand</p>
									</div>
								</div></div>
							</div>
						</div>
					</div>
				</div>
			</section><!--/#service-->
			<section id="portfolio">
				<div class="container">
					<div class="row text-center">
						<div class="col-sm-8 col-sm-offset-2">
							<h2 class="title-one">Portfolio</h2>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
						</div>
					</div>
					<ul class="portfolio-filter text-center">
						<li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
						<li><a class="btn btn-default" href="#" data-filter=".html">Html</a></li>
						<li><a class="btn btn-default" href="#" data-filter=".wordpress">Wordpress</a></li>
						<li><a class="btn btn-default" href="#" data-filter=".joomla">Joomla</a></li>
						<li><a class="btn btn-default" href="#" data-filter=".megento">Megento</a></li>
					</ul><!--/#portfolio-filter-->
					<div class="portfolio-items">
						<div class="col-sm-3 col-xs-12 portfolio-item html">
							<div class="view efffect">
								<div class="portfolio-image">
									<img src="assets/publique/images/portfolio/1.jpg" alt=""></div> 
									<div class="mask text-center">
										<h3>Novel</h3>
										<h4>Lorem ipsum dolor sit amet consectetur</h4>
										<a href="#"><i class="fa fa-link"></i></a>
										<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-12 portfolio-item jooma">
								<div class="view efffect" >
									<div class="portfolio-image">
										<img src="assets/publique/images/portfolio/2.jpg" alt="">
									</div> 
									<div class="mask text-center">
										<h3>Novel</h3>
										<h4>Lorem ipsum dolor sit amet consectetur</h4>
										<a href="#"><i class="fa fa-link"></i></a>
										<a href="assets/publique/images/portfolio/big-item4.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-12 portfolio-item wordpress">
								<div class="view efffect">
									<div class="portfolio-image">
										<img src="assets/publique/images/portfolio/3.jpg" alt="">
									</div> 
									<div class="mask text-center">
										<h3>Novel</h3>
										<h4>Lorem ipsum dolor sit amet consectetur</h4>
										<a href="#"><i class="fa fa-link"></i></a>
										<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-12 portfolio-item megento">
								<div class="view efffect">
									<div class="portfolio-image">
										<img src="assets/publique/images/portfolio/4.jpg" alt="">
									</div> 
									<div class="mask text-center">
										<h3>Novel</h3>
										<h4>Lorem ipsum dolor sit amet consectetur</h4>
										<a href="#"><i class="fa fa-link"></i></a>
										<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-12 portfolio-item html">
								<div class="view efffect">
									<div class="portfolio-image">
										<img src="assets/publique/images/portfolio/5.jpg" alt="">
									</div> <div class="mask text-center">
									<h3>Novel</h3>
									<h4>Lorem ipsum dolor sit amet consectetur</h4>
									<a href="#"><i class="fa fa-link"></i></a>
									<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12 portfolio-item wordpress">
							<div class="view efffect">
								<div class="portfolio-image">
									<img src="assets/publique/images/portfolio/6.jpg" alt="">
								</div> 
								<div class="mask text-center">
									<h3>Novel</h3>
									<h4>Lorem ipsum dolor sit amet consectetur</h4>
									<a href="#"><i class="fa fa-link"></i></a>
									<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12 portfolio-item html">
							<div class="view efffect">
								<div class="portfolio-image">
									<img src="assets/publique/images/portfolio/7.jpg" alt="">
								</div> 
								<div class="mask text-center">
									<h3>Novel</h3>
									<h4>Lorem ipsum dolor sit amet consectetur</h4>
									<a href="#"><i class="fa fa-link"></i></a>
									<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12 portfolio-item joomla">
							<div class="view efffect">
								<div class="portfolio-image">
									<img src="assets/publique/images/portfolio/8.jpg" alt=""></div> 
									<div class="mask text-center">
										<h3>Novel</h3>
										<h4>Lorem ipsum dolor sit amet consectetur</h4>
										<a href="#"><i class="fa fa-link"></i></a>
										<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-12 portfolio-item html">
								<div class="view efffect">
									<div class="portfolio-image">
										<img src="assets/publique/images/portfolio/9.jpg" alt="">
									</div> 
									<div class="mask text-center">
										<h3>Novel</h3>
										<h4>Lorem ipsum dolor sit amet consectetur</h4>
										<a href="#"><i class="fa fa-link"></i></a>
										<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-12 portfolio-item wordpress">
								<div class="view efffect">
									<div class="portfolio-image">
										<img src="assets/publique/images/portfolio/10.jpg" alt=""></div> 
										<div class="mask text-center">
											<h3>Novel</h3>
											<h4>Lorem ipsum dolor sit amet consectetur</h4>
											<a href="#"><i class="fa fa-link"></i></a>
											<a href="assets/publique/images/portfolio/big-item.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
								<div class="col-sm-3 col-xs-12 portfolio-item joomla">
									<div class="view efffect">
										<div class="portfolio-image">
											<img src="assets/publique/images/portfolio/11.jpg" alt=""></div> 
											<div class="mask text-center">
												<h3>Novel</h3>
												<h4>Lorem ipsum dolor sit amet consectetur</h4>
												<a href="#"><i class="fa fa-link"></i></a>
												<a href="assets/publique/images/portfolio/big-item3.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
											</div>
										</div>
									</div>
									<div class="col-sm-3 col-xs-12 portfolio-item megento">
										<div class="view efffect">
											<div class="portfolio-image">
												<img src="assets/publique/images/portfolio/12.jpg" alt=""></div> 
												<div class="mask text-center">
													<h3>Novel</h3>
													<h4>Lorem ipsum dolor sit amet consectetur</h4>
													<a href="#"><i class="fa fa-link"></i></a>
													<a href="assets/publique/images/portfolio/big-item4.jpg" data-gallery="prettyPhoto"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div> 

							</section> <!--/#portfolio-->
							<section id="blog"> 
								<div class="container">
									<div class="row text-center clearfix">
										<div class="col-sm-8 col-sm-offset-2">
											<h2 class="title-one">Our Blog</h2>
											<p class="blog-heading">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
										</div>
									</div> 
									<div class="row">
										<div class="col-sm-4">
											<div class="single-blog">
												<img src="images/blog/1.jpg" alt="" />
												<h2>Lorem ipsum dolor sit amet</h2>
												<ul class="post-meta">
													<li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
													<li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
												</ul>
												<div class="blog-content">
													<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
												</div>
												<a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-detail">Read More</a>
											</div>
											<div class="modal fade" id="blog-detail" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-body">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<img src="images/blog/3.jpg" alt="" />
															<h2>Lorem ipsum dolor sit amet</h2>
															<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
														</div> 
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="single-blog">
												<img src="images/blog/2.jpg" alt="" />
												<h2>Lorem ipsum dolor sit amet</h2>
												<ul class="post-meta">
													<li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
													<li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
												</ul>
												<div class="blog-content">
													<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
												</div>
												<a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-two">Read More</a>
											</div>
											<div class="modal fade" id="blog-two" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-body">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<img src="images/blog/2.jpg" alt="" />
															<h2>Lorem ipsum dolor sit amet</h2>
															<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="single-blog">
												<img src="images/blog/3.jpg" alt="" />
												<h2>Lorem ipsum dolor sit amet</h2>
												<ul class="post-meta">
													<li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
													<li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
												</ul>
												<div class="blog-content">
													<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
												</div>
												<a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-three">Read More</a>
											</div>
											<div class="modal fade" id="blog-three" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-body">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<img src="images/blog/3.jpg" alt="" />
															<h2>Lorem ipsum dolor sit amet</h2>
															<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
														</div> 
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="single-blog">
												<img src="images/blog/3.jpg" alt="" />
												<h2>Lorem ipsum dolor sit amet</h2>
												<ul class="post-meta">
													<li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
													<li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
												</ul>
												<div class="blog-content">
													<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
												</div>
												<a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-four">Read More</a></div>
												<div class="modal fade" id="blog-four" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-body">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<img src="images/blog/3.jpg" alt="" />
																<h2>Lorem ipsum dolor sit amet</h2>
																<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
															</div> 
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="single-blog">
													<img src="images/blog/2.jpg" alt="" />
													<h2>Lorem ipsum dolor sit amet</h2>
													<ul class="post-meta">
														<li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
														<li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
													</ul>
													<div class="blog-content">
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
													</div>
													<a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-six">Read More</a>
												</div>
												<div class="modal fade" id="blog-six" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-body">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<img src="images/blog/2.jpg" alt="" />
																<h2>Lorem ipsum dolor sit amet</h2>
																<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
															</div> 
														</div>
													</div>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="single-blog">
													<img src="images/blog/1.jpg" alt="" />
													<h2>Lorem ipsum dolor sit amet</h2>
													<ul class="post-meta">
														<li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
														<li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
													</ul>
													<div class="blog-content">
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
													</div>
													<a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-seven">Read More</a>
												</div>
												<div class="modal fade" id="blog-seven" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-body">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<img src="images/blog/1.jpg" alt="" />
																<h2>Lorem ipsum dolor sit amet</h2>
																<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
															</div> 
														</div>
													</div>
												</div>
											</div> 
										</div> 
									</div> 
								</section> <!--/#blog-->
								<section id="contact">
									<div class="container">
										<div class="container">
											<div class="row text-center clearfix">
												<div class="col-sm-8 col-sm-offset-2">
													<div class="contact-heading">
														<h2 class="title-one">Contactez-nous</h2>
														<p>Pour toute prestation ou renseignement</p>
													</div>
												</div>
											</div>
										</div>

										<div class="container">
											<div class="contact-details">
												<div class="col-sm-12"> 
													<div class="status alert alert-success" style="">good job</div>
													<div id="contact-form-section">
														<form id="contact-form" name="contact-form" method="post" action="">
															<div class="row">
																<div class="col-lg-4">
																	<div class="form-group">
																		<label for="CL_prenom">Prénom</label>
																		<input type="text" name="CL_prenom" id="CL_prenom" class="form-control" required="required" placeholder="Prénom" tabindex="1">
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="form-group">
																		<label for="CL_nom">Nom</label>
																		<input type="text" name="CL_nom" id="CL_nom" class="form-control" required="required" placeholder="Nom" tabindex="2">
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="form-group">
																		<label for="CL_telephone">Telephone</label>
																		<input type="text" name="CL_telephone" id="CL_telephone" class="form-control" required="required" placeholder="Téléphone" tabindex="3">
																	</div>
																</div>
															</div><!--Fin de row -->
															<div class="row">
																<div class="col-lg-6">
																	<div class="form-group">
																		<label for="CL_email1">Adresse mail</label>
																		<input type="email" name="CL_email1" id="CL_email1" class="form-control" required="required" placeholder="Adresse mail" tabindex="4">
																	</div> 
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<label for="CL_email2">Confirmez votre adresse mail</label>
																		<input type="email" name="CL_email2" id="CL_email2" class="form-control" required="required" placeholder="Confirmez votre adresse mail" tabindex="4">
																	</div>
																</div>
															</div><!--Fin de row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="form-group">
																		<label for="CL_Raison_Sociale">Raison sociale</label>
																		<input type="text" name="CL_Raison_Sociale" id="CL_Raison_Sociale" class="form-control" placeholder="Raison sociale" tabindex="5">
																	</div>
																	<div class="form-group">
																		<label for="CL_Statut_Juridique">Statut juridique</label>
																		<select class="form-control" name="CL_Statut_Juridique" id="CL_Statut_Juridique" tabindex="6">
																			<option selected value="">Indiquez votre statut juridique</option>
																			<option value="Particulier">Particulier</option>
																			<option value="Entreprise">Entreprise</option>
																			<option value="Administration">Administration</option>
																			<option value="Association loi 1901">Association loi 1901</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="CL_Titulaire_Licence_Entrepreneur_De_Spectacles">Titulaire de la licence d'entrepreneur de spectacle
																			<input type="checkbox" name="CL_Titulaire_Licence_Entrepreneur_De_Spectacles" id="CL_Titulaire_Licence_Entrepreneur_De_Spectacles" tabindex="7">
																		</label>
																	</div>
																</div>
															</div><!-- fin de row -->
															<div class="row">
																<fieldset>
																	<legend>Votre évènement</legend>
																	<div class="col-lg-4">

																		<div class="form-group">
																			<label for="DV_Datedelaprestation">Date de votre évènement</label>
																			<input type="text" name="DV_Datedelaprestation" id="DV_Datedelaprestation" class="form-control" placeholder="01/01/2018" tabindex="8">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<label for="codepostal">Code postal</label>
																			<input type="text" name="codepostal" id="codepostal" class="form-control"  placeholder="Code postal" tabindex="9">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<label for="DV_Ville">Ville</label>
																			<input type="text" name="ville" id="ville" class="form-control" placeholder="Ville" tabindex="10">
																		</div>
																	</div>
																</div><!--Fin de row -->
															</fieldset>
															<div class="form-group">
																<button type="submit" class="btn">Envoyer</button>
															</div>
														</div>
													</div>
												</form> 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> 
					</section> <!--/#contact-->
					<section id="clients" class="parallax-section">
						<div class="container">
							<div class="clients-wrapper">
								<div class="row text-center">
									<div class="col-sm-8 col-sm-offset-2">
										<h2 class="title-one">Espace utilisateur</h2>
										<p>Employeur</p>
										<p>Artiste</p>
										<p>Administrateur</p>
									</div>
									<form>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="Email">Adresse Mail</label>
												<input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse mail">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="password">Mot de passe</label>
												<input type="password" class="form-control" id="password" id="password" placeholder="Votre mot de passe">
											</div>

										</div>
										<div class="col-sm-8 col-sm-offset-2">
											<a href=""><button class="btn btn-default">Se connecter</button></a>
											<a href=""><button class="btn btn-warning">Mot de passe oublié</button></a>
										</h2>

									</div>
								</form>
							</div>
						</div>
					</section><!--/#clients-->

					<?php $this->stop('main_content') ?>
