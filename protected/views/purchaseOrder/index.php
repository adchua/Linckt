<?php
/* @var $this PurchaseOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Orders',
);
if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular" ){
$this->menu=array(
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
}else{
    
}
?>

<h1>Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
      'sortableAttributes'=>array('id', 'podate' , 'status')
)); ?>
