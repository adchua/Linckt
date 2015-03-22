<?php

/**
 * This is the model class for table "delivery_transaction".
 *
 * The followings are the available columns in table 'delivery_transaction':
 * @property integer $id
 * @property string $delivery_date
 * @property string $delivery_status
 * @property integer $lincktemp_id
 * @property integer $purchase_order_id
 *
 * The followings are the available model relations:
 * @property Users $lincktemp
 * @property PurchaseOrder $purchaseOrder
 */
class DeliveryTransaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'delivery_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('delivery_date, delivery_status, lincktemp_id, purchase_order_id', 'required'),
			array('lincktemp_id, purchase_order_id', 'numerical', 'integerOnly'=>true),
			array('delivery_status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, delivery_date, delivery_status, lincktemp_id, purchase_order_id', 'safe', 'on'=>'search'),
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
			'lincktemp' => array(self::BELONGS_TO, 'Users', 'lincktemp_id'),
			'purchaseOrder' => array(self::BELONGS_TO, 'PurchaseOrder', 'purchase_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'delivery_date' => 'Arraival Date',
			'delivery_status' => 'Delivery Status',
			'lincktemp_id' => 'Employee',
			'purchase_order_id' => 'Purchase Order',
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
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('delivery_status',$this->delivery_status,true);
		$criteria->compare('lincktemp_id',$this->lincktemp_id);
		$criteria->compare('purchase_order_id',$this->purchase_order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DeliveryTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
