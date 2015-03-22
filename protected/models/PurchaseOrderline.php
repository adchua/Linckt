<?php

/**
 * This is the model class for table "purchase_orderline".
 *
 * The followings are the available columns in table 'purchase_orderline':
 * @property integer $id
 * @property integer $po_orderproductqty
 * @property stringinteger $productunit
 * @property string $productunitcost
 * @property integer $purchase_order_id
 * @property string $products_pcode
 * The followings are the available model relations:
 * @property Products $productsPcode
 * @property PurchaseOrder $purchaseOrder
 */
class PurchaseOrderline extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchase_orderline';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('po_orderproductqty, productunit, productunitcost, purchase_order_id, products_pcode', 'required'),
			array('po_orderproductqty, productunit, purchase_order_id', 'numerical', 'integerOnly'=>true),
			array(' products_pcode', 'length', 'max'=>45),
			array('productunitcost', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('po_orderproductqty, productunit, productunitcost, purchase_order_id, products_pcode', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                        'productunit0' => array(self::BELONGS_TO, 'Productunit', 'productunit'),
			'productsPcode' => array(self::BELONGS_TO, 'Products', 'products_pcode'),
			'purchaseOrder' => array(self::BELONGS_TO, 'PurchaseOrder', 'purchase_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'po_orderproductqty' => 'Quantity',
			'productunit' => 'Unit Type',
			'productunitcost' => 'Total Amount',
			'purchase_order_id' => 'Order Id',
			'products_pcode' => 'Pcode',
                       
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('po_orderproductqty',$this->po_orderproductqty);
		$criteria->compare('productunit',$this->productunit,true);
		$criteria->compare('productunit',$this->productunit);
		$criteria->compare('purchase_order_id',$this->purchase_order_id);
		$criteria->compare('products_pcode',$this->products_pcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PurchaseOrderline the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
