<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property string $pcode
 * @property string $pname
 * @property string $pcategory
 * @property string $pdescription
 * @property integer $supplier_id
 * * @property string $p_pic
 * @property string $fileType
 *
 * The followings are the available model relations:
 * @property Users $supplier
 * @property Productunit[] $productunits
 * @property PurchaseOrderline[] $purchaseOrderlines
 */
class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}
        
        public function getProductName()
	{
		return  $this->supplier->ulastname." ".$this->pcode . " ". $this->pname ;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    
                    array('p_pic', 'required'),
			array('fileType', 'length', 'max'=>45),
                     array('p_pic', 'file',
					'types'=>'jpg, gif, png, bmp, jpeg',
						'maxSize'=>1024 * 1024 * 10, // 10MB
							'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
						'allowEmpty' => true
	         ),
			array('pcode, pname, pcategory, pdescription,supplier_id, p_pic, fileType', 'required'),
			array('supplier_id', 'numerical', 'integerOnly'=>true),
			array('pcode, pname,pcategory, fileType', 'length', 'max'=>45),
			array('pdescription', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pcode, pname, pcategory, pdescription,supplier_id, p_pic, fileType', 'safe', 'on'=>'search'),
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
                        
			'supplier' => array(self::BELONGS_TO, 'Users', 'supplier_id'),
			'productunits' => array(self::HAS_MANY, 'Productunit', 'pcode'),
			'purchaseOrderlines' => array(self::HAS_MANY, 'PurchaseOrderline', 'products_pcode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pcode' => 'Pcode',
			'pname' => 'Product Name',
			'pcategory' => 'Category',
			'pdescription' => 'Description',
			'supplier_id' => 'Supplier',
                        'p_pic' => 'Products Picture',
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

		$criteria->compare('pcode',$this->pcode,true);
		$criteria->compare('pname',$this->pname,true);
		$criteria->compare('pcategory',$this->pcategory,true);
		$criteria->compare('pdescription',$this->pdescription,true);
		$criteria->compare('supplier_id',$this->supplier_id);
             
                $criteria->compare('p_pic',$this->p_pic,true);
		$criteria->compare('fileType',$this->fileType,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
