<?php
/* @var $this PurchaseOrderlineController */
/* @var $model PurchaseOrderline */
/* @var $form CActiveForm */

if(Yii::app()->user->type==="Admin" ||Yii::app()->user->type==="Regular" ){
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-orderline-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call tpo performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

        
        <div class="row">
		<?php echo $form->labelEx($model,'purchase_order_id'); ?> 
		 <?php echo $form->textField($model,'purchase_order_id',array('readonly'=>'readonly','value'=>Yii::app()->getRequest()->getQuery('id'))); ?>
		<?php echo $form->error($model,'purchase_order_id'); ?>
            
	</div>
        
	<?php echo $form->errorSummary($model); ?>

         <div class="row">
		<?php echo $form->labelEx($model,'products_pcode'); ?>
		<?php echo $form->dropDownList($model, 'products_pcode', CHtml::listData(
                 Products::model()->findAll(), 'pcode', 'ProductName'),
                    array('prompt' => 'Select a Product',
                        'ajax'=>array('size'=>50,
                        //'type='=>'POST',
                        'type='=>'GET',
                        'url'=>CController::createUrl('PurchaseOrderline/ProdUnit'),
                        'data'=>array('products_pcode'=>'js:this.value'),
			//'success'=>'function(data){ $(\'#productunit\').empty(); $(\'#productunit\').append(data); }'
                        'success'=>'function(data){ $("#'.CHtml::activeId($model, 'productunit').'").empty();$("#'.CHtml::activeId($model, 'productunit').'").append("value",data); }'
                           
                ))); ?>                 
		<?php echo $form->error($model,'products_pcode'); ?>
            
<!--            <span style="float:left"> <?php echo CHtml::link('Add new Users', array('clientCompany/create')); ?> </span> -->
         </div> 
        
               
        <div class="row">
            <?php echo $form->labelEx($model,'productunit'); ?>
		  <?php echo $form->dropDownList($model,'productunit', array(),
                    array('prompt' => 'Select Type',
                        'ajax'=>array('size'=>50,
                        'type='=>'GET',
                        'url'=>CController::createUrl('PurchaseOrderline/UnitPrice'),
                        'data'=>array('productunit'=>'js:this.value'),
			'success'=>'function(data){ $(\'#PurchaseOrderline_unitprice\').empty();$(\'#PurchaseOrderline_unitprice\').val(data); }'
                ))); ?>
               <!-- <?php echo $form->textField($model,'productunit',array('size'=>45,'maxlength'=>45)); ?>-->
		<?php echo $form->error($model,'productunit'); ?>
	</div>
        
       
        
	<div class="row">
		<label for="PurchaseOrderline_po_orderproductqty" class="required">Quantity <span class="required">*</span></label>
                <input name="PurchaseOrderline[po_orderproductqty]" id="PurchaseOrderline_po_orderproductqty" type="text" onkeyup="total(this)" value="" />
		<?php echo $form->error($model,'po_orderproductqty'); ?>
            
          
            
            
	</div>
        
       <script type="text/javascript">
function total(x) {
    
     
     var a = document.getElementById('PurchaseOrderline_unitprice').value;
      var b = document.getElementById('PurchaseOrderline_po_orderproductqty').value;
     
     c = a*b;
     
    document.getElementById("PurchaseOrderline_productunitcost").value = c;
    
    
}
</script>

        
        
	<div class="row">
            <label for="PurchaseOrderline_unitprice" class="required">Unit Price <span class="required">*</span></label>
            <input readonly="readonly" name="PurchaseOrderline[unitprice]" id="PurchaseOrderline_unitprice" type="text" />
            
        </div> 

	<div class="row">
		<?php echo $form->labelEx($model,'productunitcost'); ?>
		<?php echo $form->textField($model,'productunitcost', array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'productunitcost'); ?>
           
	</div>
        
      

       
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<!--///////////////////////////////////////////////FOR Client Form Only ///////////////////////////////////////////// -->


<?php } else if(Yii::app()->user->type==="Client"){?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-orderline-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

        
        <div class="row">
		<?php echo $form->labelEx($model,'purchase_order_id'); ?> 
            <?php echo $form->textField($model,'purchase_order_id',array('readonly'=>'readonly','value'=>Yii::app()->getRequest()->getQuery('id'))); ?>
		<?php echo $form->error($model,'purchase_order_id'); ?>
            
	</div>
        
	<?php echo $form->errorSummary($model); ?>

         <div class="row">
		<?php echo $form->labelEx($model,'products_pcode'); ?>
		<?php echo $form->dropDownList($model, 'products_pcode', CHtml::listData(
                 LincktProducts::model()->findAll(), 'products_pcode', 'products_pcode'),
                    array('prompt' => 'Select a Product',
                        'ajax'=>array('size'=>50,
                        //'type='=>'POST',
                        'type='=>'GET',
                        'url'=>CController::createUrl('PurchaseOrderline/ProdUnitLink'),
                        'data'=>array('products_pcode'=>'js:this.value'),
			//'success'=>'function(data){ $(\'#productunit\').empty(); $(\'#productunit\').append(data); }'
                        'success'=>'function(data){ $("#'.CHtml::activeId($model, 'productunit').'").append("value",data); }'
                ))); ?>                 
		<?php echo $form->error($model,'products_pcode'); ?>
            
<!--            <span style="float:left"> <?php echo CHtml::link('Add new Users', array('clientCompany/create')); ?> </span> -->
         </div> 
        
               
        <div class="row">
            <?php echo $form->labelEx($model,'productunit'); ?>
		  <?php echo $form->dropDownList($model,'productunit', array(),
                    array('prompt' => 'Select Type',
                        'ajax'=>array('size'=>50,
                        'type='=>'GET',
                        'url'=>CController::createUrl('PurchaseOrderline/UnitPriceLink'),
                        'data'=>array('productunit'=>'js:this.value'),
			'success'=>'function(data){ $(\'#PurchaseOrderline_unitprice\').empty();$(\'#PurchaseOrderline_unitprice\').val(data); }'
                ))); ?>
               <!-- <?php echo $form->textField($model,'productunit',array('size'=>45,'maxlength'=>45)); ?>-->
		<?php echo $form->error($model,'productunit'); ?>
	</div>
        
       
        
	<div class="row">
		<label for="PurchaseOrderline_po_orderproductqty" class="required">Quantity <span class="required">*</span></label>
                <input name="PurchaseOrderline[po_orderproductqty]" id="PurchaseOrderline_po_orderproductqty" type="text" onkeyup="total(this)" value="" />
		<?php echo $form->error($model,'po_orderproductqty'); ?>
            
          
            
            
	</div>
        
       <script type="text/javascript">
function total(x) {
    
     
     var a = document.getElementById('PurchaseOrderline_unitprice').value;
      var b = document.getElementById('PurchaseOrderline_po_orderproductqty').value;
     
     c = a*b;
     
    document.getElementById("PurchaseOrderline_productunitcost").value = c;
    
    
}
</script>

        
        
	<div class="row">
            <label for="PurchaseOrderline_unitprice" class="required">Unit Price <span class="required">*</span></label>
            <input readonly="readonly" name="PurchaseOrderline[unitprice]" id="PurchaseOrderline_unitprice" type="text" />
            
        </div> 

	<div class="row">
		<?php echo $form->labelEx($model,'productunitcost'); ?>
		<?php echo $form->textField($model,'productunitcost', array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'productunitcost'); ?>
           
	</div>
        
      

       
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php } ?>
