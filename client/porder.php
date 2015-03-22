<?php
/* @var $this PurchaseOrderlineController */
/* @var $model PurchaseOrderline */

$this->breadcrumbs=array(
	'Purchase Orderlines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Skip', 'url'=>array('purchaseOrder/index')),
);
?>

<h1>Create PurchaseOrderline</h1>

<?php $this->renderPartial('_form2', array('model'=>$model)); ?>