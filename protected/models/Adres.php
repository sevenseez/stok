<?php

/**
 * This is the model class for table "adres".
 *
 * The followings are the available columns in table 'adres':
 * @property integer $id
 * @property string $firma_adi
 * @property string $firma_yetkili
 * @property string $yetkilinin_konumu
 * @property string $firma_adresi
 * @property string $firma_telefonu
 * @property string $firma_fax
 * @property string $firma_web_sitesi
 * @property string $e_mail
 * @property string $gsm
 */
class Adres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'adres';
	}
        
        public function getDbConnection()
            {
                return self::$db=Yii::app()->db_adres;
            }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firma_adi, firma_yetkili, firma_web_sitesi, e_mail', 'length', 'max'=>100),
			array('yetkilinin_konumu', 'length', 'max'=>150),
			array('firma_adresi', 'length', 'max'=>250),
			array('firma_telefonu, firma_fax, gsm', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, firma_adi, firma_yetkili, yetkilinin_konumu, firma_adresi, firma_telefonu, firma_fax, firma_web_sitesi, e_mail, gsm', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'firma_adi' => 'Firma Adi',
			'firma_yetkili' => 'Firma Yetkili',
			'yetkilinin_konumu' => 'Yetkilinin Konumu',
			'firma_adresi' => 'Firma Adresi',
			'firma_telefonu' => 'Firma Telefonu',
			'firma_fax' => 'Firma Fax',
			'firma_web_sitesi' => 'Firma Web Sitesi',
			'e_mail' => 'E Mail',
			'gsm' => 'Gsm',
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
		$criteria->compare('firma_adi',$this->firma_adi,true);
		$criteria->compare('firma_yetkili',$this->firma_yetkili,true);
		$criteria->compare('yetkilinin_konumu',$this->yetkilinin_konumu,true);
		$criteria->compare('firma_adresi',$this->firma_adresi,true);
		$criteria->compare('firma_telefonu',$this->firma_telefonu,true);
		$criteria->compare('firma_fax',$this->firma_fax,true);
		$criteria->compare('firma_web_sitesi',$this->firma_web_sitesi,true);
		$criteria->compare('e_mail',$this->e_mail,true);
		$criteria->compare('gsm',$this->gsm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=> 10,
                            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Adres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
