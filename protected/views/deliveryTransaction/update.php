<?php
/* @var $this DeliveryTransactionController */
/* @var $model DeliveryTransaction */

$this->breadcrumbs=array(
	'Delivery Transactions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DeliveryTransaction', 'url'=>array('index')),
	array('label'=>'Create DeliveryTransaction', 'url'=>array('create')),
	array('label'=>'View DeliveryTransaction', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DeliveryTransaction', 'url'=>array('admin')),
);
?>

<h1>Update DeliveryTransaction <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>