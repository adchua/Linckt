<?php
/* @var $this DeliveryTransactionController */
/* @var $model DeliveryTransaction */

$this->breadcrumbs=array(
	'Delivery Transactions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Delivery Transaction', 'url'=>array('index')),
	array('label'=>'Manage Delivery Transaction', 'url'=>array('admin')),
);
?>

<h1>Create Delivery Transaction</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>