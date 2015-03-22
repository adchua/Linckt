<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>


<center>
        <table style="width:500px">
                <tr>
                        <th>Address</th>
                        <td>Unit 8P Tower 1, Tribeca. Km. 21 East Service Road, Sucat, Muntinlupa</td>
                </tr>
                <tr>
                        <th>Company Email</th>
                        <td><a href="mailto:lincktenterprises@rocketmail.com">lincktenterprises@rocketmail.com</a></td>
                </tr>
                <tr>
                        <th rowspan="6">Sales and Marketing Department</th>
                        <td><strong>Pinky Evangelista</strong></td>
                </tr>
                <tr>
                        <td><a href="mailto:pink.evangelista@y7mail.com">pink.evangelista@y7mail.com</a></td>
                </tr>
                <tr>
                        <td>(02)502-0925 <br /> 09228152944 <br /> 09178152944 </td>
                </tr>
                <tr>
                        <td><strong>Gemma Largado</strong></td>
                </tr>
                <tr>
                        <td><a href="mailto:largado_gemma@yahoo.com">largado_gemma@yahoo.com</a></td>
                </tr>
                <tr>
                        <td>09291239995 <br /> 09167963036</td>
                </tr>
        </table>
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?hl=fil&amp;q=tribeca+sucat&amp;ie=UTF8&amp;hq=tribeca+sucat&amp;hnear=Lungsod+Quezon,+Kalakhang+Maynila&amp;ll=14.447444,121.047485&amp;spn=0.003169,0.003449&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=10892465412984406376&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.ph/maps?hl=fil&amp;q=tribeca+sucat&amp;ie=UTF8&amp;hq=tribeca+sucat&amp;hnear=Lungsod+Quezon,+Kalakhang+Maynila&amp;ll=14.447444,121.047485&amp;spn=0.003169,0.003449&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=10892465412984406376&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
</center>

<h1>Send us an Email</h1>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>