@extends('admin_layout')
@section('admin_content')
     <div class="row-fluid sortable">	
				
                

                <div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order id </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<h2><?php echo DNS1D::getBarcodeSVG(Session::get('orderid'), "C39");?></h2>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Product code</th>
									  <th>Product name</th>
									  <th>Product quantity</th> 
                                      <th>Product total</th>                                           
								  </tr>
							  </thead>   
							  <tbody>
                              <?php foreach($all_customer_info as $c){
								    Session::put('orderid',$c->order_id);
                                  ?>
                                <tr>
                                <td class="center"><?php echo DNS1D::getBarcodeSVG($c->product_code, "C39");?> </td>
                                <td class="center">{{ $c->product_name }} </td>  
                                <td class="center">{{ $c->product_quantity }}</td> 
                                <td class="center">{{ $c->product_price * $c->product_quantity }}</td>                                  
								</tr>
                                <?php
                              }
								?>
								
								                         
							  </tbody>
						 </table>  
						 
					</div>
				</div><!--/span-->
			</div><!--/row-->

                @endsection