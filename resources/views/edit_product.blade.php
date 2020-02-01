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
					<a href="#">Update product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
                
            
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-product',$product_info->product_id)}}" method="post">
                        {{ csrf_field() }}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Product name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
							  </div>
							</div>
        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_description" rows="3">{{$product_info->product_description}}</textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Image</label>
							  <div class="controls">
								<input type="file" class="input-xlarge" name="product_image" value="{{$product_info->product_image}}">
							  </div>
							</div>
							
                            <div class="control-group">
							  <label class="control-label" for="date01">Product size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" value="{{$product_info->product_size}}">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection