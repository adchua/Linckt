<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);
 if(Yii::app()->user->type==="Admin"){
$this->menu=array(
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
    array('label'=>'Create Linckt Products', 'url'=>array('lincktProducts/create')),
);
}else{
    $this->menu=array(
	array('label'=>'Create Products', 'url'=>array('create')),
); 
 }
?>

<h1>Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
      'sortableAttributes'=>array('pname', 'pcode')
)); ?>
