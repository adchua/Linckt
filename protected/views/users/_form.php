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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Firstname'); ?>
		<?php echo $form->textField($model,'ufirstname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ufirstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Middle Initial'); ?>
		<?php echo $form->textField($model,'uminitial',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'uminitial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Lastname'); ?>
		<?php echo $form->textField($model,'ulastname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ulastname'); ?>
	</div>

	<?php  if(Yii::app()->user->type==="Admin"){?>
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
        <?php } else {?>
        <div class="row">
            <?php echo $form->labelEx($model,'usertype'); ?>
		<?php echo $form->textField($model, 'usertype', array('readonly'=>'readonly')) ?>
		<?php echo $form->error($model,'usertype'); ?>
        </div>
        <?php }?>
        

	<div class="row">
		<?php echo $form->labelEx($model,'emp_username'); ?>
		<?php echo $form->textField($model,'emp_username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'emp_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upassword'); ?>
		<?php echo $form->passwordField($model,'upassword',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'upassword'); ?>
	</div>
        <?php  if(Yii::app()->user->type==="Admin"){?>
	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->dropDownList($model, 'company_id', CHtml::listData(
                 ClientCompany::model()->findAll(), 'id', 'companyname'),
			array('prompt' => 'Select a Company')
			); ?>
		<?php echo $form->error($model,'company_id'); ?>
            
            <span style="float:left"> <?php echo CHtml::link('Add new Company', array('clientCompany/create')); ?> </span> 
	
	</div>
        <?php } else {?>
        <div class="row">
            <?php $en=ClientCompany::model()->findAll('id = :a', array(':a'=>$model->company_id));?>
<?php if (count($en) !== 0){?>
            
            <?php foreach ($en as $row) { ?>
        <?php echo $form->labelEx($model,'company_id'); ?>
        <?php echo $form->textField($model, 'company_id', array('readonly'=>'readonly', 'value'=>$row->companyname )) ?>
            <?php echo $form->HiddenField($model, 'company_id', array('readonly'=>'readonly', 'value'=>$row->id )) ?>
        <?php echo $form->error($model,'company_id'); ?>
        </div>
<?php } }}?>
	</div>
       

  
	
     
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->