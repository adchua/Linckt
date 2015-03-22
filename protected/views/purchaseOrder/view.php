<?php
/* @var $this PurchaseOrderController */
/* @var $model PurchaseOrder */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id,
);
if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"  ){
$this->menu=array(
	array('label'=>'List of Order', 'url'=>array('index')),
	//array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update this Order', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete this Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
              array('label'=>'Create Order', 'url'=>array('purchaseOrderLine/create','id'=>$model->id)),
);
}else  if(Yii::app()->user->type==="Client" ){
    $this->menu=array(
	array('label'=>'Update this Order', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Create Order', 'url'=>array('purchaseOrderLine/create','id'=>$model->id)),
	
        );
}else{
    $this->menu=array(
	array('label'=>'List of Order', 'url'=>array('index')),
	//array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update this Order', 'url'=>array('update', 'id'=>$model->id)),
	
        );
}
?>

<h1>Purchase Order of <?php echo $model->client->FullName; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Client Name', 'value'=>$model->client->FullName),
		'podate',
		'status',
		
	),
)); ?>


<h4>Your Order/s </h4>

 <?php $criteria=new CDbCriteria (); 
       
 
    $criteria->alias = 'PurchaseOrderline';
            $criteria->join='INNER JOIN Productunit ON  PurchaseOrderline.productunit = Productunit.id';
            $criteria->condition='PurchaseOrderline.purchase_order_id = :id'  ;
            $criteria->params = array(':id' => Yii::app()->getRequest()->getQuery('id'));
         
   ?>
        <?php $en3= PurchaseOrderline::model()->findAll($criteria);?>
<?php foreach ($en3 as $row1) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row1,
	'attributes'=>array(
		array('label'=>'Product Name', 'value'=>$row1->productsPcode->ProductName),
		array('label'=>'Unit Type', 'value'=>$row1->productunit0->productunit),
                array('label'=>'Quantity', 'value'=>$row1->po_orderproductqty),
                array('label'=>'Total Amount', 'value'=>$row1->productunitcost),
	),
));?>


<?php } ?>
