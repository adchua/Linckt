<?php
/* @var $this PurchaseOrderController */
/* @var $model PurchaseOrder */
/* @var $form CActiveForm */


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
		<?php echo $form->labelEx($model,'podate'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'PurchaseOrder[podate]',
    
      'value' => ($model->podate)? $model->podate:date('Y-m-d'),
                                'options'=>array(
                                    
                                     'dateFormat'=>'yy-mm-dd',
                                     
                                ),
                                'htmlOptions'=>array(
                                        'style'=>'height:20px;'
                                ),
                        ));
                ?>
            
            
            
		<?php echo $form->error($model,'podate'); ?>
	</div>
        
        <?php if(Yii::app()->user->type==="Client" ){?>
	<div class="row">   
		<?php echo $form->hiddenField($model,'status',array('value'=> 'Pending')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
        <?php }else{?>
        <div class="row">   
                 <?php echo $form->labelEx($model,'status'); ?>
            <?php echo $form->dropDownList($model, 'status',$htmlOptions=array
		(
                'Pending' =>'Pending',
		'For Pick-up' =>'For Pick-up',
                'Out of Stock' =>'Out of Stock',
             
		),array('prompt' => 'Select Type')) ?>
		<?php echo $form->error($model,'status'); ?>
        </div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->dropDownList($model, 'client_id', CHtml::listData(
                     Users::model()->findAll('emp_username = :a', array(':a'=>Yii::app()->user->name)), 'id', 'FullName')); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>
        <?php } ?>
	
        
         <?php if( Yii::app()->user->type==="Client" ){?>
          <div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->dropDownList($model, 'client_id', CHtml::listData(
                     Users::model()->findAll('emp_username = :a', array(':a'=>Yii::app()->user->name)), 'id', 'FullName')); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>
        
         <?php }else if(Yii::app()->user->type==="Supplier" ||Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular" ||Yii::app()->user->type==="Client"  ){?>
         <div class="row">
             
             <?php $en=Users::model()->findAll('id = :a', array(':a'=>$model->client_id));?>
        <?php if (count($en) !== 0){?>
            
            <?php foreach ($en as $row) { ?>
             
		<?php echo $form->labelEx($model,'client_id'); ?>
		 <?php echo $form->textField($model, 'client_id', array('readonly'=>'readonly', 'value'=>$row->FullName )) ?>
              <?php echo $form->hiddenField($model, 'client_id', array('readonly'=>'readonly', 'value'=>$row->id )) ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>
        
         <?php }}} ?>
        
        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

</div>
<?php $this->endWidget(); ?>

</div><!-- form -->