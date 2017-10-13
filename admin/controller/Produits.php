<?php

		require(ROOT."model/produits/ProduitsModel.php");
	class Produits extends GenericController
	{
		public function liste ()
		{
			$model=new ProduitsModel();
			$data=array();
			$data["list"]=$model->get();
			$this->prepareData($data);
			//$this->layout=false;
			$this->viewRender("liste");
		}

	

?>

