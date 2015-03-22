<?php
/* @var $this PurchaseOrderController */
/* @var $model PurchaseOrder */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"  ){
$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'View Order', 'url'=>array('view', 'id'=>$model->id)),

);
}else{
    $this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
        );
}
?>




<h1>Update Order of <?php echo $model->client->FullName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>