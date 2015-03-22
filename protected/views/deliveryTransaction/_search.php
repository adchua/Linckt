<?php
/* @var $this DeliveryTransactionController */
/* @var $model DeliveryTransaction */
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
		<?php echo $form->label($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_status'); ?>
		<?php echo $form->textField($model,'delivery_status',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lincktemp_id'); ?>
		<?php echo $form->textField($model,'lincktemp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purchase_order_id'); ?>
		<?php echo $form->textField($model,'purchase_order_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->