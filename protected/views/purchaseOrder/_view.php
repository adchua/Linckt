<?php
/* @var $this PurchaseOrderController */
/* @var $data PurchaseOrder */
?>

<div class="view">

    
        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('podate')); ?>:</b>
	<?php echo CHtml::encode(CHtml::encode($data->podate), array('view', 'id'=>$data->id)); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::encode($data->client->FullName); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

        <hr>    
	


</div>