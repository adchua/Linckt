<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $ufirstname
 * @property string $uminitial
 * @property string $ulastname
 * @property string $usertype
 * @property string $emp_username
 * @property string $upassword
 * @property integer $company_id
 *
 * The followings are the available model relations:
 * @property DeliveryTransaction[] $deliveryTransactions
 * @property PaymentReceipt[] $paymentReceipts
 * @property Products[] $products
 * @property PurchaseOrder[] $purchaseOrders
 * @property PurchaseOrder[] $purchaseOrders1
 * @property SalesInvoice[] $salesInvoices
 * @property ClientCompany $company
 */
class Users extends CActiveRecord
{
    //Password Validation
    public function validatePassword($password){
        return
        CPasswordHelper::verifyPassword($password,  $this->upassword);
    }
    
    public function hashPassword($password){
        return CPasswordHelper::hashPassword($password);
    }
	/**
	 * @return string the associated database table name
	 */
	public function getFullName()
	{
		return $this->ulastname . ", ". $this->ufirstname. " ".$this->uminitial ;
	}
        
        public function getFullCompany()
	{
            
             $en= ClientCompany::model()->findAll('id = :a', array(':a'=>$this->company_id));
 if (count($en) !== 0){

 foreach ($en as $row) {
		return $row->companyname ;
                
                 }}
	}
        
//        public function getCompanyName()
//	{
//		return $this->company->companyname  ;
//	}
//        

        public function beforeSave(){
            $this->upassword = hash_hmac('sha256',  $this->upassword, Yii::app()->params['encryptionKey']);
            return parent::beforeSave();
        }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('ufirstname, ulastname, usertype, emp_username, upassword', 'required'),
			array('company_id', 'numerical', 'integerOnly'=>true),
			array('ufirstname, uminitial, ulastname, usertype, emp_username, upassword', 'length', 'max'=>45),
                         array('upassword', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ufirstname, uminitial, ulastname, usertype, emp_username, upassword, company_id', 'safe', 'on'=>'search'),
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
			'deliveryTransactions' => array(self::HAS_MANY, 'DeliveryTransaction', 'lincktemp_id'),
			'paymentReceipts' => array(self::HAS_MANY, 'PaymentReceipt', 'linckt_employee_id'),
			'products' => array(self::HAS_MANY, 'Products', 'supplier_id'),
			'purchaseOrders' => array(self::HAS_MANY, 'PurchaseOrder', 'lincktemp_id'),
			'purchaseOrders1' => array(self::HAS_MANY, 'PurchaseOrder', 'client_id'),
			'salesInvoices' => array(self::HAS_MANY, 'SalesInvoice', 'lincktemp_id'),
			'company' => array(self::BELONGS_TO, 'ClientCompany', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ufirstname' => 'Firstname',
			'uminitial' => 'Middle Initial',
			'ulastname' => 'Lastname',
			'usertype' => 'Usertype',
			'emp_username' => 'Username',
			'upassword' => 'Password',
			'company_id' => 'Company',
                    'fullname' => 'FullName',
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
		$criteria->compare('ufirstname',$this->ufirstname,true);
		$criteria->compare('uminitial',$this->uminitial,true);
		$criteria->compare('ulastname',$this->ulastname,true);
		$criteria->compare('usertype',$this->usertype,true);
		$criteria->compare('emp_username',$this->emp_username,true);
		$criteria->compare('upassword',$this->upassword,true);
		//$criteria->compare('company_id',$this->company_id);
                
                $criteria->compare('t.id',$this->id);
		$criteria->compare('company.companyname',$this->company_id, true);
	
			//load the related table at the same time:
			$criteria->with=array('company');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
