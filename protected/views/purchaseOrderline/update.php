<?php
/* @var $this PurchaseOrderlineController */
/* @var $model PurchaseOrderline */

$this->breadcrumbs=array(
	'Purchase Orderlines'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PurchaseOrderline', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrderline', 'url'=>array('create')),
	array('label'=>'View PurchaseOrderline', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PurchaseOrderline', 'url'=>array('admin')),
);
?>

<h1>Update PurchaseOrderline <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>