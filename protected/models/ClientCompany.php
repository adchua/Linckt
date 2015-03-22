<?php

/**
 * This is the model class for table "client_company".
 *
 * The followings are the available columns in table 'client_company':
 * @property integer $id
 * @property string $companyname
 * @property string $companyaddress
 * @property string $companytype
 *
 * The followings are the available model relations:
 * @property PaymentReceipt[] $paymentReceipts
 * @property Users[] $users
 */
class ClientCompany extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('companyname, companyaddress, companytype', 'required'),
			array('companyname, companyaddress, companytype', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, companyname, companyaddress, companytype', 'safe', 'on'=>'search'),
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
			'paymentReceipts' => array(self::HAS_MANY, 'PaymentReceipt', 'client_company_id'),
                        'products' => array(self::HAS_MANY, 'Products', 'company_id'),
			'users' => array(self::HAS_MANY, 'Users', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'companyname' => 'Company Name',
			'companyaddress' => 'Company Address',
			'companytype' => 'Company Type',
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
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->compare('companyaddress',$this->companyaddress,true);
		$criteria->compare('companytype',$this->companytype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientCompany the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
