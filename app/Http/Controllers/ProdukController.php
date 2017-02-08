<?php

namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use App\User;
use App\Produk;
class ProdukController extends Controller
{
    public function getProductApi($token) {    
    	if(Request::isMethod('get'))
    	{
	    	if ($user = User::where('remember_token',$token)->first())
	    	{
	        	$products = Produk::where('users_id',$user->id)->get();
	        	$product_arr = array();
                foreach ($products as $product) {
                    $temp = array(
                        'id'           	=> (string)$product->id,
                        'name'        	=> $product->name,
                        'description'   => $product->description,
                        'stock'         => $product->stock,
                        'image'       	=> $product->image,
                        'created_at'	=> $product->created_at,
                        'updated_at'	=> $product->updated_at,
                    );
                    array_push($product_arr, $temp);
                }
                $res = array(
                        'status'        => 'success',
                        'products'  	=> $product_arr 
                    );
                return json_encode($res);
	    	}
	        $res = array(
                    'status'        => 'invalid',
                    'products'  	=> 'null'
                );
            return json_encode($res);
    	}
    }

    public function inputProduct($token) {    
    	if(Request::isMethod('post'))
    	{
	    	if ($user = User::where('remember_token',$token)->first()) {
	        		$data = Input::all();
	        		$cek = Produk::where('name',$data['name'])->count();
	        		if($cek == 0 && $data['stock'] > 0)
	        		{
					    $product = Produk::insertGetId(array(
							'name' 			=> $data['name'], 
							'description'	=> $data['description'],
							'stock' 		=> $data['stock'],
							'image'			=> $data['image'],
							'users_id'		=> $user->id,
						));
						$res = array(
				                'status'        => 'success'
				            );
				        return json_encode($res);
	        		}
	        		$res = array(
			                'status'        => 'failed',
			            );
			        return json_encode($res);
        	}
        	$res = array(
	                'status'        => 'invalid',
	            );
	        return json_encode($res);
    	}
    }

    public function updateProduct($id,$token) {    
    	if(Request::isMethod('post'))
    	{
	    	if ($user = User::where('remember_token',$token)->first()) {
	        		$data = Input::all();
	        		$cek_exist = Produk::where('id',$id)->count();
	        		if($cek_exist > 0)
	        		{
	        			$cek = Produk::where('name',$data['name'])->count();
	        			if($cek == 0 && $data['stock'] > 0)
	        			{
						    $product = Produk::insertGetId(array(
								'name' 			=> $data['name'], 
								'description'	=> $data['description'],
								'stock' 		=> $data['stock'],
								'image'			=> $data['image'],
							));
							$res = array(
					                'status'        => 'success'
					            );
					        return json_encode($res);
	        			}
	        			$res = array(
				                'status'        => 'failed',
				            );
				        return json_encode($res);
	        		}
	        		$res = array(
			                'status'        => 'not-exist',
			            );
			        return json_encode($res);
        	}
        	$res = array(
	                'status'        => 'invalid',
	            );
	        return json_encode($res);
    	}
    }

    public function detailProduct($id,$token) {    
    	if(Request::isMethod('get'))
    	{
	    	if ($user = User::where('remember_token',$token)->first())
	    	{
	        	if($product = Produk::find($id))
	        	{
		        	$product_arr = array();
	                $temp = array(
	                    'id'           	=> (string)$product->id,
	                    'name'        	=> $product->name,
	                    'description'   => $product->description,
	                    'stock'         => $product->stock,
	                    'image'       	=> $product->image,
	                    'created_at'	=> $product->created_at,
	                    'updated_at'	=> $product->updated_at,
	                );
	                array_push($product_arr, $temp);
	                $res = array(
	                        'status'        => 'success',
	                        'products'  	=> $product_arr 
	                    );
	                return json_encode($res);
	        	}
	        	$res = array(
	                    'status'        => 'not-exist',
	                    'products'  	=> 'null'
	                );
	            return json_encode($res);
	    	}
	        $res = array(
                    'status'        => 'invalid',
                    'products'  	=> 'null'
                );
            return json_encode($res);
    	}
    }

    public function deleteProduct($id,$token) {
		if ($user = User::where('remember_token',$token)->first())
		{
			if ($delete = History::where('id', $id)->delete()) {
				$res = array(
	                'status'        => 'deleted',
	            );
	        	return json_encode($res);
			}
			$res = array(
	                'status'        => 'not-exist',
	            );
	        return json_encode($res);
		}
		$res = array(
            'status'        => 'invalid',
        );
        return json_encode($res);
	}
}
