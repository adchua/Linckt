<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sales-invoice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lincktemp_id'); ?>
		<?php echo $form->dropDownList($model, 'lincktemp_id', CHtml::listData(
                     Users::model()->findAll('emp_username = :a', array(':a'=>Yii::app()->user->name)), 'id', 'FullName')); ?>
		<?php echo $form->error($model,'lincktemp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchase_order_id'); ?>
		<?php echo $form->dropDownList($model,'purchase_order_id', CHtml::listData(
                 PurchaseOrder::model()->findAll(), 'id', 'id'),
                    array('prompt' => 'Select Order',)); ?>
		<?php echo $form->error($model,'purchase_order_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->