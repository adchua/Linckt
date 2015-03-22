<?php
/* @var $this ProductsController */
/* @var $data Products */
?>


<?php if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular" || Yii::app()->user->type==="Supplier"){ ?>
    
    <div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('pcode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pcode), array('view', 'id'=>$data->pcode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pname')); ?>:</b>
	<?php echo CHtml::encode($data->pname); ?>
        <br>
        <b><?php echo CHtml::encode($data->getAttributeLabel('supplier_id')); ?>:</b>
	<?php echo CHtml::encode($data->supplier->FullName); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('Company Name')); ?>:</b>
	<?php echo CHtml::encode($data->supplier->FullCompany); ?>
  
	<br />
        <hr>
        </div>
       
<?php }elseif (Yii::app()->user->type==="Client" ){  ?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('pcode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pcode), array('view', 'id'=>$data->pcode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pname')); ?>:</b>
	<?php echo CHtml::encode($data->pname); ?>
        <br>
        
  
        <hr>
        </div>

    
<?php } ?>
