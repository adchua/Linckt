<?php
/* @var $this ClientCompanyController */
/* @var $model ClientCompany */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-company-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'companyname'); ?>
		<?php echo $form->textField($model,'companyname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'companyname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'companyaddress'); ?>
		<?php echo $form->textField($model,'companyaddress',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'companyaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'companytype'); ?>
		<?php echo $form->textField($model,'companytype',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'companytype'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->