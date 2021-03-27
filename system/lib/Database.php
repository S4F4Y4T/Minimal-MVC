<?php
class Database extends PDO{
	public function __construct($dsn, $user, $pass){

		parent::__construct($dsn, $user, $pass);

	}
/* join 4 tables */

/*
	$data = array(
		'TableMain'		 => array('TableMain' => 'product'),
		'Tablea'			   => array('Tablea'    => 'category'),
		'Tableb'			 => array('Tableb'    => 'brand'),
		'Tablec'			 => array('Tablec'    => 'subcat'),

		'Mainconda'			   => array('Mainconda' => 'category'),
		'Maincondb'			 => array('Maincondb' => 'brand'),
		'Maincondc'			 => array('Maincondc' => 'subcategory'),

		'Conda'			   => array('Conda' => 'catid'),
		'Condb'			 => array('Condb' => 'brandid'),
		'Condc'			 => array('Condc' => 'subid'),

		'selectcond' => array('select' => '*'),
		//'orderby'	  => array('order'  => 'DESC'),
		'pkey'       => array('pkey'   => 'id'),
		//'limit' 	  => array('start'  => 0,'limit' => 2),
		'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
	);

	 $data["data"]  = $Model->join($data);
*/
public function join($data){
	$sql = "SELECT ";
	
	if(array_key_exists('selectcond',$data)){
				foreach($data['selectcond'] as $key => $value){
					switch ($key) {
						case 'select':
							foreach($data['TableMain'] as $key => $value){
                        		$sql .= $value.'.*,';
                        	}
                        	foreach($data['Tablea'] as $key => $value){
                        		$sql .= $value.'.*';
                        	}
                        	if(array_key_exists('Tableb',$data)){
                        		foreach($data['Tableb'] as $key => $value){
                        			$sql .= ",".$value.".*";
                        		}
                        	}
                        	if(array_key_exists('Tablec',$data)){
                        		foreach($data['Tablec'] as $key => $value){
                        			$sql .= ",".$value.".*";
                        		}
                        	}
							break;

						case 'count':
							$sql .= $value;
							break;
					}
				}
		}
		
	
	$sql .= ' FROM ';

	foreach($data['TableMain'] as $key => $value){
		$sql .= $value;
	}

	$sql .= ' JOIN ';

	foreach($data['Tablea'] as $key => $value){
		$sql .= $value;
	}

	$sql .= ' ON ';

	foreach($data['TableMain'] as $key => $value){
		$sql .= $value;
	}
  foreach($data['Mainconda'] as $key => $value){
		$sql .= '.'.$value;
	}
	$sql .= ' = ';

	foreach($data['Tablea'] as $key => $value){
		$sql .= $value.'.';
	}
	foreach($data['Conda'] as $key => $value){
		$sql .= $value;
	}

	if(array_key_exists('Tableb',$data)){
		$sql .= ' JOIN ';
		foreach($data['Tableb'] as $key => $value){
			$sql .= $value;
		}
		$sql .= ' ON ';
		foreach($data['TableMain'] as $key => $value){
			$sql .= $value.'.';
		}
		foreach($data['Maincondb'] as $key => $value){
			$sql .= $value;
		}

		$sql .= ' = ';
		foreach($data['Tableb'] as $key => $value){
			$sql .= $value.'.';
		}
		foreach($data['Condb'] as $key => $value){
			$sql .= $value;
		}
	}

	if(array_key_exists('Tablec',$data)){
		$sql .= ' JOIN ';
		foreach($data['Tablec'] as $key => $value){
			$sql .= $value;
		}
		$sql .= ' ON ';
		foreach($data['TableMain'] as $key => $value){
			$sql .= $value.'.';
		}
		foreach($data['Maincondc'] as $key => $value){
			$sql .= $value;
		}
		$sql .= ' = ';
		foreach($data['Tablec'] as $key => $value){
			$sql .= $value.'.';
		}
		foreach($data['Condc'] as $key => $value){
			$sql .= $value;
		}
	}

	if(array_key_exists('search',$data)){
            if(array_key_exists('wherecond',$data)){
    			foreach($data['wherecond'] as $key => $val){
    					$sql .= ' WHERE ';
    					$i = 0;
    					foreach($val as $keys => $value){
    					$add = ($i > 0)?' OR ':'';
    					$sql .= "$add"."$keys LIKE '%$value%'";
    					$i++;
    					}
    			}
    		}
        }else{
    		if(array_key_exists('wherecond',$data)){
    			foreach($data['wherecond'] as $key => $val){
    					$sql .= ' WHERE ';
    					$i = 0;
    					foreach($val as $keys => $value){
    					$add = ($i > 0)?' AND ':'';
    					$sql .= "$add"."$keys=:$keys";
    					$i++;
    					}
    			}
    		}
        }

		if(array_key_exists('orderby',$data)){
			$sql .= " ORDER BY ";

			if(array_key_exists('pkey',$data)){
				foreach($data['pkey'] as $key => $value){
					$sql .= $value.' ';
				}
			}

			foreach($data['orderby'] as $key => $val){
				$sql .= $val;
			}
		}

		if(array_key_exists('limit',$data)){
			$sql .= ' LIMIT ';
			$i = 0;
			foreach($data['limit'] as $key => $value){
				$add = ($i > 0)?',':'';
				$sql .= $add.$value;
				$i++;
			}
		}

		$sttmt = $sql;
		$query = $this->prepare($sttmt);
        
        if(array_key_exists('search',$data)){
            NULL;
        }else{
    		if(array_key_exists('wherecond',$data)){
    			foreach($data['wherecond'] as $key => $val){
    				if($key == 'where'){
    					foreach($val as $keys => $value){
    						$query->bindValue(":$keys",$value);
    					}
    				}
    			}
    		}
        }

		$query->execute();
		$result = $query->fetchAll();
		return $result;
}

	//Fetch All Data

	/*
		$data = array(
        		'table'			 => array('table' => 'product'),
        		//'pkey'			 => array('pkey' => 'catid'),
        		'selectcond' => array('select' => '*'),
        		//'orderby'	   => array('order' => 'DESC'),
        		//'limit' 	 => array('start' => 2,'limit' => 3),
        		'search'    => array('name' => $q),
        		'wherecond'=> array('where' =>array('name' => $q,'productDetails' => $q))
        	);
        	
			$Model = $this->load->model('Madmin');
			$data['product'] = $Model->fetchdata($data);

	*/
	public function fetchdata($data = array()){
		$sql  = 'SELECT ';

		if(array_key_exists('selectcond',$data)){
				foreach($data['selectcond'] as $key => $value){
					switch ($key) {
						case 'select':
							$sql .= $value;
							break;

						case 'count':
							$sql .= $value;
							break;
					}
				}
		}

		$sql .= ' FROM ';

		if(array_key_exists('table',$data)){
			foreach($data['table'] as $key => $value){
				$sql .= $value.' ';
			}
		}
        
        if(array_key_exists('search',$data)){
            if(array_key_exists('wherecond',$data)){
    			foreach($data['wherecond'] as $key => $val){
    					$sql .= ' WHERE ';
    					$i = 0;
    					foreach($val as $keys => $value){
    					$add = ($i > 0)?' OR ':'';
    					$sql .= "$add"."$keys LIKE '%$value%'";
    					$i++;
    					}
    			}
    		}
        }else{
    		if(array_key_exists('wherecond',$data)){
    			foreach($data['wherecond'] as $key => $val){
    					$sql .= ' WHERE ';
    					$i = 0;
    					foreach($val as $keys => $value){
    					$add = ($i > 0)?' AND ':'';
    					$sql .= "$add"."$keys=:$keys";
    					$i++;
    					}
    			}
    		}
        }

		if(array_key_exists('orderby',$data)){
			$sql .= " ORDER BY ";

			if(array_key_exists('pkey',$data)){
				foreach($data['pkey'] as $key => $value){
					$sql .= $value.' ';
				}
			}

			foreach($data['orderby'] as $key => $val){
				$sql .= $val;
			}
		}

		if(array_key_exists('limit',$data)){
			$sql .= ' LIMIT ';
			$i = 0;
			foreach($data['limit'] as $key => $value){
				$add = ($i > 0)?',':'';
				$sql .= $add.$value;
				$i++;
			}
		}

		$sttmt = $sql;
		$query = $this->prepare($sttmt);
        
        if(array_key_exists('search',$data)){
            NULL;
        }else{
    		if(array_key_exists('wherecond',$data)){
    			foreach($data['wherecond'] as $key => $val){
    				if($key == 'where'){
    					foreach($val as $keys => $value){
    						$query->bindValue(":$keys","$value");
    					}
    				}
    			}
    		}
        }

		$query->execute();
		$result = $query->fetchAll();
		return $result;

	}
	//Fetch All Data

	//Insert Data Into Database

	/* $data = array(
		'name'     => $name
	);
	$table ="table";
	DB::insertdata($data,$table); */

	public function insertdata($data,$table){
		$keys   = implode(",",array_keys($data));
		$values = ":".implode(", :",array_keys($data));

		$sql   = "INSERT INTO $table($keys) VALUES($values)";
		$query = $this->prepare($sql);

		foreach($data as $key => $val){
			$query->bindValue(":$key",$val);
		}
		return $result = $query->execute();
	}
	//Insert Data Into Database

	//Update Data Into Database

	/*
	$requr = array(
		'table'			 => array('table' => 'login'),
		//'wherecond'=> array('where' =>array('catid' => 156))
	);
	$data = array(
		'data' => $data
	);
	update($data,$requr);
	*/

	public function update($table,$data,$pkey,$id){
		$upkey = NULL;

		foreach($data as $key => $val){
			$upkey .= "$key=:$key,";
		}
		$upkey = rtrim($upkey,",");

		$sql = "UPDATE $table SET $upkey WHERE $pkey=:$pkey";
		$stmt = $this->prepare($sql);

		foreach($data as $key => $val){
			$stmt->bindValue(":$key",$val);
		}

		$stmt->bindValue(":$pkey","$id");
		return $result = $stmt->execute();
	}
	//Update Data Into Database


	

	//Delete Data From Database

	/* $data = array(
    	'table'			 => array('table' => 'product'),
		'wherecond'  => array('where' =>array('id' => base64_decode($id)))
	); */

	public function delete($data){
		$sql = "DELETE FROM ";
		
		if(array_key_exists('table',$data)){
			foreach($data['table'] as $key => $value){
				$sql .= $value.' ';
			}
		}
		
		if(array_key_exists('wherecond',$data)){
			foreach($data['wherecond'] as $key => $val){
					$sql .= ' WHERE ';
					$i = 0;
					foreach($val as $keys => $value){
					$add = ($i > 0)?' AND ':'';
					$sql .= "$add"."$keys=:$keys";
					$i++;
					}
			}
		}
		
		$stmt = $this->prepare($sql);
		
		if(array_key_exists('wherecond',$data)){
			foreach($data['wherecond'] as $key => $val){
				if($key == 'where'){
					foreach($val as $keys => $value){
						$stmt->bindValue(":$keys","$value");
					}
				}
			}
		}
		
		return $result = $stmt->execute();
	}
	//Delete Data From Database

    


	//Delete Data From Database
	public function multidelete($id,$table,$pkey){
		$sql = "DELETE FROM $table WHERE $pkey in ($id)";
		$stmt = $this->prepare($sql);
		return $result = $stmt->execute();
	}
	//Delete Data From Database

	public function subcat($data = array()){
	$sql  = 'SELECT ';

		if(array_key_exists('selectcond',$data)){
				foreach($data['selectcond'] as $key => $value){
					switch ($key) {
						case 'select':
							$sql .= $value;
							break;

						case 'count':
							$sql .= $value;
							break;
					}
				}
		}

		$sql .= ' FROM ';

		if(array_key_exists('table',$data)){
			foreach($data['table'] as $key => $value){
				$sql .= $value.' ';
			}
		}

		if(array_key_exists('wherecond',$data)){
			foreach($data['wherecond'] as $key => $val){
					$sql .= ' WHERE ';
					$i = 0;
					foreach($val as $keys => $value){
					$add = ($i > 0)?' AND ':'';
					$sql .= "$add"."$keys=:$keys";
					$i++;
					}
			}
		}

		if(array_key_exists('orderby',$data)){
			$sql .= " ORDER BY ";

			if(array_key_exists('pkey',$data)){
				foreach($data['pkey'] as $key => $value){
					$sql .= $value.' ';
				}
			}

			foreach($data['orderby'] as $key => $val){
				$sql .= $val;
			}
		}

		if(array_key_exists('limit',$data)){
			$sql .= ' LIMIT ';
			$i = 0;
			foreach($data['limit'] as $key => $value){
				$add = ($i > 0)?',':'';
				$sql .= $add.$value;
				$i++;
			}
		}

		$sttmt = $sql;
		$query = $this->prepare($sttmt);

		if(array_key_exists('wherecond',$data)){
			foreach($data['wherecond'] as $key => $val){
				if($key == 'where'){
					foreach($val as $keys => $value){
						$query->bindValue(":$keys",$value);
					}
				}
			}
		}

		$query->execute();
		$result = $query->fetchAll();

		return $result;

	}

}
?>
