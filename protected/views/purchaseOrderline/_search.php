<?php
/* @var $this PurchaseOrderlineController */
/* @var $model PurchaseOrderline */
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
		<?php echo $form->label($model,'po_orderproductqty'); ?>
		<?php echo $form->textField($model,'po_orderproductqty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'productunit'); ?>
		<?php echo $form->textField($model,'productunit',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'productunitcost'); ?>
		<?php echo $form->textField($model,'productunitcost',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purchase_order_id'); ?>
		<?php echo $form->textField($model,'purchase_order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_pcode'); ?>
		<?php echo $form->textField($model,'products_pcode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->