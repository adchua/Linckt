<?php
/* @var $this DeliveryTransactionController */
/* @var $model DeliveryTransaction */

$this->breadcrumbs=array(
	'Delivery Transactions'=>array('index'),
	$model->id,
);
if(Yii::app()->user->type==="Admin"){
$this->menu=array(
	array('label'=>'List Delivery', 'url'=>array('index')),
	array('label'=>'Create Delivery', 'url'=>array('create')),
	array('label'=>'Update Delivery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Delivery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Delivery', 'url'=>array('admin')),
);
}else{
    
}
?>

<h1>View Delivery #<?php echo $model->purchase_order_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                 'purchase_order_id',
		'delivery_date',
		'delivery_status',
		array('label'=>'Full Name', 'value'=>$model->lincktemp->FullName),
		
	),
)); ?>
