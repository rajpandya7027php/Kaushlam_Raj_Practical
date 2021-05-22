<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{

    //
    protected $fillable = [
        'item_id', 'name', 'price','description','image','gender','size','color','created_date','modify_date'
    ];
    public static function insertdata($insertdata){
    	//echo '<pre>';print_r($insertdata);//exit;
    	$item_id = $insertdata['item_id'];
    	$size = $insertdata['size'];
    	$color = $insertdata['color'];
    	$gender = $insertdata['gender'];
    	$where = array('item_id' => $item_id,'size'=>$size,'color'=>$color,'gender'=>$gender);
    	$already_exist_product = self::where($where)->first();
    	//echo '$already_exist_product<pre>';print_r($already_exist_product);//exit;
    	if(!empty($already_exist_product)){ 
    		//echo 'alredy exit';
    		return 2;
    	}else{
    		//echo 'Not exit;';
    		$affected = DB::table('products')->insert($insertdata);
    		return 	$affected;
    	}
    	//exit;
    	//$affected = DB::table('products')->insert(($insertdata);
    	return 	$affected;
    }
    public static function updaterecords($update,$product_id){
    	 $affected =  DB::table('products')->where('product_id', $product_id)->update($update);  
    	 return $affected;
    }
 }
