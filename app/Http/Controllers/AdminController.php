<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Cart;

use Session;
session_start();

class AdminController extends Controller
{
    public function adminPanel(){
       
       return view('admin_layout');
    }
    
    public function addProduct(){

        return view('add_product');
    }

    public function saveProduct(Request $request)
    {
       
        $data= array();
        
        $data['product_code'] = Str::random(5);  
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        

        
    if($request->hasfile('product_image'))
        {
            $image = $request->file('product_image');
            
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if($success)
            {
                $data['product_image'] = $image_url;
                DB::table('tbl_product')->insert($data);
               
                Session::put('message','Add product successfully!!..');
                return Redirect('/add-product');
            
                
            }
           
            
        }
        else{
            $data['product_image'] ='';
            DB::table('tbl_product')->insert($data);
            return Redirect('/add-product');
        }    
    
    }
        public function all_product(){
         
            $all_product_info = DB::table('tbl_product')
                            ->select('tbl_product.*')
                            ->orderBy('product_id','asc')
                            ->get();
    
             
    
            $manage_product = view('all_product')
                           ->with('all_product_info',$all_product_info);
            
                return view('admin_layout')
                   ->with('all_product',$manage_product);
      
          }
        
          public function homeindex(){

            $all_published_product = DB::table('tbl_product')
                           
                            ->select('tbl_product.*')
                            ->limit(18)
                            
                            ->get();
    
    
    
            return view('home')
                           ->with('all_published_product',$all_published_product);
            
              
            
            
            //return view('pages.home');
         
        }
        
        public function addcart($product_code){
          
                 $result2=DB::table('tbl_product')
                     ->where('product_code',$product_code)
                     ->first();
                     $data = array();
                     $data['id']= $result2->product_code;
                     $data['name']= $result2->product_name;
                     $data['price']= $result2->product_price;
                     $data['quantity']=1;
                     
                     Cart::add($data);
                     return Redirect::to('/');
        }

        public function deletecart($id){

               Cart::remove($id);
             return Redirect::to('/');
    
        }



    public function order_place(){

            $odata = array();
            $tax=0;
            $subtotal = 0;
            $sum = 0;
            $odata['customer_id'] = Session::get('customer_id');
           
            $contents  = Cart::getcontent(); 
            foreach($contents as $to){
                $p = $to->price;
                $q = $to->quantity;
                $total = $p*$q;
                $subtotal = $subtotal +$total;
                $sum = $tax + $subtotal;
    
    
    
            } 
            $odata['order_total'] =  $sum;
            if($odata['order_total']>0){
            $odata['order_status'] =  'pendding';
            $order_id = DB::table('tbl_order')
                        ->insertGetId($odata);
    
           
            $oddata = array();     
            foreach($contents as $c){
                $oddata['order_id'] = $order_id;
                $oddata['product_code'] = $c->id;
                $oddata['product_name'] = $c->name;
                $oddata['product_price'] = $c->price;
                $oddata['product_quantity'] = $c->quantity;
                
                DB::table('tbl_order_detail')
                  ->insert($oddata);
              
            }  
            Session::put('order','Order created Successfully ') ;
            return Redirect::to('/'); 
        }else{
            Session::put('uorder','Order ivalid ') ;
            return Redirect::to('/'); 
        }  
        }

        public function view_product($product_code){

            $view_product = DB::table('tbl_product')
            ->select('tbl_product.*')
            ->where('tbl_product.product_code',$product_code)
            ->first();
    
    
    
            return view('view_product')
                ->with('view_product',$view_product);
    
           
    
        }

        public function manage_order(){

            $all_order_info = DB::table('tbl_order') 
            ->select('tbl_order.*')
            ->orderBy('order_id','asc')
            ->get();
    
    
    
            return view('manage_order')
                ->with('all_order_info',$all_order_info);
    
            
    
        }

        public function order_details($order_id){

                     
            $all_customer_info = DB::table('tbl_order_detail')
                            ->join('tbl_order','tbl_order_detail.order_id','=','tbl_order.order_id')   
                            ->select('tbl_order.*','tbl_order_detail.*')
                            ->where('tbl_order_detail.order_id',$order_id)
                            ->get();

    
                return view('order-details')
                    ->with('all_customer_info',$all_customer_info);
                
                                       

          }     

          public function search(Request $request)
          {
              
              $search_i = $request->search;

             $search_item =  DB::table('tbl_product')
                 ->where('product_code',$search_i)
                 ->first();

            return view('search')->with('search_item',$search_item);

          }

          public function delete_product($product_code)
          {
             
              DB::table('tbl_product')
              ->where('product_code',$product_code)
              ->delete(); 

              
             
              return Redirect::to('/all-product');
          }

          public function delete_order($order_id)
          {
              
              DB::table('tbl_order')
              ->where('order_id',$order_id)
              ->delete(); 
              
               DB::table('tbl_order_detail')
              ->where('order_id',$order_id)
              ->delete();
              
              return Redirect::to('/manage-order');
          }
      
          public function edit_product($product_id)
            {   
           
                $product_info = DB::table('tbl_product')
                ->where('product_id',$product_id)
                ->first();
                return view('edit_product')
                            ->with('product_info',$product_info);
            
                
            }

    
            public function update_product(Request $request, $product_id)
            {   
               
                $data = array();
                $data['product_name'] = $request->product_name;
                $data['product_description'] = $request->product_description;
                $data['product_size'] = $request->product_size;
                
                if($request->hasfile('product_image')){
                $image = $request->file('product_image');
            
                $image_name = Str::random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'image/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path,$image_full_name);
                $data['product_image'] = $image_url;
                }  
                DB::table('tbl_product')
                   ->where('product_id',$product_id)
                   ->update($data);
                 
                   
                   return Redirect::to('/all-product');
                   
            }
    

}
