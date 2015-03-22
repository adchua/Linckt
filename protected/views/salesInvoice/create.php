<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */

$this->breadcrumbs=array(
	'Sales Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SalesInvoice', 'url'=>array('index')),
	
);
?>

<h1>Create Sales Invoice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>