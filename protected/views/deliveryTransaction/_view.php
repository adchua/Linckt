<?php
/* @var $this DeliveryTransactionController */
/* @var $data DeliveryTransaction */
?>

<div class="view">

    
    <b><?php echo CHtml::encode($data->getAttributeLabel('purchase_order_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->purchase_order_id), array('view', 'id'=>$data->id)); ?>
	<br />  
	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_date')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_date); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_status')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_status); ?>
	<br />

        <hr>
        
</div>