<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */

$this->breadcrumbs=array(
	'Sales Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sales Invoice', 'url'=>array('index')),
	array('label'=>'Create Sales Invoice', 'url'=>array('create')),
	array('label'=>'Update Sales Invoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sales Invoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Sales Invoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
             array('label'=>'Employee ', 'value'=>$model->Users->FullName),
		'purchase_order_id',
	),
)); ?>
