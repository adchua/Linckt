<?php

/**
 * This is the model class for table "purchase_order".
 *
 * The followings are the available columns in table 'purchase_order':
 * @property integer $id
 * @property string $podate
 * @property string $status
 * @property integer $lincktemp_id
 * @property integer $client_id
 *
 * The followings are the available model relations:
 * @property DeliveryTransaction[] $deliveryTransactions
 * @property Users $lincktemp
 * @property Users $client
 * @property PurchaseOrderline[] $purchaseOrderlines
 * @property SalesInvoice[] $salesInvoices
 */
class PurchaseOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchase_order';
	}

       
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('podate, status, client_id', 'required'),
			array('client_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, podate, status, client_id', 'safe', 'on'=>'search'),
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
			'deliveryTransactions' => array(self::HAS_MANY, 'DeliveryTransaction', 'purchase_order_id'),
			'client' => array(self::BELONGS_TO, 'Users', 'client_id'),
			'purchaseOrderlines' => array(self::HAS_MANY, 'PurchaseOrderline', 'purchase_order_id'),
			'salesInvoices' => array(self::HAS_MANY, 'SalesInvoice', 'purchase_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'podate' => 'Order Date',
			'status' => 'Status',
			'client_id' => 'Client Name',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('podate',$this->podate,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('client_id',$this->client_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PurchaseOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
