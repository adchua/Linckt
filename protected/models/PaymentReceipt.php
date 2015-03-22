<?php

/**
 * This is the model class for table "payment_receipt".
 *
 * The followings are the available columns in table 'payment_receipt':
 * @property integer $id
 * @property double $pr_amount
 * @property string $pr_receipttpye
 * @property string $pr_date
 * @property string $or_number
 * @property string $pr_paymenttype

 * @property integer $linckt_employee_id
 * @property integer $client_company_id
 * @property integer $sales_invoice_id
 *  * @property string $py_pic
 * @property string $fileType
 *
 * The followings are the available model relations:
 * @property ClientCompany $clientCompany
 * @property Users $lincktEmployee
 * @property SalesInvoice $salesInvoice
 */
class PaymentReceipt extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_receipt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                     array('py_pic', 'required'),
			array('fileType', 'length', 'max'=>45),
                     array('py_pic', 'file',
					'types'=>'jpg, gif, png, bmp, jpeg',
						'maxSize'=>1024 * 1024 * 10, // 10MB
							'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
						'allowEmpty' => true
	         ),
                    
                    
                    
			array('pr_amount, pr_date, linckt_employee_id, client_company_id,fileType, sales_invoice_id , pr_status', 'required'),
			array('linckt_employee_id, client_company_id, sales_invoice_id', 'numerical', 'integerOnly'=>true),
			array('pr_amount', 'numerical'),
			array('pr_receipttpye, pr_date, or_number, pr_paymenttype,fileType', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pr_amount, pr_receipttpye, pr_date, or_number, pr_paymenttype, linckt_employee_id, client_company_id, sales_invoice_id', 'safe', 'on'=>'search'),
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
			'ClientCompany' => array(self::BELONGS_TO, 'ClientCompany', 'client_company_id'),
			'Users' => array(self::BELONGS_TO, 'Users', 'linckt_employee_id'),
			'SalesInvoice' => array(self::BELONGS_TO, 'SalesInvoice', 'sales_invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pr_amount' => 'Balance',
			'pr_receipttpye' => 'Receipt Type',
			'pr_date' => 'Payment Deadline',
			'or_number' => 'Transaction Number',
			'pr_paymenttype' => 'Payment Type',
			'linckt_employee_id' => 'Employee',
			'client_company_id' => 'Client Company',
			'sales_invoice_id' => 'Sales Invoice',
                      'pr_status' => 'Payment Status',
                         'py_pic' => 'Receipt Picture',
			'fileType' => 'File Type',
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
		$criteria->compare('pr_amount',$this->pr_amount);
		$criteria->compare('pr_receipttpye',$this->pr_receipttpye,true);
		$criteria->compare('pr_date',$this->pr_date,true);
		$criteria->compare('or_number',$this->or_number,true);
		$criteria->compare('pr_paymenttype',$this->pr_paymenttype,true);
		$criteria->compare('linckt_employee_id',$this->linckt_employee_id);
		$criteria->compare('client_company_id',$this->client_company_id);
		$criteria->compare('sales_invoice_id',$this->sales_invoice_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentReceipt the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
