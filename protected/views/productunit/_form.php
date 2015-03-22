<?php
/* @var $this ProductunitController */
/* @var $model Productunit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productunit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

        <div class="row">
		<?php echo $form->labelEx($model,'productunit'); ?>
		<?php echo $form->dropDownList($model, 'productunit',$htmlOptions=array
		(
		'Cans' =>'Can',
		'Pails' =>'Pails',
                'Drums' =>'Drums',
		),array('prompt' => 'Select Unit')) ?>
		<?php echo $form->error($model,'productunit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productunitprice'); ?>
		<?php echo $form->textField($model,'productunitprice',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'productunitprice'); ?>
	</div>


        
        <div class="row">
		<?php echo $form->labelEx($model,'pcode'); ?>
            <?php $userid =Yii::app()->user->id;
            // $pcode=Yii::app()->db->createCommand()->select('pcode','pcode')->from('Products')->where('supplier_id ='.$userid)->queryAll();
            ?>
		<?php echo $form->dropDownList($model, 'pcode',CHtml::listData(
                 Products::model()->findAll('supplier_id='.$userid), 'pcode', 'ProductName'),
                        //CHtml::listData(NodeTypes::model()->findAll(array('order' => 'name')),'id','name'));
			array('prompt' => 'Select a Product Code' )
			); ?>
		<?php echo $form->error($model,'pcode'); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->