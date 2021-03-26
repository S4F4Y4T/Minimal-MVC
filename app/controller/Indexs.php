<?php
	class Indexs extends Mcontroller{
		public function __construct(){
		    error_reporting(0);
		    Session::init();
			parent::__construct();
		}
		public function Index(){
			$this->home();
		}
		
		
	

	public function home(){
		
		    
		$pcount = array(
          'table'			 => array('table' => 'product'),
          'pkey'			 => array('pkeys' => 'id'),
          'selectcond' => array('count' => 'COUNT(*)'),
          //'orderby'	   => array('order' => 'DESC'),
          //'limit' 	 => array('start' => 5 ,'limit' => 7),
          'wherecond'=> array('where' =>array('type' => 2))
        );
        $fcount = array(
          'table'			 => array('table' => 'product'),
          'pkey'			 => array('pkeys' => 'id'),
          'selectcond' => array('count' => 'COUNT(*)'),
          //'orderby'	   => array('order' => 'DESC'),
          //'limit' 	 => array('start' => 5 ,'limit' => 7),
          'wherecond'=> array('where' =>array('type' => 1))
        );
        $acount = array(
                	    'TableMain'		 => array('TableMain' => 'product'),
                		'Tablea'			   => array('Tablea'    => 'brand'),
                		//'Tableb'			 => array('Tableb'    => 'brand'),
                		//'Tablec'			 => array('Tablec'    => 'subcat'),
                
                		'Mainconda'			   => array('Mainconda' => 'brand'),
                		//'Maincondb'			 => array('Maincondb' => 'brand'),
                		//'Maincondc'			 => array('Maincondc' => 'subcategory'),
                
                		'Conda'			   => array('Conda' => 'brandid'),
                		//'Condb'			 => array('Condb' => 'brandid'),
                		//'Condc'			 => array('Condc' => 'subid'),
                
                		'selectcond' => array('count' => 'COUNT(*)'),
                		//'orderby'	  => array('id'  => 'ASC'),
                		//'pkey'       => array('pkey'   => 'brandid'),
                		//'limit' 	  => array('start'  => $astart,'limit' => $alast),
                		//'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
                	);
                	
		    $Model   	  	    = $this->load->model("Madmin");
		    $data["acount"] = $Model->join($acount);
		    $alast = $data['acount'][0][0];
		    $plimit = $plast-4;
		    $alimit = $alast-3;
		    
		    
		    if($alimit <= 0){
		        $astart = 0;
		    }else{
		        $astart = $alast-4;
		    }
		    $top = array(
                		'TableMain'		 => array('TableMain' => 'brand'),
                		'Tablea'			   => array('Tablea'    => 'product'),
                		//'Tableb'			 => array('Tableb'    => 'brand'),
                		//'Tablec'			 => array('Tablec'    => 'subcat'),
                
                		'Mainconda'			   => array('Mainconda' => 'brandid'),
                		//'Maincondb'			 => array('Maincondb' => 'brand'),
                		//'Maincondc'			 => array('Maincondc' => 'subcategory'),
                
                		'Conda'			   => array('Conda' => 'brand'),
                		//'Condb'			 => array('Condb' => 'brandid'),
                		//'Condc'			 => array('Condc' => 'subid'),
                
                		'selectcond' => array('select' => '*'),
                		'orderby'	  => array('id'  => 'DESC'),
                		'pkey'       => array('pkey'   => 'brandid'),
                		'limit' 	  => array('start'  => $astart,'limit' => $alast),
                		//'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
                	);
		    $data = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => 0 ,'limit' => 5),
                    		'wherecond'=> array('where' =>array('type' => 2))
                    	);
            
            $feature = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => 0,'limit' => 5),
                    		'wherecond'=> array('where' =>array('type' => 1))
                    	);
            $brand = array(
                    		'table'			 => array('table' => 'brand'),
                    		//'pkey'			 => array('pkey' => 'brandid'),
                    		'selectcond' => array('select' => '*'),
                    		//'orderby'	   => array('order' => 'DESC'),
                    		//'limit' 	 => array('start' => $pstart ,'limit' => $plast),
                    		//'wherecond'=> array('where' =>array('type' => 2))
                    	);
	
			$data["newpro"] = $Model->fetchdata($data);
			$data["topbrand"] = $Model->join($top);
			$data["feature"] = $Model->fetchdata($feature);
			$data["slide"] = $Model->fetchdata($brand);
			$data["pcount"] = $Model->fetchdata($pcount);
			$data["fcount"] = $Model->fetchdata($fcount);
	
	
	        $this->load->view("inc/slide",$data);
			$this->load->view("index",$data);
			$this->load->view("inc/footer");
		}
		
		
		
		
}
?>
