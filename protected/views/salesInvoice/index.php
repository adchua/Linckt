<?php
/* @var $this SalesInvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sales Invoices',
);

$this->menu=array(
	array('label'=>'Create Sales Invoice', 'url'=>array('create')),
	
);
?>

<h1>Sales Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
