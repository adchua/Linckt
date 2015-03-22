<?php
/* @var $this PaymentReceiptController */
/* @var $data PaymentReceipt */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('client_company_id')); ?>:</b>
	<?php echo CHtml::encode($data->ClientCompany->companyname); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('or_number')); ?>:</b>
	<?php echo CHtml::encode($data->or_number); ?>
	<br />
	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('linckt_employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->linckt_employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_company_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_invoice_id')); ?>:</b>
	<?php echo CHtml::encode($data->sales_invoice_id); ?>
	<br />

	*/ ?>

</div>