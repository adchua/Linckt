<?php
/* @var $this PurchaseOrderlineController */
/* @var $model PurchaseOrderline */

$this->breadcrumbs=array(
	'Purchase Orderlines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PurchaseOrderline', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrderline', 'url'=>array('create')),
	array('label'=>'Update PurchaseOrderline', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PurchaseOrderline', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PurchaseOrderline', 'url'=>array('admin')),
);
?>

<h1>View PurchaseOrderline #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'po_orderproductqty',
		'productunit',
		'productunitcost',
		'purchase_order_id',
		'products_pcode',
	),
)); ?>
