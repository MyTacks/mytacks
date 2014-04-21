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
    public function __construct($type)
    {
        parent::__construct();
        $this->tackType = $type;
    }
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
			array('userID', 'numerical'),
            array('tackURL', 'length', 'max'=>255),
            array('tackType', 'length', 'max'=>255),
			//array('createDate, updateDate', 'default',),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('tackID, userID, boardID, isPrivate, tackName, tackURL, tackImage, tackDescription, updateDate, createDate', 'safe', 'on'=>'search'),
            //array('tackID, userID, boardID, isPrivate, tackName, tackURL, tackImage, tackDescription, updateDate, createDate', 'safe', 'on'=>'insert'),
            //array('tackID, userID, boardID, isPrivate, tackName, tackURL, tackImage, tackDescription, updateDate, createDate', 'safe', 'on'=>'update'),
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
            'tackURL' => 'Tack URL',
            'tackType' => 'Tack Type',
			'tackImage' => 'Tack Image',
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
        $criteria->compare('tackType',$this->tackType,true);
		$criteria->compare('tackImage',$this->tackImage,true);
		$criteria->compare('tackDescription',$this->tackDescription,true);
		$criteria->compare('updateDate',$this->updateDate,true);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function get_type()
    {
        return $this->tackType;
    }
    public function toHtml($isOwner=false)
    {
        /*
        $html = "";
        if($this->imageURL !== null)
            $html = "<img src=>".$this->imageURL."</img>";

        $html .= "<div class='caption'>";
        $html .= "<a tack link>";
        $html .= "<a href=tackURL><h5>Link</h5></a></div>";
        return $html;
        */
        $pre = "<div class='user_tack' onclick='setOnTop()' id='".$this->tackID."' style=' position:relative;'>\n";
        if($isOwner)
        {
            $pre .=  CHtml::link('X',array('tack/delete', 'id'=>$this->tackID));
        }
        $pre .= "\t<div class='tack_title' id='".$this->tackName."'>\n";
        $pre .= $this->tackName."\n</div>\n";
        /// @todo add tack type! maybe make it widget type...
        $pre .= "\t\t<div class='tack_content'>\n";
        //$html = "";
        $post = "</div>\n<div class='tack_feedback'>\n";
        $post .= $this->getFeedbackAsHtml()."</div>";
        $post .= "</div>";
        return array('preContent'=>$pre, 'content'=>$this->get_widget(), 'postContent'=>$post);

    }

    public function getFeedbackAsHtml()
    {
        return "";
    }

    public function has_widget()
    {
        return ($this->tackType == 'ext.Yiitube');
    }

    public function get_widget()
    {
        if($this->tackType == 'ext.Yiitube')
        {
            return array('widget_type'=>$this->tackType, 'widget_properties'=>array('v'=>$this->tackURL, 'size'=>'small'));
        }
        else if ($this->tackType == 'image')
        {
            return '<a href='.$this->tackURL.'><img class="tack_content" src='.$this->tackURL.' /></a>';
        }
        else
        {
            return '<div class="tack_content" align="center"><a href='.$this->tackURL.'>'.$this->tackName.'</a></div>';
        }
    }

    public static function youtubeToHref($vid)
    {
        return "https://youtube.com/embed/".$vid;
    }

    public static function get_css()
    {
        $css = "<style type='text/css'>\n";
        $css .= ".user_tack {\n";
        $css .= "position: absolute;\n";
        $css .= "float: right|bottom;\n";
        $css .= "color: grey;\n";
        $css .= "border: 4px solid darkblue;\n";
        $css .= "padding: 6px;\n";
        $css .= "overflow: hidden;\n";
        $css .= "}\n";
        $css .= ".tack_title {\n";
        $css .= "text-align: center;\n";
        $css .= "}\n";
        $css .= ".tack_content {\n";
        $css .= "text-align: center;\n";
        $css .= "width: 100%;\n";
        $css .= "height: 100%;\n";
        $css .= "float: bottom|right;\n";
        $css .= "}\n";
        $css .= ".tack_feedback {\n";
        $css .= "text-align: center;\n";
        $css .= "float: bottom;\n";
        $css .= "}\n";
        $css .= "</style>\n";

        return $css;
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
