<?php
/* @var $this ClientCompanyController */
/* @var $data ClientCompany */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->companyname), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyaddress')); ?>:</b>
	<?php echo CHtml::encode($data->companyaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companytype')); ?>:</b>
	<?php echo CHtml::encode($data->companytype); ?>
	<br />
        <hr>


</div>