<?php
/* @var $this LincktProductsController */
/* @var $model LincktProducts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'linckt-products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        
       <div class="row">
		<?php echo $form->labelEx($model,'products_pcode'); ?>
		<?php echo $form->dropDownList($model, 'products_pcode', CHtml::listData(
                 Products::model()->findAll(), 'pcode', 'ProductName'),
                    array('prompt' => 'Select a Product',
                        'ajax'=>array('size'=>50,
                        //'type='=>'POST',
                        'type='=>'GET',
                        'url'=>CController::createUrl('LincktProducts/ProdUnit'),
                        'data'=>array('products_pcode'=>'js:this.value'),
			//'success'=>'function(data){ $(\'#productunit\').empty(); $(\'#productunit\').append(data); }'
                        'success'=>'function(data){ $("#'.CHtml::activeId($model, 'productunit_id').'").empty();$("#'.CHtml::activeId($model, 'productunit_id').'").append("value",data); }'
                ))); ?>                 
		<?php echo $form->error($model,'products_pcode'); ?>
       </div>
        
         <div class="row">
            <?php echo $form->labelEx($model,'productunit_id'); ?>
		  <?php echo $form->dropDownList($model,'productunit_id', array(),
                    array('prompt' => 'Select Type',
                        'ajax'=>array('size'=>50,
                        'type='=>'GET',
                        'url'=>CController::createUrl('LincktProducts/UnitPrice'),
                        'data'=>array('productunit_id'=>'js:this.value'),
			'success'=>'function(data){ $(\'#PurchaseOrderline_unitprice\').empty();$(\'#PurchaseOrderline_unitprice\').val(data); }'
                ))); ?>
          
		<?php echo $form->error($model,'productunit'); ?>
	</div>
      
        <div class="row">
            <label for="PurchaseOrderline_unitprice" class="required">Unit Price <span class="required">*</span></label>
            <input readonly="readonly" name="PurchaseOrderline[unitprice]" id="PurchaseOrderline_unitprice" type="text" />
            
        </div> 
        
        <div class="row">
		<label for="Linckt_interest" class="required">Linckt Interest <span class="required">*</span></label>		
                <select name="Linckt_interest" id="Linckt_interest" onchange="linkinterest(this)">
            <option value="">Select Percentage </option>
            <option value=".5">5%</option>
            <option value=".10">10%</option>
            <option value=".15">15%</option>
            <option value=".20">20%</option>
            <option value=".25">25%</option>
             <option value=".30">30%</option>
            <option value=".35">35%</option>
             <option value=".40">40%</option>
            <option value=".45">45%</option>
             <option value=".50">50%</option>
            <option value=".55">55%</option>
             <option value=".60">60%</option>
            <option value=".65">65%</option>
            <option value=".75">75%</option>
             <option value=".80">80%</option>
              <option value=".85">85%</option>
               <option value=".90">90%</option>
                <option value=".95">95%</option>
                 <option value=".100">100%</option>
            </select>              
        </div>
        
        <script type="text/javascript">
function linkinterest(x) {
    
    var  unitprice = document.getElementById('PurchaseOrderline_unitprice').value;
    var   gov = document.getElementById('Gov_interest').value;
    var   linc = document.getElementById('Linckt_interest').value;
     
    var ug = unitprice * gov;
    var ul = unitprice * linc;
    var price = unitprice * 1;
   // total = (unitprice + ug + ul);
   
   var sum =ug+ul+price;
  
   
     
    document.getElementById("LincktProducts_linckt_unitprice").value = sum;
    
    
}
</script>
        
		     <div class="row">
            <label for="Gov_interest" class="required">Government Interest </label>
            <input readonly="readonly" name="Gov_interest" id="Gov_interest" type="text"  value=".25"/>
            
        </div> 
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'linckt_unitprice'); ?>
		<?php echo $form->textField($model,'linckt_unitprice',array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'linckt_unitprice'); ?>
	</div>

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->