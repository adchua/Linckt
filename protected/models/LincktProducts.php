<?php

/**
 * This is the model class for table "linckt_products".
 *
 * The followings are the available columns in table 'linckt_products':
 * @property integer $id
 * @property string $linckt_unitprice
 * @property string $products_pcode
 * @property integer $productunit_id
 *
 * The followings are the available model relations:
 * @property Products $productsPcode
 * @property Productunit $productunit
 */
class LincktProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linckt_products';
	}
        
         public function getUnitType()
	{
            
             $en= Productunit::model()->findAll('id = :a', array(':a'=>$this->productunit_id));
 if (count($en) !== 0){

 foreach ($en as $row) {
		return $row->productunit ;
                
                 }}
	}
        

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('linckt_unitprice, products_pcode, productunit_id', 'required'),
			array('productunit_id', 'numerical', 'integerOnly'=>true),
			array('linckt_unitprice', 'length', 'max'=>9),
			array('products_pcode', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, linckt_unitprice, products_pcode, productunit_id', 'safe', 'on'=>'search'),
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
			'productsPcode' => array(self::BELONGS_TO, 'Products', 'products_pcode'),
			'productunit' => array(self::BELONGS_TO, 'Productunit', 'productunit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'linckt_unitprice' => 'Linckt Unitprice',
			'products_pcode' => 'Products Pcode',
			'productunit_id' => 'Productunit',
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
		$criteria->compare('linckt_unitprice',$this->linckt_unitprice,true);
		$criteria->compare('products_pcode',$this->products_pcode,true);
		$criteria->compare('productunit_id',$this->productunit_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LincktProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
