<?php
/* @var $this PurchaseOrderlineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Orderlines',
);

$this->menu=array(
	array('label'=>'Create PurchaseOrderline', 'url'=>array('create')),
	array('label'=>'Manage PurchaseOrderline', 'url'=>array('admin')),
);
?>

<h1>Purchase Orderlines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
