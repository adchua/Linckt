<?php
/* @var $this PaymentReceiptController */
/* @var $model PaymentReceipt */

$this->breadcrumbs=array(
	'Payment Receipts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>Create Payment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>