<?php
/* @var $this LincktProductsController */
/* @var $model LincktProducts */


$this->menu=array(
	array('label'=>'List Linckt Products', 'url'=>array('index')),
);
?>

<h1>Create Linckt Products</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>