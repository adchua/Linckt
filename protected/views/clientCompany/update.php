<?php
/* @var $this ClientCompanyController */
/* @var $model ClientCompany */

$this->breadcrumbs=array(
	'Client Companies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
 if(Yii::app()->user->type==="Admin"){
$this->menu=array(
	array('label'=>'List ClientCompany', 'url'=>array('index')),
	array('label'=>'Create ClientCompany', 'url'=>array('create')),
	array('label'=>'View ClientCompany', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientCompany', 'url'=>array('admin')),
);
}else{
     
 }
?>

<h1>Update Your Company is <?php echo $model->companyname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>