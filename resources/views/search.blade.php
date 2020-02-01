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
    <title>Document</title>
</head>
<body>




<div style="margin-left:30%;margin-top:15%;"class="col-sm-9 padding-right">
                   <div class="product-details"><!--product-details-->
                   <h2 class="title text-center" style="font-size:30px">Product Detail</h2>
						<div class="col-sm-5">
							<div class="view-product">
								<img style="width:250px;height:300px;"src="{{URL::to($search_item->product_image)}}" alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
                                <h2><?php echo DNS1D::getBarcodeSVG($search_item->product_code, "C39");?></h2>
								<h2>{{$search_item->product_name}}</h2>
                                <h2>Size: {{$search_item->product_size}}</h2>
								
								
								<span>
									<span>{{$search_item->product_price}} tk</span>
									<a href="{{URL::to('/add-cart/'.$search_item->product_code)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</span>
								
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

</div>
<script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>