<?php
/* @var $this DeliveryTransactionController */
/* @var $model DeliveryTransaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-transaction-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
            
            <?php
            $criteria=new CDbCriteria ();
            $criteria->alias = 'PurchaseOrder';
            $criteria->join='INNER JOIN Users ON Users.id=PurchaseOrder.client_id';
            $criteria->condition='Users.usertype="Client"';
            ?>
		<?php echo $form->labelEx($model,'purchase_order_id'); ?>
		<?php echo $form->dropDownList($model, 'purchase_order_id', CHtml::listData(
                 PurchaseOrder::model()->findAll($criteria),'id','id'));?>
		<?php echo $form->error($model,'purchase_order_id'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'delivery_date'); ?>
		 <?php $this->widget('ext.timepicker1.timepicker',array(
              'name' => 'delivery_date',
              'model'=>$model,
             'language'=>'en',
                'options' =>array (
                   'timeFormat'=>'hh:mm:ss',
                 'showSecond'=>true,
                 'hourGrid'=>4,
               'minuteGrid'=>10,
                                  'secondGrid'=>10,
                           
),
)); ?>
		<?php echo $form->error($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_status'); ?>
		<?php echo $form->textField($model,'delivery_status',array('size'=>45,'maxlength'=>45, 'readonly'=>'readonly' , 'value'=>'On The Way')); ?>
		<?php echo $form->error($model,'delivery_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lincktemp_id'); ?>
		<?php echo $form->dropDownList($model, 'lincktemp_id', CHtml::listData(
			Users::model()->findAll('emp_username = :a', array(':a'=>Yii::app()->user->name)), 'id', 'FullName')); ?>
		<?php echo $form->error($model,'lincktemp_id'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->