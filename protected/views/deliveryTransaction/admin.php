<?php
/* @var $this DeliveryTransactionController */
/* @var $model DeliveryTransaction */

$this->breadcrumbs=array(
	'Delivery Transactions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Delivery', 'url'=>array('index')),
	array('label'=>'Create Delivery', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#delivery-transaction-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Delivery</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'delivery-transaction-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
              array('name'=>'id', 'header'=>'id', 'type'=>'raw',
		  'value'=>'CHtml::link($data->id, array("deliveryTransaction/view", "id"=>$data->id))'),
		'delivery_date',
		'delivery_status',
		'purchase_order_id',
            
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
