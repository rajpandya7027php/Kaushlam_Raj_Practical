<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Redirect;

class ProductController extends Controller
{
    
    public function index()
    {
        
        $data['products'] = Product::orderBy('product_id','DESC')->paginate(10);
        //echo '<pre>';print_r($data['products']);exit;
        return view('product.list',$data);
    }
     /*
   AJAX request
   */
   public function getProducts(Request $request){

     ## Read value
     $draw = $request->get('draw');
     $start = $request->get("start");
     $rowperpage = $request->get("length"); // Rows display per page

     $columnIndex_arr = $request->get('order');
     //echo '<pre>';print_r($columnIndex_arr);exit;
     //exit;
     $columnName_arr = $request->get('columns');

     $order_arr = $request->get('order');
     $search_arr = $request->get('search');

     $columnIndex = $columnIndex_arr[0]['column']; // Column index
     $columnName = $columnName_arr[$columnIndex]['data']; // Column name

     if($columnIndex_arr[0]['column'] == '0'){
        $columnName = 'product_id';
     }
     $columnSortOrder = $order_arr[0]['dir']; // asc or desc
     $searchValue = $search_arr['value']; // Search value

     // Total records
     $totalRecords = Product::select('count(*) as allcount')->count();
     $totalRecordswithFilter = Product::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

     // Fetch records
     $records = Product::orderBy($columnName,$columnSortOrder)
       ->where('products.name', 'like', '%' .$searchValue . '%')
       ->select('products.*')
       ->skip($start)
       ->take($rowperpage)
       ->get();
     $data_arr = array();    
     foreach($records as $record){
        $product_id = $record->product_id;
        $item_id = $record->item_id;
        $product_name = $record->name;
        $size = $record->size;
        $image = $record->image;
        $price = $record->price;
        $created_date = $record->created_date;
        $url = asset('image/'.$record->image);
        $noimage_url = asset('image/no_image.png');
        if(file_exists('image/'.$record->image)){
        $main_image = "<img id='original' src='$url' height='70' width='70' />";
        }else{
        $main_image = "<img id='original' src='$noimage_url' height='70' width='70' />";
        }
        //$editurl = {{url('product/edit')}}/{{$product->product_id}}";
        $detailurl = url('/product/productdetail/'.$product_id);
        $editurl = url('/product/edit/'.$product_id);
        $edit_html = "&nbsp;&nbsp;<a href='$editurl' class='btn btn-primary'>Edit</a>";
        $deleteurl =url('/product/destroy/'.$product_id);
        $delete_html = "<a href='$deleteurl' class='btn btn-danger'>Delete</a>";
        $detail_html_id = "<a href='$detailurl' >".$item_id."</a>";
        $detail_html_name = "<a href='$detailurl' >".$product_name."</a>";
        $data_arr[] = array(
          "product_id" => $detail_html_id,
          "product_name" => $detail_html_name,
          "size" => $size,
          "image" => $main_image,
          "price" => $price,
          "created_date" => $created_date,
          "action" =>  $edit_html.' '.$delete_html,
        );
        //echo '<pre>';print_r($data_arr);exit;
     }
     //echo '<pre>';print_r($data_arr);exit;
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr
     );
     echo json_encode($response);
     exit;
   }
	public function importproduct(Request $request){
    	$file_name = 'product.xml';
    	$xml_file_path = asset('xmlfiles/'.$file_name);
    	$xmfile = file_get_contents($xml_file_path);
        $object=  simplexml_load_string($xmfile);
        $product = json_decode(json_encode($object),true);
        $product = $product['product'];
        $size_array = ['Small','Medium','Large'];
        $gender_array = ['Men','Women'];
        $existing_size_array = $product['catalog_item'][0]['size'];
    	/* $main_product_array */
        $product_size = [];
        $main_product_size = [];
        $temp=0;
        $temp1 = 0;
        for($i=0;$i< count($product['catalog_item']);$i++){ //echo $i;echo '<br/>';
        	$gender = $product['catalog_item'][$i]['@attributes']['gender'];
            for($j=0;$j< count($product['catalog_item'][$i]['size']);$j++){ //echo $i;echo '<br/>';
                    $product_size[$temp]['size'] = $product['catalog_item'][$i]['size'][$j]['@attributes']['description'];
                    $product_size[$temp]['color'] = implode(',',$product['catalog_item'][$i]['size'][$j]['color']);
                if($product_size[$temp]['size'] == 'Large'){
                    if(!empty($product_size)){ //echo 'in111';exit;
                    	$main_product_size[$gender][$temp1] = $product_size;
                    	$product_size =[];	                    	
                	}
                    $temp1++; 
                 }
                 $temp++;
            }
    	}
        /* final product_array */
    	$final_array = [];
    	for($i=0;$i< count($product['catalog_item']);$i++){ //echo $i;echo '<br/>';
    		$item_array = $product['catalog_item'][$i]['item_number'];
        	$price_array = $product['catalog_item'][$i]['price'];
            $name = $product['@attributes']['description'];
    	    $description = $product['@attributes']['description'];
    	    $product_image = $product['@attributes']['product_image'];
            echo $gender = $product['catalog_item'][$i]['@attributes']['gender'];'<br/>';
            if($gender == "Women's"){
                foreach($main_product_size[$gender] as $key=>$val){
                    $new_main_product_size[$gender][$key] = array_values($val);
                }
                $main_product_size[$gender] = array_values($new_main_product_size[$gender]);
            }
            foreach($item_array as $item_key=>$item_val){
                $new_main_product_size = [];
            	if(!empty($main_product_size[$gender][$item_key])){
            	foreach($main_product_size[$gender][$item_key] as $subitem_key =>$subitem_val){           		
            		$final_array[$subitem_key]['item_id'] = $item_val;
                    $final_array[$subitem_key]['name'] = $description;
            		$final_array[$subitem_key]['price'] = $price_array[$item_key];
            		$final_array[$subitem_key]['description'] = $description;
            		$final_array[$subitem_key]['image'] = $product_image;
            		$final_array[$subitem_key]['gender'] = $gender;
            		$final_array[$subitem_key]['size'] = $subitem_val['size'];
            		$final_array[$subitem_key]['color'] = $subitem_val['color'];
                    $final_array[$subitem_key]['created_date'] = date('Y-m-d H:i:s');
            	}
              }
        	}
    	}
        $inserarray = array_reverse($final_array);
        $inserarray_data = [];
        $insertPflag =  true;
        foreach($inserarray as $insert_val){
            $insertPflag = $insertPflag && Product::insertdata($insert_val);
        }
        if($insertPflag){
            if($insertPflag == '2'){              
                return Redirect::to('products')       
                ->with('success','All product already imported successfully.');
            }else{               
                return Redirect::to('products')       
                ->with('success','All product imported successfully.');
            }
        }else{
            return Redirect::to('products')
            ->with('failed','Sorry ! Product not imported successfully.');
        }
    } 

    public function create()
    {     
        $data['color_array'] = array("Red","Green","Blue","Yellow");     
        $data['size_array'] = array("Small","Medium","Large","Extra Large");
        return view('product.create', $data);
    }
    public function store(Request $request)
    {
        ini_set('memory_limit', '5000M');
        $request->validate([
        'name' => 'required',
        'price' => 'required',
        'size' => 'required',
        'gender' => 'required',
        'image'  => 'required|image|mimes:jpg,png,gif|max:5120'
        ]);
        //echo '<pre>';print_r($request->file('image'));
        //echo '<pre>';print_r($request);exit;
        //echo '<pre>';print_r($request->file('image'));exit;
        if ($files = $request->file('image')) {
//echo  '<pre>';print_R($files);exit;
        $destinationPath = 'image/'; // upload path
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);
        $insert['image'] = "$profileImage";
        //echo url('image/'.$request->get('old_image'));exit;
        //unlink('image/'.$request->get('old_image'));
        }
       // $old_Productsdata['product_id']  = $product_id;
       // $old_Productsdata = Products::where('product_id',$product_id)->first();
        //echo '<pre>';print_r($request);exit;
        $insert['name'] = $request->get('name');
        $insert['price'] = $request->get('price');
        $insert['description'] = $request->get('description');
        $insert['size'] = $request->get('size');
        $colors=$request->get('color'); 
        $insert['color'] = implode(',',$colors);
        $gender = $request->get('gender');
        $insert['gender'] = $gender[0];
        $insert['created_date'] =date('Y-m-d H:i:s');
        //echo '<pre>';print_r($insert);exit;
        $item_id = $this->generateRandomString(3).$this->generateRandomNumber(4);
        $insert['item_id'] = $item_id;
        //echo '<pre>';print_r($insert);exit;
        $insertflag = Product::insert($insert);
        if($insertflag){
            return Redirect::to('products')->with('success','Product inserted successfully');
        }else{
            return Redirect::to('products')->with('failed','Sorry! Product not inserted.');
        }
    }
    public function edit($id)
    {   
        $where = array('product_id' => $id);
        $data['product_info'] = Product::where($where)->first();
        $data['size_array'] = array("Small","Medium","Large","Extra Large");
        return view('product.edit', $data);
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $product_id)
    {
        ini_set('memory_limit', '5000M');
        $request->validate([
        'name' => 'required',
        'price' => 'required',
        'size' => 'required',
        'gender' => 'required',
        'image'  => 'image|mimes:jpg,png,gif|max:5120'
        ]);
        //echo '<pre>';print_r($request->file('image'));
        //echo '<pre>';print_r($request);exit;
        //echo '<pre>';print_r($request->file('image'));exit;
        if ($files = $request->file('image')) {
//echo  '<pre>';print_R($files);exit;
        $destinationPath = 'image/'; // upload path
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);
        $update['image'] = "$profileImage";
        //echo url('image/'.$request->get('old_image'));exit;
        //unlink('image/'.$request->get('old_image'));
        }else{
            $insert['image'] = $request->get('old_image');    
        }
       // $old_Productsdata['product_id']  = $product_id;
       // $old_Productsdata = Products::where('product_id',$product_id)->first();
        $update['name'] = $request->get('name');
        $update['price'] = $request->get('price');
        $update['description'] = $request->get('description');
        $update['size'] = $request->get('size');
        $gender = $request->get('gender');
        $update['gender'] = $gender[0];
        $update['modify_date'] =date('Y-m-d H:i:s');
       //echo '<pre>';print_r($update);exit;
        $item_id = $request->get('item_id');
        $size = $update['size'];
        //$color = $update['color'];
        //$gender = $update['gender'];
        $where = array('item_id' => $item_id,'size'=>$size,'gender'=>$gender);
        $already_exist_product = Product::where($where)->first();
        $updateflag = Product::updaterecords($update,$product_id);
        if($updateflag){
            return Redirect::to('products')->with('success','Great! Product updated successfully');
        }else{
            return Redirect::to('products')->with('failed','Sorry! Product not updated.');
        }
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function destroy($product_id){
      //  $Products = Products::find($product_id);
       // $Products->delete();
        Product::where('product_id',$product_id)->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');              
    }

    public function productdetail($id)
    {   
        $where = array('product_id' => $id);
        $data['product_info'] = Product::where($where)->first();
        $data['size_array'] = array("Small","Medium","Large","Extra Large");
        return view('product.view', $data);
    }
    public function generateRandomString($length = 25) {
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
    public function generateRandomNumber($length = 25) {
      $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

}
