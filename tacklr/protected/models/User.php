<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $userID
 * @property integer $groupID
 * @property string $username
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property string $imageURL
 * @property string $gender
 * @property string $DOB
 * @property string $email
 * @property string $telephone
 * @property integer $active
 * @property string $activeKey
 * @property string $updateDate
 * @property string $joinDate
 *
 * The followings are the available model relations:
 * @property Board[] $boards
 * @property Follow[] $follows
 * @property Link[] $links
 * @property Message[] $messages
 * @property Message[] $messages1
 * @property Group $group
 */
class User extends CActiveRecord
{
	public $password_repeat;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('groupID, active', 'numerical', 'integerOnly'=>true),
			array('username, password, activeKey', 'length', 'max'=>125),
			array('firstName, lastName, imageURL', 'length', 'max'=>255),
			array('gender', 'length', 'max'=>10),
			array('email, telephone', 'length', 'max'=>50),
			array('DOB, joinDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userID, groupID, username, password, firstName, lastName, imageURL, gender, DOB, email, telephone, active, activeKey, updateDate, joinDate', 'safe', 'on'=>'search'),
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
			'boards' => array(self::HAS_MANY, 'Board', 'userID'),
			'follows' => array(self::HAS_MANY, 'Follow', 'userID'),
			'links' => array(self::HAS_MANY, 'Link', 'userID'),
			'messages' => array(self::HAS_MANY, 'Message', 'senderID'),
			'messages1' => array(self::HAS_MANY, 'Message', 'receiverID'),
			'group' => array(self::BELONGS_TO, 'Group', 'groupID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userID' => 'User',
			'groupID' => 'Group',
			'username' => 'Username',
			'password' => 'Password',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'imageURL' => 'Image Url',
			'gender' => 'Gender',
			'DOB' => 'Dob',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'active' => 'Active',
			'activeKey' => 'Active Key',
			'updateDate' => 'Update Date',
			'joinDate' => 'Join Date',
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

		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('groupID',$this->groupID);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('imageURL',$this->imageURL,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('activeKey',$this->activeKey,true);
		$criteria->compare('updateDate',$this->updateDate,true);
		$criteria->compare('joinDate',$this->joinDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
