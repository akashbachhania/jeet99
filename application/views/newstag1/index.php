<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/newdesign/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/newdesign/css/custom.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/newdesign/css/animate.css')?>">
	<script src="<?php echo base_url('assets/newdesign/js/jquery.js')?>"></script>
	<script src="<?php echo base_url('assets/newdesign/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/newdesign/js/custom.js')?>"></script>   
	<script src="<?php echo base_url('assets/newdesign/js/wow.min.js')?>"></script>
	<script> new WOW().init(); </script> 
</head>
<body>
<!-- header -->
<div class="header">	
	<nav class="navbar navbar-fixed-top hd_Cl zindexplus" id="nav_header">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/newdesign/image/100x17.png')?>" class="img-responsive"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="dropdown active">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Features
	        	<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Page 1-1</a></li>
		          <li><a href="#">Page 1-2</a></li>
		          <li><a href="#">Page 1-3</a></li>
		        </ul>
  			</li>
	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Meet Our Artist
	        	<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Page 1-1</a></li>
		          <li><a href="#">Page 1-2</a></li>
		          <li><a href="#">Page 1-3</a></li>
		        </ul>
  			</li>
  			<li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Earn Money
	        	<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Page 1-1</a></li>
		          <li><a href="#">Page 1-2</a></li>
		          <li><a href="#">Page 1-3</a></li>
		        </ul>
  			</li>
	        <li><a href="#">Show</a></li> 
	        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> </a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	
	
		
	
</div>
<!-- content -->
<div class="container-fluid">
	<div class="row">
		<div class="videoTest box">
			<video id="top_vd" width="100%" height="auto" class="mrgn_tp_0 zindexminus" id="video_tag" autoplay muted loop>
		  	<source src="<?php echo base_url('assets/newdesign/video/5703843ab750b_vid.mp4')?>" type="video/mp4">
		  		Your browser does not support the video tag.
			</video>
			<div class="vd-box-text text-center wow fadeInDown" data-wow-delay="1s">
				<p>
					<h1>"Announcing – 99sound.com" </h1>
				</p>
				<p>
					<h6>A New Music Paradigm is About to Begin</h6>
				</p>
				<p>
					<a href="#">
						<i class="glyphicon glyphicon-menu-down"></i>
					</a>
				</p>
				
			</div>			
		</div>		
	</div>
	<div class="row ht_500">
		<div class="col-md-6">
			<div class="col-md-12">
				<h1 class="mrgn_tp_5 text-center">
					Player
				</h1>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
			</div>			
		</div>
		<div class="col-md-6">
			<div class="">
				<iframe id="iframe_amp" src="http://99sound.com/amp/embed/5aa6884a1c57a26cdbdcab26eec1a99d" frameborder="0" scrolling="no" width="100%" height="500px"> 
				</iframe>
			</div>			
		</div>		
	</div>
	<div class="row grad_blck ht_500">		
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 bg_white mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/am_player01.png" class="img-responsive">
						<a href="#">View Artist Music Player</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 fn_white col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Artist Music Player</u></h3>
				
				<p>
					An Industry First 4 level Affiliate Music Player, Fans & Artist can earn money Post This Player almost anywhere with shortcode you embed
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
	</div>
	<div class="row  ht_500">
		<div class="col-md-6 visible-xs">
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/al_page.png" class="img-responsive">
						<a href="#">View Artist Landing Page</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-xs-push-right col-lg-6">
			<div class="col-md-12 col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Artist Landing Page</u></h3>
				
				<p>
					Choose a different design and in an instant get a fresh Look.
					All Your Vitals Stored in One Place
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
			
		</div>
		<div class="col-md-6 hidden-xs col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/al_page.png" class="img-responsive">
						<a href="#">View Artist Landing Page</a>
					</div>
				</div>
			</div>			
		</div>		
	</div>
	<div class="row grad_blck ht_500">		
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 bg_white mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/am_player01.png" class="img-responsive">
						<a href="#">View Artist Music Player</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-md-6">
			<div class="col-md-12 fn_white col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Artist Music Player</u></h3>
				
				<p>
					An Industry First 4 level Affiliate Music Player, Fans & Artist can earn money Post This Player almost anywhere with shortcode you embed
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
	</div>
	<div class="row  ht_500">
		<div class="col-md-6 visible-xs">
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/ep_kit.png" class="img-responsive">
						<a href="#">View Electronic Press Kit</a>
					</div>
				</div>
			</div>			
		</div>	
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Electronic Press Kit</u></h3>
				
				<p>
					Choose different designs and Viola, a new look for new opportunities
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
			
		</div>
		<div class="col-md-6 hidden-xs col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/ep_kit.png" class="img-responsive">
						<a href="#">View Electronic Press Kit</a>
					</div>
				</div>
			</div>			
		</div>		
	</div>
	<div class="row grad_blck ht_500">		
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 bg_white mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/wf_artist1.png" class="img-responsive">
						<a href="#">View Worldwide Featured Artist</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 fn_white col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Worldwide Featured Artist</u></h3>
				
				<p>
					OurFeatured/Premium Artists
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
	</div>
	<div class="row  ht_500">
		<div class="col-md-6 visible-xs">
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/icon-landing-page22.png" class="img-responsive">
						<a href="#">View The Total Tour</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>The Total Tour</u></h3>
				
				<p>
					Budgetary and Itinerary solutions at your fingertips.Always stay informed with real time itinerary and notification alerting.
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
		<div class="col-md-6 hidden-xs col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20 col-lg-offset-4 col-lg-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/icon-landing-page22.png" class="img-responsive">
						<a href="#">View The Total Tour</a>
					</div>
				</div>
			</div>			
		</div>		
	</div>
	<div class="row grad_blck ht_500">		
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 bg_white mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/md_system.png" class="img-responsive">
						<a href="#">View Music Distribution System</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12 fn_white">
				<h3 class="text-center mrgn_tp_20"><u>Music Distribution System</u></h3>
				
				<p>
					Distribute Worldwide to over 140 countries.
					Choice of many different channels, iTunes, Spotify, 7digital, Deezer etc.
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
	</div>
	<div class="row  ht_500">
		<div class="col-md-6 visible-xs">
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/ssmedia2.png" class="img-responsive">
						<a href="#">View Social Media</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>One Stop Social Media</u></h3>
				
				<p>
					Post to the big 4, with one tool, Save time.
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
		<div class="col-md-6 hidden-xs col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20 col-lg-4 col-lg-offset-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/ssmedia2.png" class="img-responsive">
						<a href="#">View Social Media</a>
					</div>
				</div>
			</div>			
		</div>		
	</div>
	<div class="row grad_blck ht_500">		
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 bg_white mrgn_tp_20 col-lg-offset-4 col-lg-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/wf_artist.png" class="img-responsive">
						<a href="#">View Musicians Referral</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 fn_white col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Musicians Referral</u></h3>
				
				<p>
					Band and Artist, find each other, hook up
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
	</div>
	<div class="row  ht_500">
		<div class="col-md-6 visible-xs">
			<div class="col-md-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/g_events.png" class="img-responsive">
						<a href="#">View Gigs & Events</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">			
			<div class="col-md-12 col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Gigs & Events</u></h3>
				
				<p>
					Fans: Find out where your favorite Artists are playing.Artist: Send EPK’s to any Venue that pops up
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
		<div class="col-md-6 hidden-xs col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 hd_Cl mrgn_tp_20 col-lg-offset-4 col-lg-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/g_events.png" class="img-responsive">
						<a href="#">View Gigs & Events</a>
					</div>
				</div>
			</div>			
		</div>		
	</div>
	<div class="row grad_blck ht_500">		
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-5 col-md-offset-3 bg_white mrgn_tp_20 col-lg-offset-4 col-lg-4">
					<div class="img text-center">
						<img src="<?php echo base_url('assets/newdesign')?>/image/d_chat.png" class="img-responsive">
						<a href="#">View Dashboard Chat</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="col-md-12 fn_white col-lg-12">
				<h3 class="text-center mrgn_tp_20"><u>Dashboard Chat</u></h3>
				
				<p>
					Chat privately with your affiliates, form groups, blog
				</p>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>			
		</div>
	</div>
</div>

<div class="container-fluid bg_black ft">
	<div class="row hd_Cl">	 
		<div class="col-md-12 col-xs-12">
			<div class="col-md-3 col-xs-12">
				<h3>
					<span class="underline">Sub</span>scribe to our newsletter
				</h3>
				<p>
						Enter your email address to receive all news from our website.
				</p>
				<div class="input-group">
				   <input type="text" class="form-control" placeholder="Youe email address">
				   <span class="input-group-btn">
				        <button class="btn btn-primary" type="button">Subscribe!</button>
				   </span>
				</div>
				<p>
					Dont worry you'll not be spammed
				</p>
			</div>
			<div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<p>
								<h3>
									<span class="underline">My</span> Account
								</h3>
								
							</p>
							<p>
								<a href="#">Register</a>		
							</p>
							<p>
								<a href="#">Login</a>		
							</p>
							<p>
								<h3>
									Marketing
								</h3>
								<hr>
							</p>
							<p>
								<a href="#">Send/Share EPK</a>		
							</p>
							<p>
								<a href="#">Email Campaign</a>		
							</p>
						</div>
						<div class="col-md-3">
							<p>
								<h3>
									<span class="underline">To</span>ols
								</h3>
								
							</p>
							<p>
								<a href="#">Sell Your Music - AMP</a>
							</p>
							<p>
								<a href="#">Sell Your Music - MDS</a>
							</p>
							<p>
								<a href="#">Electronic Press Kit</a>
							</p>
							<p>
								<a href="#">The Total Tour</a>
							</p>
							<p>
								<a href="#">Social Media - 1 Post</a>
							</p>
							<p>
								<a href="#">Dashboard Chat</a>
							</p>
							<p>
								<a href="#">Notifications</a>
							</p>				
						</div>
						<div class="col-md-3">
							<p>
								<h3>
									<span class="underline">Po</span>licies
								</h3>
								
							</p>							
							<select class="form-control">
								<option>select</option>
								<option></option>
								<option></option>
							</select>
							<br>						
							<h3>
								<span class="underline">Te</span>rms and Conditions
							</h3>
							<select class="form-control">
								<option>select</option>
								<option></option>
								<option></option>
							</select>							
						</div>
						<div class="col-md-3">
							<p>
								<h3>
									<span class="underline">Su</span>pport
								</h3>
							</p>
							<p>
								<a href="#">FAQs</a>
							</p>
							<p>
								<a href="#">Abuse Form</a>
							</p>
							<p>
								<a href="#">&copy;Infringement Form</a>
							</p>
							<p>
								<a href="#">&copy;Counter NotIfication Form</a>
							</p>
							<p>
								<h3>
									<span class="underline">Co</span>ntact Us
								</h3>
							</p>						
						</div>
							
						</div>						
					</div>					
				</div>				
			</div>
			
		</div>
		<div class="row bg_blk">
			<span class="img col-md-3 pull-right">
				<a href="#"><img src="<?php echo base_url('assets/newdesign')?>/image/icon-new/fk.png" class="ht_wt_36"></a>
				<a href="#"><img src="<?php echo base_url('assets/newdesign')?>/image/icon-new/google-n.png" class="ht_wt_36"></a>
				<a href="#"><img src="<?php echo base_url('assets/newdesign')?>/image/icon-new/instagram-new.png" class="ht_wt_36"></a>
				<a href="#"><img src="<?php echo base_url('assets/newdesign')?>/image/icon-new/twitter-n.png" class="ht_wt_36"></a>
				<a href="#"><img src="<?php echo base_url('assets/newdesign')?>/image/icon-new/youtube.png" class="ht_wt_36"></a>
			</span>
			<span class="col-md-9 pull-left">
				<p>&copy;2017 By 99SOUND.COM INC. All Rights Reserved</p>
			</span>
		</div>
	</div>
</div>
</body>
</html>