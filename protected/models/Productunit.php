<?php

/**
 * This is the model class for table "productunit".
 *
 * The followings are the available columns in table 'productunit':
 * @property integer $id
 * @property string $productunit
 * @property string $productunitprice
 * @property string $pcode
 *
 * The followings are the available model relations:
 * @property Products $pcode0
 */
class Productunit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productunit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' productunit, productunitprice, pcode', 'required'),
			
			array('productunit, pcode', 'length', 'max'=>45),
			array('productunitprice', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, productunit, productunitprice, pcode', 'safe', 'on'=>'search'),
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
			'pcode0' => array(self::BELONGS_TO, 'Products', 'pcode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'productunit' => 'Product Unit',
			'productunitprice' => 'Price',
			'pcode' => 'Pcode',
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
		$criteria->compare('productunit',$this->productunit,true);
		$criteria->compare('productunitprice',$this->productunitprice,true);
		$criteria->compare('pcode',$this->pcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productunit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
