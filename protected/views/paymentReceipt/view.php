<?php
/* @var $this PaymentReceiptController */
/* @var $model PaymentReceipt */

$this->breadcrumbs=array(
	'Payment Receipts'=>array('index'),
	$model->id,
);
if(Yii::app()->user->type==="Admin"){
$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Update Payment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Payment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
}else{
    $this->menu=array(
        array('label'=>'Update Payment', 'url'=>array('update', 'id'=>$model->id)),
        );
}
?>

<h1>View Payment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                array('label'=>'Client Company', 'value'=>$model->ClientCompany->companyname),
              'or_number',
            'pr_paymenttype',
            'pr_receipttpye',
               'pr_status',
		'pr_amount',
		'pr_date',
		'sales_invoice_id',
             array('label'=>'Employee', 'value'=>$model->Users->FullName),
             array(
		                'name'=>'Receipt Picture',
		                'type'=>'raw',
		                'value'=>html_entity_decode(CHtml::image(Yii::app()->controller->createUrl('PaymentReceipt/loadImage', array('id'=>$model->id))
                                ,'alt'
                                ,array('width'=>500)
                                )),
		                ),
	),
)); ?>
