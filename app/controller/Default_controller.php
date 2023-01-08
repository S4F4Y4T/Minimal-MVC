<?php
	class Default_controller extends Mcontroller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
            $this->load->view("index");
		}
		
}
?>
