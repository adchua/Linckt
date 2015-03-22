<?php
/* @var $this UsersController */
/* @var $model Users */



 if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"){
    $this->menu=array(  
	array('label'=>'Create Users', 'url'=>array('clientCompany/create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
         array('label'=>'Generate Report', 'url'=>array('pdf', 'id'=>$model->id )),
);
} else{
     $this->menu=array(  
    array('label'=>'Update My Profile', 'url'=>array('update', 'id'=>$model->id)),
         );
}


?>

<h1> <?php echo $model->FullName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array('label'=>'Full Name', 'value'=>$model->FullName),
		'usertype',
		'emp_username',
		'upassword',
	),
)); ?>
<br>



<?php $en=ClientCompany::model()->findAll('id = :a', array(':a'=>$model->company_id));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Company Information </h4>
<?php foreach ($en as $row) { ?>
<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', 
array('clientCompany/update', 'id'=>$row->id)); ?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		
		array('label'=>'Name', 'value'=>$row->companyname),
                array('label'=>'Address', 'value'=>$row->companyaddress),
                array('label'=>'Type', 'value'=>$row->companytype),
	),
));}}?>

<?php if(Yii::app()->user->type==="Client"){ 
    $id=Yii::app()->user->id;
    ?>


    <?php $en=PurchaseOrder::model()->findAll('client_id= :a', array(':a'=>$id));?>
<?php if (count($en) !== 0){
$i = 0;?>
<br>

<h4>Order/s </h4>
<?php foreach ($en as $row) { ?>
    


<?php 
echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/delete.png" align="right"/>',
	'#', array('submit'=>array('purchaseOrder/delete','id'=>$row->id),'confirm' => 'Are you sure you want to delete?'));
    $i++; echo'<h3>' .$i . '.'. CHtml::link($row->podate, array('purchaseOrder/view', 'id'=>$row->id)).'</h3>';


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		
		//'podate',
		//'status',
	),
));}}}?>
