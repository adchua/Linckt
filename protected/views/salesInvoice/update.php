<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */

$this->breadcrumbs=array(
	'Sales Invoices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sales Invoice', 'url'=>array('index')),
	array('label'=>'Create Sales Invoice', 'url'=>array('create')),
	array('label'=>'View Sales Invoice', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Update Sales Invoice <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>