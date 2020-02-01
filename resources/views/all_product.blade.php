@extends('admin_layout')
@section('admin_content')

           <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product id</th>
								  <th>Product code</th>
                                  <th>Product image</th>
								  <th>Product name</th>
								  <th>Product description</th>
								  <th>Product size</th>
								  <th>Action</th>
							  </tr>
						  </thead>   

						@foreach($all_product_info as $p)
						  <tbody>
							<tr>
								<td>{{ $p->product_id}}</td>
								<td class="center"><?php echo DNS1D::getBarcodeSVG("$p->product_code", "C39");?></td>
								<td><img src="{{URL::to($p->product_image)}}" alt="product image" style="height:70px; width:70px"> </td>
                                <td>{{ $p->product_name}}</td>
								<td>{{ $p->product_description}}</td>
								<td>{{ $p->product_size}}</td> 
								<td class="center">
									<a class="btn btn-info" href="{{URL::to('/edit-product/'.$p->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$p->product_code)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>

						@endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection