<?php
/* @var $this LincktProductsController */
/* @var $data LincktProducts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_pcode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->products_pcode), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productunit_id')); ?>:</b>
	<?php echo CHtml::encode($data->productunit->productunit); ?>
	<br />

        <hr>
</div>