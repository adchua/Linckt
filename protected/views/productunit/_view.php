<?php
/* @var $this ProductunitController */
/* @var $data Productunit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productunit')); ?>:</b>
	<?php echo CHtml::encode($data->productunit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productunitprice')); ?>:</b>
	<?php echo CHtml::encode($data->productunitprice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pcode')); ?>:</b>
	<?php echo CHtml::encode($data->pcode); ?>
	<br />


</div>