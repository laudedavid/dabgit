<!DOCTYPE HTML>
<html>
	<head>
		<title>CAKEOLOGY</title>
		<link href="bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="bootstrap/js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="bootstrap/css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		
	</head>
	<style>
	 a{
	 	color:white;
	 }
	 a.hover{
	 	color:pink;
	 }
	</style>
	<body>
		{{ HTML::script('bootstrap/js/jquery.min.js') }}
    	{{ HTML::style('bootstrap/css/style.css') }}
    	{{ HTML::script('bootstrap/css/bootstrap.css') }}

	<!-- container -->
		<!-- top-header -->
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul>
						<li>{{HTML::link('/myaccountSeller','My Account', array('style' => 'color:white, hover: pink'))}}</li>
						<li>{{HTML::link('/logoutUser','Logout', array('style' => 'color:white, hover: pink'))}}</li>
						<div class="clearfix"> </div>
					</ul>
				</div>
				<div class="top-header-center">
					<p><span class="cart"> </span>SELLER'S PAGE</p>
				</div>
				<div class="top-header-right">
					<ul>
						
						<li style="margin-top:1px; margin-left:135px; color:white"><h4>&nbsp;&nbsp;Welcome, &nbsp;</h4></li>
						<li style="margin-top:1px; color:white"><h4><?php $select= Seller::orderBy('created_at','desc')->first();

						 $name=$select['name'];
						 echo $name;  ?></h4></li>
					</ul>s
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- /top-header -->
		<!-- main-menu -->
		<div class="main-menu">
			<div class="container">
			<div class="head-nav">
				<span class="menu"> </span>
				<ul>
					<li>{{HTML::link('/homeSeller','Home', array('style' => 'color:white, hover: pink'))}}</li>
					<li  class="active">{{HTML::link('/products','Products', array('style' => 'color:white, hover: pink'))}}</li>
					<li>{{HTML::link('/flavours','Flavours', array('style' => 'color:white, hover: pink'))}}</li>
					<li>{{HTML::link('/addCake','Add a Cake', array('style' => 'color:white, hover: pink'))}}</li>
					<div class="clearfix"> </div>
				</ul>
			</div>	
				<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav -->

				<!-- logo -->
				<div class="logo">
					<img src="bootstrap/images/logo1.png" title="Sweetcake" /></a>
				</div>
				<!-- logo -->
			</div>
		</div>
		<!-- /main-menu -->
	<!-- service -->
	<div class="biseller-info">
          		<div class="container">
						<h2>Cakes</h2>
							<h3 class="new-models">All Cakes</h3>
							<ul id="slider">
									<?php
										foreach($cakes as $cake) {
										echo '<li>';
										echo '<div class="biseller-column">';
											echo '<img alt="" class="veiw-img" />';
											echo '<img src="'. URL::asset('img/upload/'.$cake->image).'" />';
											echo '<div class="biseller-name">';
												echo "<b>";
												echo "$cake->name";
												echo "</b>";
												echo '<br>';
												echo "$cake->description";
												echo '<br>';
												echo "$cake->category";
												echo '<br>';
												echo "<b>";
												echo "$cake->price";
												echo "</b>";
											echo '</div>';
											echo '<div class="add2cart">';
						   						
						    					
						    					echo '<span>';
						    					echo HTML::link("/order/{$cake->id}",'ORDER');
						    					echo '</span>';
											echo '</div>';
										echo '</div>';
					 					echo '</li>';				

										}
					 				?>
					 			</ul>
					 		</div>
						</div>		
					</div>

			<script type="text/javascript">
				 $(window).load(function() {
					$("#slider").flexisel({
						visibleItems: 4,
						animationSpeed: 1000,
						autoPlay: false,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
				    	responsiveBreakpoints: { 
				    		portrait: { 
				    			changePoint:480,
				    			visibleItems: 1
				    		}, 
				    		landscape: { 
				    			changePoint:640,
				    			visibleItems: 2
				    		},
				    		tablet: { 
				    			changePoint:768,
				    			visibleItems: 3
				    		}
				    	}
				    });
				    
				});
			   </script>
			   <script type="text/javascript" src="bootstrap/js/jquery.flexisel.js"></script>
		
					

			<div class="clearfix"></div>


	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-3 location">
					<h4>location</h4>
					<p>#04 Dist.City,State,PK</p>
					<h4>hours</h4>
					<p>Weekdays 7 a.m.-7 p.m.</p>
					<p>Weekends 8 a.m.-7 p.m.</p>
					<p>Call for Holidays Hours.</p>
				</div>
				<div class="col-md-3 customer">
					<h4>customer service</h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. </p>
					<h4>phone</h4>
					<h6>1(234)567-8910</h6>
					<h4>contact us</h4>
					<h6>contact us page.</h6>
				</div>
				<div class="col-md-3 social">
					<h4>get social</h4>
					<div class="face-b">
						<img src="bootstrap/images/foot.png" title="name"/>
						<a href="#"><i class="fb"> </i></a>
					</div>
					<div class="twet">		
						<img src="bootstrap/images/foot.png" title="name"/>
							<a href="#"><i class="twt"> </i></a>
					</div>	
				</div>
				<div class="col-md-3 sign">
					<h4>sign up for news later</h4>	
						<form>
							<input type="text" class="text" value="YOUR EMAIL" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'YOUR EMAIL ';}">
						</form>
				</div>
					<div class="clearfix"> </div>
			</div>
			<div class="footer-bottom">
				<p>DEVELOPERS: CARULASAN, KIMBERLY JEAN && LAUDE, DAVID</p>
			</div>
		</div>
	</div>
	<!-- /footer -->
	</body>
</html>

