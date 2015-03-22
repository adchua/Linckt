<?php
/* @var $this LincktProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Linckt Products',
);
if(Yii::app()->user->type==="Admin" ||Yii::app()->user->type==="Regular"){
$this->menu=array(
	array('label'=>'Create Linckt Products', 'url'=>array('create')),
);
}else{
    
}
?>

<h1>Linckt Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
