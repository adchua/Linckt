<?php
/* @var $this PaymentReceiptController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payment Receipts',
);
if(Yii::app()->user->type==="Admin"){
$this->menu=array(
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
}else{
    
}
?>

<h1>Payment </h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
