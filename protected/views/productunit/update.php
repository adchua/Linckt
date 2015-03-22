<?php
/* @var $this ProductunitController */
/* @var $model Productunit */

$this->breadcrumbs=array(
	'Productunits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	 array('label'=>'Skip', 'url'=>array('products/index')),
);
?>

<h1>Update Productunit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>