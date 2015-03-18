<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property integer $auth
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
         public $fullName;
	public function tableName()
	{
		return 'users';
	}
        
        public function getDbConnection()
          {
              return self::$db=Yii::app()->db;
          }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, lastname, username, password, auth', 'required','message'=>'Bu alanlar zorunludur.'),
			array('auth', 'numerical', 'integerOnly'=>true,'message'=>'Bu alan yalnızca rakamlardan oluşmalıdır.'),
			array('name, lastname, username, password', 'length', 'max'=>20,'tooLong'=>'Bu alanda 20 karakter sınırlaması vardır'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name,  lastname, fullName, username, password, auth', 'safe', 'on'=>'search'),
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
			'name' => 'Ad',
			'lastname' => 'Soyad',
			'username' => 'Kullanıcı Adı',
			'password' => 'Şifre',
			'auth' => 'Yetki',
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
                $criteria->compare('CONCAT(name, \' \', lastname)',$this->fullName,true);            
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('auth',$this->auth);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
      /*  public function behaviors()
        {
            return array(
                // Classname => path to Class
                'ActiveRecordLogableBehavior'=>
                    'application.components.ActiveRecordLogableBehavior',
            );
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
