<?php
/* @var $this PurchaseOrderController */
/* @var $model PurchaseOrder */


if(Yii::app()->user->type==="Admin" ||Yii::app()->user->type==="Regular" ||Yii::app()->user->type==="Supplier" ){
$this->menu=array(
	array('label'=>'List PurchaseOrder', 'url'=>array('index')),
	
);
}else{
    
}
?>

<h1>Create Order</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>