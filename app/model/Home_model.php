<?php
class Home_model extends Mmodel{

    public function __construct(){
        parent::__construct();
    }

    //Fetch Data Dynamicly
    public function fetch(){
        return $this->db->fetchdata();
    }
}
?>
