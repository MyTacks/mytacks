<?php

/**
 * This is the model class for table "tbl_tack".
 *
 * The followings are the available columns in table 'tbl_tack':
 * @property string $tackID
 * @property string $userID
 * @property integer $boardID
 * @property integer $isPrivate
 * @property string $tackName
 * @property string $tackURL
 * @property string $imageURL
 * @property string $tackDescription
 * @property string $updateDate
 * @property string $createDate
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Board $board
 */
class Tack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tack';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tackName, tackURL, tackDescription', 'required'),
			array('boardID, isPrivate', 'numerical', 'integerOnly'=>true),
			array('userID', 'length', 'max'=>20),
			array('tackURL, imageURL', 'length', 'max'=>255),
			array('createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tackID, userID, boardID, isPrivate, tackName, tackURL, imageURL, tackDescription, updateDate, createDate', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'userID'),
			'board' => array(self::BELONGS_TO, 'Board', 'boardID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tackID' => 'Tack',
			'userID' => 'User',
			'boardID' => 'Board',
			'isPrivate' => 'Private',
			'tackName' => 'Tack Name',
			'tackURL' => 'Tack Url',
			'imageURL' => 'Image Url',
			'tackDescription' => 'Tack Description',
			'updateDate' => 'Update Date',
			'createDate' => 'Create Date',
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

		$criteria->compare('tackID',$this->tackID,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('boardID',$this->boardID);
		$criteria->compare('isPrivate',$this->isPrivate);
		$criteria->compare('tackName',$this->tackName,true);
		$criteria->compare('tackURL',$this->tackURL,true);
		$criteria->compare('imageURL',$this->imageURL,true);
		$criteria->compare('tackDescription',$this->tackDescription,true);
		$criteria->compare('updateDate',$this->updateDate,true);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getIsPrivateOptions()
    {
        return array('1' => 'Yes', '0' => 'No');
    }
}
