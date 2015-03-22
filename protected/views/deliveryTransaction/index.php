<?php
/* @var $this DeliveryTransactionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Delivery Transactions',
);
if(Yii::app()->user->type==="Admin"){
$this->menu=array(
	array('label'=>'Create Delivery', 'url'=>array('create')),
	array('label'=>'Manage Delivery', 'url'=>array('admin')),
);
}else{
    
}
?>

<h1>Delivery</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
