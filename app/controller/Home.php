<?php
defined('BASEPATH') or exit('Direct access not allowed');

	class Home extends Mcontroller
	{
		public function __construct(){
			parent::__construct();
			$this->input = $this->load->lib('validation');
			$this->home = $this->load->model('home_model', 'home');
		}

		public function index(){
			echo "<h1><center>Welcome to Minimal-MVC</center></h1>";
		}

		public function transaction(){
			$fetch = $this->home->fetch();
			echo "<pre>";
			var_dump($fetch);
			exit();
		}
}
?>
