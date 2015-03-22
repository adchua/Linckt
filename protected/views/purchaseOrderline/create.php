<?php
/* @var $this PurchaseOrderlineController */
/* @var $model PurchaseOrderline */

$this->breadcrumbs=array(
	'Purchase Orderlines'=>array('index'),
	'Create',
);
if(Yii::app()->user->type==="Admin" ||Yii::app()->user->type==="Regular" ||Yii::app()->user->type==="Supplier" ){
$this->menu=array(
	array('label'=>'Cancel', 'url'=>array('purchaseOrder/index')),
);
}else{
    $this->menu=array(
	array('label'=>'Cancel', 'url'=>array('users/view','id'=>Yii::app()->user->id)),
);
}
?>

<h1>Create Purchase Order-line</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>