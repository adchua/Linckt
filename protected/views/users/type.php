<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
		<div class="row">
		<?php echo $form->labelEx($model,'usertype'); ?>
		<?php echo $form->dropDownList($model, 'usertype',$htmlOptions=array
		(
		'Admin' =>'Admin',
		'Regular' =>'Regular',
                'Supplier' =>'Supplier',
                  'Client' =>'Client',
		),array('prompt' => 'Select Type')) ?>
		<?php echo $form->error($model,'usertype'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->