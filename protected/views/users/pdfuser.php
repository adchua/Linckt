<?php
/* @var $this ConfirmationController */
/* @var $model Confirmation */

$this->breadcrumbs=array(
	'Confirmations'=>array('index'),
       // 'Conf Godparents'=>array('index'),
	$model->id,
   
);

$this->menu=array(
	array('label'=>'Generate Report', 'url'=>array('pdf', 'id'=>$model->id)),
 
);
?>

<br><br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array('label'=>'Representative', 'value'=>$model->FullName),
	
	),
)); ?>

<?php $en=ClientCompany::model()->findAll('id = :a', array(':a'=>$model->company_id));?>
<?php if (count($en) !== 0){?>
<?php foreach ($en as $row) { ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		
		array('label'=>'Company Name', 'value'=>$row->companyname),
                array('label'=>'Address', 'value'=>$row->companyaddress),
                array('label'=>'Type', 'value'=>$row->companytype),
	),
));}}?>

<br><br>


<center>
    
    <h2>My Order/s</h2>
<table border="1">
   <tr> <th>Order Date</th>
    <th>Status</th>
    <th>Product Name</th>
    <th>Unit Type</th>
    <th>Quantity</th>
    <th>Amount</th></tr>
    
   <tr>  <td>
        <?php $en=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($en) !== 0){?>
<?php foreach ($en as $row1) { ?>

                    <div style="font-size:16px;color:#000000;font-family:Times New Roman; text-align:right;">
				<?php echo $row1->podate ; ?> 
			</div>  
<?php }} ?>
        </td>
   <td>
        <?php $en=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($en) !== 0){?>
<?php foreach ($en as $row1) { ?>

                    <div style="font-size:16px;color:#000000;font-family:Times New Roman; text-align:right;">
				<?php echo $row1->status ; ?> 
			</div>  
<?php }} ?>
        </td>
       
        
        <td>
           
             <?php $en1=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($en1) !== 0){?>
    <?php foreach ($en1 as $row2) { ?>
<?php $en2= PurchaseOrderline::model()->findAll('purchase_order_id = :a', array(':a'=>$row2->id));?>
    <?php foreach ($en2 as $result) { ?>
            <div style="font-size:11px;color:#000000;font-family:Times New Roman; text-align:right;">
            <?php echo $result->productsPcode->ProductName ; ?> 
             </div>
            
<?php }} }?>
            
            
        </td>
        
         <td> 
              <?php $en1=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
              <?php foreach ($en1 as $row2) { ?>
             <?php $criteria=new CDbCriteria (); 
    $criteria->alias = 'PurchaseOrderline';
            $criteria->join='INNER JOIN Productunit ON  PurchaseOrderline.productunit = Productunit.id';
            $criteria->condition='PurchaseOrderline.purchase_order_id = :id'  ;
            $criteria->params = array(':id' => $row2->id);
         
   ?>
            
        <?php $en3= PurchaseOrderline::model()->findAll($criteria);?>
    <?php foreach ($en3 as $result) { ?>
             <div style="font-size:12px;color:#000000;font-family:Times New Roman; ">
            <?php echo $result->productunit0->productunit ; ?> 
             </div>
    <?php }}?> 
        </td>
        
         <td> <?php $en1=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($en1) !== 0){?>
    <?php foreach ($en1 as $row2) { ?>
<?php $en2= PurchaseOrderline::model()->findAll('purchase_order_id = :a', array(':a'=>$row2->id));?>
    <?php foreach ($en2 as $result) { ?>
             <div style="font-size:14px;color:#000000;font-family:Times New Roman;">
            <?php echo $result->po_orderproductqty ; ?> 
             </div>
<?php }} }?> 
        </td>
        
        <td> <?php $en1=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($en1) !== 0){?>
    <?php foreach ($en1 as $row2) { ?>
<?php $en2= PurchaseOrderline::model()->findAll('purchase_order_id = :a', array(':a'=>$row2->id));?>
    <?php foreach ($en2 as $result) { ?>
             <div style="font-size:14px;color:#000000;font-family:Times New Roman;">
            <?php echo $result->productunitcost ; ?> 
             </div>
<?php }} ?> 
        </td>
        <?php }?>
        
   </tr>
   <tr><td>
       Total
       </td>
       <td colspan="6" style="text-align: right;"> <?php $en1=  PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($en1) !== 0){?>
    <?php foreach ($en1 as $row2) { ?>
<?php $en2= PurchaseOrderline::model()->findAll('purchase_order_id = :a', array(':a'=>$row2->id));?>
    <?php foreach ($en2 as $result) { ?>
             <div style="font-size:14px;color:#000000;font-family:Times New Roman;">
            <?php $sum += $result->productunitcost ;   ?> 
            
          
             </div>
<?php  }} 
  
        echo $sum    
?> 
        </td>
        <?php }?>
   </tr>
     
</table>
</center>



<?php $a= PurchaseOrder::model()->findAll('client_id = :a', array(':a'=>$model->id));?>
<?php if (count($a) !== 0){?>
<?php foreach ($a as $order1) {?>
    

<?php $en= SalesInvoice::model()->findAll('purchase_order_id = :a', array(':a'=>$order1->id));?>

<?php if (count($en) !== 0){?>
<?php foreach ($en as $order2) {?>
  
<?php $en= PaymentReceipt::model()->findAll('sales_invoice_id = :a', array(':a'=>$order2->id));?>

<?php if (count($en) !== 0){?>
<h4>Payment </h4>
<?php foreach ($en as $order3) { ?>
    
    
   <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$order3,
	'attributes'=>array(
          'id',
                array('label'=>'Client Company', 'value'=>$order3->ClientCompany->companyname),
              'or_number',
            'pr_paymenttype',
            'pr_receipttpye',
		'pr_status',
            'pr_amount',
		'pr_date',
		'sales_invoice_id',
            
            
	),
)); ?> <br> <?php }}}}}} ?>



    
        





