<!-- Full CRUD Controller -->
<?php
class Product extends Mcontroller{

	public function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->productlist();
	}


	// public function productlist(){
	//  $data = array(
	// 	'TableMain'		 => array('TableMain' => 'product'),
	// 	'Tablea'			   => array('Tablea'    => 'category'),
	// 	//'Tableb'			 => array('Tableb'    => 'brand'),
	// 	'Tablec'			 => array('Tablec'    => 'subcat'),

	// 	'Mainconda'			   => array('Mainconda' => 'category'),
	// 	//'Maincondb'			 => array('Maincondb' => 'brand'),
	// 	'Maincondc'			 => array('Maincondc' => 'subcategory'),

	// 	'Conda'			   => array('Conda' => 'catid'),
	// 	//'Condb'			 => array('Condb' => 'brandid'),
	// 	'Condc'			 => array('Condc' => 'subid'),

	// 	'selectcond' => array('select' => '*'),
	// 	'orderby'	  => array('order'  => 'DESC'),
	// 	'pkey'       => array('pkey'   => 'id'),
	// 	//'limit' 	  => array('start'  => 0,'limit' => 2),
	// 	//'wherecond'=> array('where'  =>array('subid' => '1'))
	// );

	//  $Model   	  	   = $this->load->model("Madmin");
	//  $data["product"]  = $Model->join($data);

	// 	$this->header();
	// 	$this->load->view("admin/productlist",$data);
	// 	$this->footer();
	// }

	// public function insertproduct(){
	// 	if(!($_POST)){
	// 		header("Location:".BASE."/Product/addproduct");
	// 	}else{
	// 		$filetmp1		= $_FILES["img1"]["tmp_name"];
	// 		$filename1   = $_FILES["img1"]["name"];


	// 		$div1	  = explode('.',$filename1);

	// 		$file_ext1 = strtolower(end($div1));

	// 		$uniq1 	  = substr(md5(time()), 0 , 10).'.'.$file_ext1;



	// 		$upload1   = imglocation.$uniq1;


	// 	$input = $this->load->valid("Validation");

	// 	$input->validext($file_ext1);

	// 	$input->post("name")
	// 				->schar()
	// 				->isempty()
	// 				->lengh();
	// 	$input->post("cat")
	// 		  ->isempty();
	// 	$input->post("subcat")
	// 		  ->isempty();
	// 	$input->post("brand")
	// 		  ->isempty();
	// 	$input->post("details")
	// 		  ->isempty();
	// 	$input->post("preprice")
	// 		  ->isempty();
	// 	$input->post("currentprice")
	// 				->isempty();
	// 	$input->post("availability")
	// 		  ->isempty();
	// 	$input->post("type")
	// 		  ->isempty();
	// 	$input->post("shipcharge")
	// 		  ->isempty();
	// 	$input->files("img1");

	// 	$mdata = array();
	// 	$table = "product";

	// 	if($input->submit()){

	// 		$name     = $input->value["name"];
	// 		$cat      = $input->value["cat"];
	// 		$sub      = $input->value["subcat"];
	// 		$brand    = $input->value["brand"];
	// 		$preprice    = $input->value["preprice"];
	// 		$currentprice    = $input->value["currentprice"];
	// 		$availability    = $input->value["availability"];
	// 		$type    = $input->value["type"];
	// 		$shipcharge    = $input->value["shipcharge"];
	// 		$details  = $input->value["details"];

	// 		move_uploaded_file($filetmp1,$upload1);

	// 		date_default_timezone_set('Asia/Dhaka');
	// 		$date = date('Y-m-d h:i:s', time());

	// 		$data = array(
	// 			'name'     => $name,
	// 			'category' => $cat,
	// 			'subcategory' => $sub,
	// 			'brand'    => $brand,
	// 			'price'    => $currentprice,
	// 			'priceBeforeDiscount'    => $preprice,
	// 			'availability'    => $availability,
	// 			'type'            => $type,
	// 			'shippingCharge'    => $shipcharge,
	// 			'productDetails'  => $details,
	// 			'image1'	   => $uniq1,
	// 			'image2'	   => $uniq2,
	// 			'image3'	   => $uniq3,
	// 			'creationDate' => $date,
	// 			'updationDate' => ""
	// 		);
	// 		$table ="product";
	// 		$Model = $this->load->model('Madmin');
	// 		$addproduct = $Model->insertdata($data,$table);

	// 		if($addproduct == '1'){
	// 			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Added Successfully</div>';
	// 		}else{
	// 			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
	// 		}
	// 		header("Location:".BASE."/Product/productlist?msg=".urlencode(serialize($mdata)));
	// 	}else{
	// 		$mdata['msg'] = $input->error;
	// 		foreach($mdata as $key => $val){
	// 		    foreach($val as $value){
	// 		        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
	// 			    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
	// 		    }
	// 		}
	// 	}
	// 	}
	// }

	// public function updateproduct($id){
	// 	if(!($_POST)){
	// 		header("Location: ".BASE."/Product/productlist");
	// 	}else{

	// 		$input = $this->load->valid("Validation");

	// 		$input->post("name")
	// 					->schar()
	// 					->isempty()
	// 					->lengh();

	// 		$input->post("cat")
	// 			  	->isempty();
	// 		$input->post("subcat")
	// 			  	->isempty();
	// 		$input->post("brand")
	// 			  	->isempty();
	// 		$input->post("details")
	// 					->isempty()
	// 					->lengh();
	// 		$input->post("preprice")
	// 			  	->isempty();
	// 	    $input->post("type")
	// 		      ->isempty();
	// 		$input->post("currentprice")
	// 					->isempty();
	// 		$input->post("availability")
	// 			  	->isempty();
	// 		$input->post("shipcharge")
	// 			  	->isempty();

	// 		$mdata = array();
	// 		$table = "product";
	// 		$pkey = "id";

	// 		if($input->submit()){

	// 			$name     		= $input->value["name"];
	// 			$cat      		= $input->value["cat"];
	// 			$sub      		= $input->value["subcat"];
	// 			$brand    		= $input->value["brand"];
	// 			$preprice   	= $input->value["preprice"];
	// 			$type           = $input->value["type"];
	// 			$currentprice = $input->value["currentprice"];
	// 			$availability = $input->value["availability"];
	// 			$shipcharge   = $input->value["shipcharge"];
	// 			$details  		= $input->value["details"];

	// 			date_default_timezone_set('Asia/Dhaka');
	// 			$date = date('Y-m-d h:i:s', time());

	// 			$data = array(
	// 				'name'     => $name,
	// 				'category' => $cat,
	// 				'subcategory' => $sub,
	// 				'brand'    => $brand,
	// 				'type'      => $type,
	// 				'price'    => $currentprice,
	// 				'priceBeforeDiscount'    => $preprice,
	// 				'availability'    => $availability,
	// 				'shippingCharge'    => $shipcharge,
	// 				'productDetails'  => $details,
	// 				'updationDate' => $date
	// 			);

	// 			$Model = $this->load->model('Madmin');
	// 			$updateprouct = $Model->updatedata($table,$data,$pkey,base64_decode($id));

	// 			if($updateprouct == '1'){
	// 				$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Updated Successfully</div>';
	// 			}else{
	// 				$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
	// 			}
	// 			header("Location:".BASE."/Product/productlist?msg=".urlencode(serialize($mdata)));
	// 		}else{
	// 			$mdata['msg'] = $input->error;
    // 			foreach($mdata as $key => $val){
    // 			    foreach($val as $value){
    // 			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
    // 				    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
    // 			    }
    // 			}
	// 		}
	// 	 }
	//  }
	 

	// public function deleteproduct($id = NULL){
	// 	unlink(imglocation.$img1);
		
    // 	$data = array(
	// 		'table'			 => array('table' => 'product'),
	// 		//'choice'		 => array('single' => 'catid'),
	// 		//'choice'		 => array('id' => '1','id' =>'2'),
	// 		'wherecond'  => array('where' =>array('id' => base64_decode($id)))
	// 	);
		
	// 	$delete = $Model->delete($data);
		
	// 	if($delete == '1'){
	// 		$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Deleted Successfully</div>';
	// 	}else{
	// 		$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
	// 	}
	// 	header("Location:".BASE."/Product/productlist?msg=".urlencode(serialize($mdata)));
	// }
}
?>