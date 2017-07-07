<?php $this->layout('public_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>
<section id="home">
	
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
							<h2 class="heading animated bounceInDown"><img class="img-responsive"  src="assets/publique/images/logobigband.png" alt=""></h2><!-- 
							<p class="animated bounceInUp"></p> 
							<a class="btn btn-default slider-btn animated fadeIn" href="#"></a> -->
						</div> 
					</div> 
				</div>
				<div class="item" style="background-image: url(assets/publique/images/slider/slide2.jpg)"> 
					<div class="carousel-caption"> <div> 
						<h2 class="heading animated bounceInDown"><img class="img-responsive"  src="assets/publique/images/logobigband.png" alt=""></h2><!-- 
						<p class="animated bounceInUp">Everything is outstanding</p> <a class="btn btn-default slider-btn animated fadeIn" href="#">Get Started</a>--> 
					</div> 
				</div> 
			</div> 
			<div class="item" style="background-image: url(assets/publique/images/slider/slide1.jpg)"> 
				<div class="carousel-caption"> 
					<div> 
						<h2 class="heading animated bounceInRight"><img class="img-responsive" src="assets/publique/images/logobigband.png" alt=""></h2><!-- 
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
		<div class="row text-center">
			<div id="team-carousel" class="carousel slide" data-interval="false">
					<!--<a class="member-left" href="#team-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="member-right" href="#team-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>-->
					<div class="carousel-inner team-members">
						<div class="row item active">
							<div class="col-sm-6 col-md-3">
								<div class="single-member">
									<img src="assets/publique/images/our-team/member1.jpg" alt="team member" />
									<h4>Peter Ancelin</h4>
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
									<h4>Jeffrey Mollet</h4>
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
									<h4>Philip Nowak</h4>
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
									<h4>Oliver "magic" ROULET</h4>
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
		</div>
	</section><!--/#Our-Team-->
	<section id="services" class="parallax-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Prestations</h2>
					<p></p>
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
						<h2 class="title-one">Photos</h2>
						<p></p>
					</div>
				</div>
				<ul class="portfolio-filter text-center">
					<li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
					<li><a class="btn btn-default" href="#" data-filter=".html">Stade de France</a></li>
					<li><a class="btn btn-default" href="#" data-filter=".wordpress">Francofolies 2016</a></li>
					<li><a class="btn btn-default" href="#" data-filter=".joomla">HellFest</a></li>
					<li><a class="btn btn-default" href="#" data-filter=".megento">Les Vieilles Charrues</a></li>
				</ul><!--/#portfolio-filter-->
				<div class="portfolio-items">
					<div class="col-sm-3 col-xs-12 portfolio-item html">
						<div class="view efffect">
							<div class="portfolio-image">
								<img src="assets/publique/images/portfolio/portfolio1.jpg" alt=""></div> 
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
									<img src="assets/publique/images/portfolio/portfolio2.jpg" alt="">
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
									<img src="assets/publique/images/portfolio/portfolio3.jpg" alt="">
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
									<img src="assets/publique/images/portfolio/portfolio4.jpg" alt="">
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
									<img src="assets/publique/images/portfolio/portfolio5.jpg" alt="">
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
								<img src="assets/publique/images/portfolio/portfolio6.jpg" alt="">
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
								<img src="assets/publique/images/portfolio/portfolio7.jpg" alt="">
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
								<img src="assets/publique/images/portfolio/portfolio8.jpg" alt=""></div> 
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
									<img src="assets/publique/images/portfolio/portfolio9.jpg" alt="">
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
									<img src="assets/publique/images/portfolio/portfolio10.jpg" alt=""></div> 
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
										<img src="assets/publique/images/portfolio/portfolio16.jpg" alt=""></div> 
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
											<img src="assets/publique/images/portfolio/portfolio12.jpg" alt=""></div> 
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

							<!--<section id="blog"> 
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
														<h4>pour toute prestation</h4>
													</div>
												</div>
											</div>
										</div>

										<div class="container">
											<div class="contact-details">
												<div class="col-sm-12"> 
													
													
													<div id="contact-form-section">
														<form id="contact-form" name="contact-form" method="post" action="formulaire_employeur">
															<div class="row">
																<div class="col-lg-4">
																	<div class="form-group">
																		<label for="CL_Prenom">Prénom</label>
																		<input type="text" name="CL_Prenom" id="CL_Prenom" class="form-control" required="required" placeholder="Prénom" tabindex="1">
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="form-group">
																		<label for="CL_Nom">Nom</label>
																		<input type="text" name="CL_Nom" id="CL_Nom" class="form-control" required="required" placeholder="Nom" tabindex="2">
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="form-group">
																		<label for="CL_Telephone">Telephone</label>
																		<input type="text" name="CL_Telephone" id="CL_Telephone" class="form-control" required="required" placeholder="Téléphone" tabindex="3">
																	</div>
																</div>
															</div><!--Fin de row -->
															<div class="row">
																<div class="col-lg-6">
																	<div class="form-group">
																		<label for="CL_Email1">Adresse mail</label>
																		<input type="email" name="CL_Email1" id="CL_Email1" class="form-control" required="required" placeholder="Adresse mail" tabindex="4">
																	</div> 
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<label for="CL_Email2">Confirmez votre adresse mail</label>
																		<input type="email" name="CL_Email2" id="CL_Email2" class="form-control" required="required" placeholder="Confirmez votre adresse mail" tabindex="4">
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
																			<option value="particulier">Particulier</option>
																			<option value="entreprise">Entreprise</option>
																			<option value="administration">Administration</option>
																			<option value="association loi 1901">Association loi 1901</option>
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
																			<label for="DV_Codepostal">Code postal</label>
																			<input type="text" name="DV_Codepostal" id="DV_Codepostal" class="form-control"  placeholder="Code postal" tabindex="9">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<label for="DV_Ville">Ville</label>
																			<input type="text" name="DV_Ville" id="DV_Ville" class="form-control" placeholder="Ville" tabindex="10">
																		</div>
																	</div>
																</div><!--Fin de row -->
															</fieldset>
															
															<div class="form-group">
																<button type="submit" id="submitDemandeDeDevis" class="btn btn-success">Envoyer</button>
																<div id="errorsAjax" style="color:red"></div>
																<div id="successAjax" style="color:green"></div>
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
					<section id="clients" class="">
						<div class="container">
							<div class="clients-wrapper">
								<div class="row text-center">
									<div class="col-sm-8 col-sm-offset-2">
										<h2 class="title-one">Espace utilisateur</h2>
										<p>Employeur</p>
										<p>Artiste</p>
										<p>Administrateur</p>
									</div>
									<form method="POST" action="login">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="username">Nom d'utilisateur ou email</label>
												<input type="text" class="form-control" name="username" id="username" placeholder="Votre adresse mail ou votre nom d'utilisateur">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="password">Mot de passe</label>
												<input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
											</div>
										</div>
										<div class="col-sm-8 col-sm-offset-2">
											<a href="first_login" class="btn btn-primary">Premiere connexion</a>
											<button class="btn btn-success">Se connecter</button>
											<a href="forgot_password" class="btn btn-warning">Mot de passe oublié</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</section><!--/#clients-->

					<?php $this->stop('main_content') ?>

					<?=$this->start('js'); ?>
					<script>
						$(document).ready(function(){


							$('#submitDemandeDeDevis').on('click', function(e){
								e.preventDefault();
								//var $this = $(this); // L'objet jQuery du formulaire
								$.ajax({
									url: '<?=$this->url('form_employeur');?>',
									type: 'post',
									dataType: 'json',
									data: $('#contact-form').serialize(),
									/*success: function(retourJson){
										if(retourJson.result == true){
											$('#errorsAjax').hide();
											$('#successAjax').html(retourJson.success);
											$(':input','#contact-form')
											.not(':button, :submit, :reset, :hidden')
											.val('')
											.removeAttr('checked')
											.removeAttr('selected');
										}
										else if (retourJson.result == false){
											$('#successAjax').hide();
											$('#errorsAjax').html(retourJson.errors);
										}*/
									}
								});



							});

						});

					</script>
					<?=$this->stop('js'); ?>
