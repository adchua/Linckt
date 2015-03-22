<?php
/* @var $this ProductunitController */
/* @var $model Productunit */

$this->breadcrumbs=array(
	'Productunits'=>array('index'),
	'Create',
);

$this->menu=array(
	 array('label'=>'Skip', 'url'=>array('products/index')),
);
?>

<h1>Create Productunit</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>