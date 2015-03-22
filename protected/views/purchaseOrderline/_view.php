<?php
/* @var $this PurchaseOrderlineController */
/* @var $data PurchaseOrderline */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_orderproductqty')); ?>:</b>
	<?php echo CHtml::encode($data->po_orderproductqty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productunit')); ?>:</b>
	<?php echo CHtml::encode($data->productunit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productunitcost')); ?>:</b>
	<?php echo CHtml::encode($data->productunitcost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purchase_order_id')); ?>:</b>
	<?php echo CHtml::encode($data->purchase_order_id); ?>
	<br />

	
	<br />


</div>