<?php
/* @var $this PaymentReceiptController */
/* @var $model PaymentReceipt */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pr_amount'); ?>
		<?php echo $form->textField($model,'pr_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pr_receipttpye'); ?>
		<?php echo $form->textField($model,'pr_receipttpye',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pr_date'); ?>
		<?php echo $form->textField($model,'pr_date',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'or_number'); ?>
		<?php echo $form->textField($model,'or_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'pr_paymenttype'); ?>
		<?php echo $form->textField($model,'pr_paymenttype',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	
	

	<div class="row">
		<?php echo $form->label($model,'client_company_id'); ?>
		<?php echo $form->textField($model,'client_company_id'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'linckt_employee_id'); ?>
		<?php echo $form->textField($model,'linckt_employee_id'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'sales_invoice_id'); ?>
		<?php echo $form->textField($model,'sales_invoice_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->