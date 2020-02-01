<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
	<title>Barcode Gernerate</title>
</head>
<body>

                
                 <div style="margin-left:15%;margin-top:5%;">
				 <p class="alert-success">{{Session::get('order')}}</p>
				 <?php Session::put('order',null);?>
				 <p class="alert-danger">{{Session::get('uorder')}}</p>
				 <?php Session::put('uorder',null);?>
                <div  class="col-sm-9 padding-right" >
					<div class="features_items"><!--features_items-->
					        <!-- Search form -->
							<form action="{{url('/search')}}" method="post">
							{{csrf_field()}}
							<div class="md-form mt-0">
							<input class="form-control" type="text" placeholder="Search by barcode number" name="search" aria-label="Search">
							<input type="submit" value = "Search">
							</div>
							</form>
							<h2 class="title text-center">Features Items</h2>
						<?php   foreach($all_published_product as $pp){?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ $pp->product_image}}" style="height:100px;width:100px" alt="" />
													<h2><?php echo DNS1D::getBarcodeSVG($pp->product_code, "C39");?></h2>
													
													<a href="{{URL::to('/add-cart/'.$pp->product_code)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2><?php echo DNS1D::getBarcodeSVG($pp->product_code, "C39");?></h2>
														
													<a href="{{URL::to('/add-cart/'.$pp->product_code)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
													<li><a href="{{URL::to('/view-product/'.$pp->product_code)}}"><i class="fa fa-plus-square"></i>View product</a></li>
												</ul>
											</div>
										</div>
									</div>	
								<?php } ?>	
								</div><!--features_items-->
					
								</div>
			                 

								</div>

		<div style="margin:0 auto;margin-left:15%;">
	   <section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
               <?php
                 
				  $content = Cart::getcontent();
				  $sub_total=0;
                 

               
               
               ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="total">Total</td>
                            <td>Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                       <?php foreach($content as $con){?>
						<tr>
							<td class="cart_product">
							<h4><a href=""><?php echo DNS1D::getBarcodeSVG($con->id, "C39");?></a></h4>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$con->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$con->price}} tk</p>
							</td>
							
							<td class="cart_total">
                                <p class="cart_total_price">
                                <?php 
                                $t=$con->price;
                               
                                $total = $t;
                                $sub_total = $sub_total+$total;
                                echo $total;  
                                
                                
                                
                                ?> tk</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/detele-cart',$con->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                       <?php }?>

						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span><?php echo $sub_total;?></span></li>
							<li>Eco Tax <span><?php $tax = 00.00; echo $tax?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><?php $sum=$tax+$sub_total;echo $sum; Session::put('total',$sum);?></span></li>
						</ul>
                           
							

							<?php
										   $customer_id = Str::random(5);
										   Session::put('customer_id',$customer_id);
								?>

                                <?php
										 if($customer_id != NULL){
                                ?> <form action="{{url::to('/order-place')}}" method="post">
								{{csrf_field()}}
								        <input type="submit" class="btn btn-default update" value="Order">
										
								<?php }else{
								?>
											 <a type="text" class="btn btn-default update"href= "{{url('/order-place')}}">check out</a>
								<?php
										 }
								?>
                                 </form>
                            
                        
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
								
	</div>

	

	<script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>



           
					
					