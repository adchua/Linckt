<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	
);
?>

<h1>Create Products</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>