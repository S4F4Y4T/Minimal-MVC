Fetch and JOIN Fetch Controller
<?php
	class Indexs extends Mcontroller{
		public function __construct(){
		    //error_reporting(0);
		    Session::init();
			parent::__construct();
		}
		public function Index(){
			$this->FetchQuery();
		}
		
		
	

	// public function FetchQuery(){
	// 	$Model = $this->load->model('Madmin');
		
	// 	$data = array(
	// 		'table'			 => array('table' => 'product'),
	// 		//'pkey'			 => array('pkey' => 'catid'),
	// 		'selectcond' => array('select' => '*'),
	// 		//'orderby'	   => array('order' => 'DESC'),
	// 		//'limit' 	 => array('start' => 2,'limit' => 3),
	// 		'search'    => array('name' => $q),
	// 		'wherecond'=> array('where' =>array('name' => $q,'productDetails' => $q))
	// 	);
		
	
	// 	$data['product'] = $Model->fetchdata($data);
		
	// 	$this->load->view('inc/header');
	// 	$this->load->view("index",$data);
	// 	$this->load->view("inc/footer");
	// }

	// public function JoinQuery(){
	// 	$Model   	  	   = $this->load->model("Madmin");
	// 	$data = array(
	// 		'TableMain'		 => array('TableMain' => 'product'),
	// 		'Tablea'		 => array('Tablea'    => 'category'),
	// 		'Tableb'		 => array('Tableb'    => 'brand'),
	// 		'Tablec'		 => array('Tablec'    => 'subcat'),

	// 		'Mainconda'		 => array('Mainconda' => 'category'),
	// 		'Maincondb'		 => array('Maincondb' => 'brand'),
	// 		'Maincondc'		 => array('Maincondc' => 'subcategory'),

	// 		'Conda'			 => array('Conda' => 'catid'),
	// 		'Condb'			 => array('Condb' => 'brandid'),
	// 		'Condc'			 => array('Condc' => 'subid'),

	// 		'selectcond' => array('select' => '*'),
	// 		//'orderby'	  => array('order'  => 'DESC'),
	// 		'pkey'       => array('pkey'   => 'id'),
	// 		//'limit' 	  => array('start'  => 0,'limit' => 2),
	// 		'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
	// 	);

	//  	$data["details"]  = $Model->join($data);

	// 	 $this->load->view('index', $data);
	// }
		
	// public function MultipleDelete(){
	// 	$chk 	  = $_REQUEST['chk']; //select from html
	// 	$id 	  = implode(',',$chk);
	// 	$table  = "mail";
	// 	$pkey   = "id";

	// 	$Model  = $this->load->model("Madmin");
	// 	$delete = $Model->multidelete($id,$table,$pkey);

	// 	if($delete){
	// 		header("Location: ".BASE."/Mail/fetch");
	// 	}
	// }	
		
		
}
?>
