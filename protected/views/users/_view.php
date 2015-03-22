<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ufirstname')); ?>:</b>
	<?php echo CHtml::encode($data->ufirstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uminitial')); ?>:</b>
	<?php echo CHtml::encode($data->uminitial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ulastname')); ?>:</b>
	<?php echo CHtml::encode($data->ulastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usertype')); ?>:</b>
	<?php echo CHtml::encode($data->usertype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->emp_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upassword')); ?>:</b>
	<?php echo CHtml::encode($data->upassword); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	*/ ?>

</div>