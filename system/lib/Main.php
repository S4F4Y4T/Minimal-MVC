<?php
class Main{
	public $url;
	public $Controller = "Default_controller";
	public $Path       = "app/controller/";
	public $Method      = "index";
	public $ctlr;
	public $param;

	public function __construct(){
		$this->getUrl();
		$this->loadCtlr();
		$this->loadMethod();
	}

	public function getUrl(){
		$this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
		if($this->url != NULL){
            $this->url = rtrim($this->url, "/");
			$this->url = explode('/' , $this->url);
		}else{
			unset($this->url);
		}
	}
    
	public function loadCtlr(){
		if(!isset($this->url[0])){
			require $test = $this->Path.$this->Controller.".php";
			$this->ctlr = new $this->Controller();
		}else{
			$this->Controller = ucfirst($this->url[0]);
			$fileName = $this->Path.$this->Controller.".php";
			if(file_exists($fileName)){
				require $fileName;
				if(class_exists($this->Controller)){
					$this->ctlr = new $this->Controller();
				}else{
					echo "<h1><center>An error occurred: Class does not exist</center></h1>";
					exit();
				}
			}else{
				echo "<h1><center>An error occurred: Controller not found</center></h1>";
				exit();
			}
		}
	}

	public function loadMethod(){

		if(is_array($this->url) && count($this->url) > 2){

			$url = array_splice($this->url, 0, 2);
			$this->Method = $url[1];

			if(method_exists($this->ctlr, $this->Method)){
				$this->ctlr->{$this->Method}(...$this->url);
			}else{
				echo "<h1><center>An error occurred: Method not found</center></h1>";
				exit();
			}

		}else if(isset($this->url[1])){

			$this->Method = $this->url[1];
			if(method_exists($this->ctlr, $this->Method)){
				$this->ctlr->{$this->Method}();
			}else{
				echo "<h1><center>An error occurred: Method not found</center></h1>";
				exit();
			}

		}else{
			if(method_exists($this->ctlr, $this->Method)){
				$this->ctlr->{$this->Method}();
			}else{
				echo "<h1><center>An error occurred: Method not found</center></h1>";
				exit();
			}
		}

	}

}

?>
