<?php
/* @var $this ProductunitController */
/* @var $model Productunit */

$this->breadcrumbs=array(
	'Productunits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Productunit', 'url'=>array('index')),
	array('label'=>'Create Productunit', 'url'=>array('create')),
	array('label'=>'Update Productunit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Productunit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Productunit', 'url'=>array('admin')),
);
?>

<h1>View Productunit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'productunit',
		'productunitprice',
		'pcode',
	),
)); ?>

