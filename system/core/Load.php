<?php
class Load{

	public function library($library){
		require_once"app/library/".$library.".php";
		return new $library();
	}

	public function model($model, $alias = null){
		require_once"app/model/".ucfirst($model).".php";
		$alias = is_null($alias) ? $model : $alias;
		return $this->alias = new $model();
	}

	public function view($view, $data = false){
		if($data == true){
			extract($data);
		}
		require_once"app/view/".$view.".php";
		
	}

	public function lib($lib){
		require_once"app/library/".ucfirst($lib).".php";
		return new $lib();
	}
	
}
?>
