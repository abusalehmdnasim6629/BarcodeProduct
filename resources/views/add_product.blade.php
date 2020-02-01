@extends('admin_layout')
@section('admin_content')

  
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
                
                
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add product->></h2>
                        <span>[Product barcode genarate automaticaly] </span>
						
					</div>
					<p class="alert-success">{{Session::get('message')}}</p>
					<?php Session::put('message',null);?>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Product name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required="" >
							  </div>
							</div>

                            

                           
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_description" required="" rows="3"></textarea>
							  </div>
							</div>
                            

                            <div class="control-group">
							  <label class="control-label" for="date01">Product price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="" >
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">Product image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div>  

                            <div class="control-group">
							  <label class="control-label" for="date01">Product size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" required="" >
							  </div>
							</div>

                            

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection