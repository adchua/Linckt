<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
    'method'=>'post',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pcode'); ?>
		<?php echo $form->textField($model,'pcode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pname'); ?>
		<?php echo $form->textField($model,'pname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pcategory'); ?>
		<?php echo $form->textField($model,'pcategory',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pcategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pdescription'); ?>
		<?php echo $form->textField($model,'pdescription',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'pdescription'); ?>
	</div>


        <?php  if(Yii::app()->user->type==="Admin"){?>
        <div class="row">
		<?php echo $form->labelEx($model,'supplier_id'); ?>
		<?php echo $form->dropDownList($model, 'supplier_id', CHtml::listData(
                 Users::model()->findAll(), 'id', 'FullName'),
			array('prompt' => 'Select a Supplier')
			); ?>
		<?php echo $form->error($model,'supplier_id'); ?>
            
            <span style="float:left"> <?php echo CHtml::link('Add new Users', array('clientCompany/create')); ?> </span> 
	
	</div>
         <?php } else {?>
        <div class="row">
            
        <?php echo $form->labelEx($model,'supplier_id'); ?>
        <?php echo $form->textField($model, 'supplier_id', array('readonly'=>'readonly', 'value'=>Yii::app()->user->name )) ?>
        <?php echo $form->hiddenField($model, 'supplier_id', array('readonly'=>'readonly', 'value'=>Yii::app()->user->id )) ?>
        <?php echo $form->error($model,'supplier_id'); ?>
        </div>
<?php }?>
   

        
         <div class="row buttons">
		<?php echo $form->labelEx($model,'p_pic'); ?>
		<?php echo $form->fileField($model,'p_pic'); ?>
		<?php echo $form->error($model,'p_pic'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fileType'); ?>
		<?php echo $form->hiddenField($model,'fileType',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fileType'); ?>
        </div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->