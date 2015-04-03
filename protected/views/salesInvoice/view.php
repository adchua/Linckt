<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */

$this->breadcrumbs=array(
	'Sales Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sales Invoice', 'url'=>array('index')),
	array('label'=>'Create Sales Invoice', 'url'=>array('create')),
	array('label'=>'Update Sales Invoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sales Invoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Sales Invoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
             
	),
)); ?>


<?php $en1=  PaymentReceipt::model()->findAll('sales_invoice_id = :a', array(':a'=>$model->id));?>
 <?php foreach ($en1 as $row2) { 

      $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row2,
	'attributes'=>array(
             array('label'=>'ID of Payment', 'value'=>$row2->id),
            array('label'=>'Client Company', 'value'=>$row2->ClientCompany->companyname),
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


 <?php }?>

