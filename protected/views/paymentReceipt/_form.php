<?php
/* @var $this PaymentReceiptController */
/* @var $model PaymentReceipt */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-receipt-form',
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

        
        <?php if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"){?>
        
        <div class="row">
            
            <?php $criteria=new CDbCriteria ();
            $criteria->alias = 'ClientCompany';
            $criteria->join='INNER JOIN Users ON ClientCompany.id = Users.company_id';
            $criteria->condition='Users.usertype="Client"';
            ?>
		<?php echo $form->labelEx($model,'client_company_id'); ?>
		<?php echo $form->dropDownList($model, 'client_company_id', CHtml::listData(
                 ClientCompany::model()->findAll($criteria), 'id', 'companyname'),
                    array('prompt' => 'Select a Company',
//                        'ajax'=>array('size'=>50,
//                        //'type='=>'POST',
//                        'type='=>'GET',
//                        'url'=>CController::createUrl('PaymentReceipt/PopulateOr'),
//                        'data'=>array('client_company_id'=>'js:this.value'),
//			//'success'=>'function(data){ $(\'#productunit\').empty(); $(\'#productunit\').append(data); }'
//                        'success'=>'function(data){ $("#'.CHtml::activeId($model, 'or_number').'").append("value",data); }'
                )); ?>     
		<?php echo $form->error($model,'client_company_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'or_number'); ?>
		<?php echo $form->dropDownList($model,'or_number', CHtml::listData(
                 PurchaseOrder::model()->findAll(), 'id', 'id'),
                    array('prompt' => 'Select O.R',)); ?>
		<?php echo $form->error($model,'or_number'); ?>
	</div>
         <div class="row">
		<?php echo $form->labelEx($model,'pr_paymenttype'); ?>
		<?php echo $form->dropDownList($model, 'pr_paymenttype',$htmlOptions=array
		(
		'Cash' =>'Cash',
		'Check' =>'Check',
                
		),array('prompt' => 'Select Payment Type')) ?>
		<?php echo $form->error($model,'pr_paymenttype'); ?>
	</div>  
        
	<div class="row">
		<?php echo $form->labelEx($model,'pr_receipttpye'); ?>
		<?php echo $form->dropDownList($model, 'pr_receipttpye',$htmlOptions=array
		(
		'Provisional Receipt' =>'Provisional Receipt',
		'Original Receipt' =>'Official Receipt',
                
		),array('prompt' => 'Select Receipt')) ?>
		<?php echo $form->error($model,'pr_receipttpye'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'pr_status'); ?>
		<?php echo $form->dropDownList($model, 'pr_status',$htmlOptions=array
		(
		' Fully Paid' =>' Fully Paid',
		'Parially Paid' =>'Parially Paid',
                'Unpaid' =>'Unpaid',
                
		),array('prompt' => 'Select Status')) ?>
		<?php echo $form->error($model,'pr_status'); ?>
	</div>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'pr_amount'); ?>
		<?php echo $form->textField($model,'pr_amount'); ?>
		<?php echo $form->error($model,'pr_amount'); ?>
	</div>
       

	<div class="row">
		<?php echo $form->labelEx($model,'pr_date'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'pr_date',
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;',
        'size' => '12',
    ),
));?>
		<?php echo $form->error($model,'pr_date'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'sales_invoice_id'); ?>
		<?php echo $form->dropDownList($model,'sales_invoice_id', CHtml::listData(
                 SalesInvoice::model()->findAll(), 'id', 'id'),
                    array('prompt' => 'Select Order',)); ?>
		<?php echo $form->error($model,'sales_invoice_id'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'linckt_employee_id'); ?>
		<?php echo $form->dropDownList($model, 'linckt_employee_id', CHtml::listData(
                     Users::model()->findAll('emp_username = :a', array(':a'=>Yii::app()->user->name)), 'id', 'FullName')); ?>
		<?php echo $form->error($model,'linckt_employee_id'); ?>
	</div>
        
         <div class="row buttons">
		<?php echo $form->labelEx($model,'py_pic'); ?>
		<?php echo $form->fileField($model,'py_pic'); ?>
		<?php echo $form->error($model,'py_pic'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fileType'); ?>
		<?php echo $form->hiddenField($model,'fileType',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fileType'); ?>
        </div>
        
        
        
        <!--CLIENT UPADATE-->
        <?php }else if(Yii::app()->user->type==="Client"){?>
        
       
        <div class="row">
          <?php $en=  ClientCompany::model()->findAll('id = :a', array(':a'=>$model->client_company_id));?>
        <?php if (count($en) !== 0){?>
            
            <?php foreach ($en as $row) { ?>
        
        <?php echo $form->labelEx($model,'client_company_id'); ?>
        <?php echo $form->textField($model, 'client_company_id', array('readonly'=>'readonly', 'value'=>$row->companyname )) ?>
             <?php echo $form->hiddenField($model, 'client_company_id', array('readonly'=>'readonly', 'value'=>$row->id )) ?>
       <?php echo $form->error($model,'client_company_id'); ?>
        
            <?php }} ?>
            
        </div>
        <div class="row">
            
              <?php $en=  PurchaseOrder::model()->findAll('id = :a', array(':a'=>$model->or_number));?>
        <?php if (count($en) !== 0){?>
            
            <?php foreach ($en as $row) { ?>
		<?php echo $form->labelEx($model,'or_number'); ?>
		
            
             <?php echo $form->textField($model, 'or_number', array('readonly'=>'readonly', 'value'=>$row->id )) ?>
		<?php echo $form->error($model,'or_number'); ?>
              <?php }} ?>
            
	</div>
         <div class="row">
		<?php echo $form->labelEx($model,'pr_paymenttype'); ?>
		<?php echo $form->dropDownList($model, 'pr_paymenttype',$htmlOptions=array
		(
		'Cash' =>'Cash',
		'Check' =>'Check',
                
		),array('prompt' => 'Select Payment Type')) ?>
		<?php echo $form->error($model,'pr_paymenttype'); ?>
	</div>  
        
	<div class="row">
		<?php echo $form->labelEx($model,'pr_receipttpye'); ?>
		<?php echo $form->dropDownList($model, 'pr_receipttpye',$htmlOptions=array
		(
		'Provisional Receipt' =>'Provisional Receipt',
		'Original Receipt' =>'Official Receipt',
                
		),array('prompt' => 'Select Receipt')) ?>
		<?php echo $form->error($model,'pr_receipttpye'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'pr_status'); ?>
		<?php echo $form->textField($model,'pr_status',array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'pr_status'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pr_amount'); ?>
		<?php echo $form->textField($model,'pr_amount',array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'pr_amount'); ?>
	</div>
       

	<div class="row">
		<?php echo $form->labelEx($model,'pr_date'); ?>
		
            <?php echo $form->textField($model,'pr_date',array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'pr_date'); ?>
	</div>

	

	<div class="row">
            
               <?php $en=SalesInvoice::model()->findAll('id = :a', array(':a'=>$model->sales_invoice_id));?>
        <?php if (count($en) !== 0){?>
            
            <?php foreach ($en as $row) { ?>
		<?php echo $form->labelEx($model,'sales_invoice_id'); ?>
		 <?php echo $form->textField($model, 'sales_invoice_id', array('readonly'=>'readonly', 'value'=>$row->id )) ?>
		<?php echo $form->error($model,'sales_invoice_id'); ?>
            
             <?php }} ?>
	</div>
        <div class="row">
            
               <?php $en=  Users::model()->findAll('id = :a', array(':a'=>$model->linckt_employee_id));?>
        <?php if (count($en) !== 0){?>
            
            <?php foreach ($en as $row) { ?>
		<?php echo $form->labelEx($model,'linckt_employee_id'); ?>
		 <?php echo $form->textField($model, 'linckt_employee_id', array('readonly'=>'readonly', 'value'=>$row->FullName )) ?>
             <?php echo $form->hiddenField($model, 'linckt_employee_id', array('readonly'=>'readonly', 'value'=>$row->id )) ?>
		<?php echo $form->error($model,'linckt_employee_id'); ?>
               <?php }} ?>
	</div>
        
        
        
        <?php }?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->