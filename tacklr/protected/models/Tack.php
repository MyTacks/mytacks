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
    public static function getCreatorModal($caller, $owner)
    {     

        $caller->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'newTack')
        );     

        echo "
        <div class='modal-header' align='center'>
            <a class='close' ata-dismiss='modal'>&times;</a>
            <h4>New tack</h4>
            ";
        $new_tack = new Tack(null);
            
        echo "
        </div>

        <div class='modal-body' align='center'>
            <div class='form'> ";
            $form=$caller->beginWidget('CActiveForm', array(
                    'id'=>'tack-form',
                    'action'=>'/mytacks/tacklr/tack/create/',
                    'method'=>'post',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                )); 
                echo
                "
                <p class='note'>Fields with <span class='required'>*</span> are required.</p>
                ";

                echo $form->errorSummary($new_tack);

                echo 
                "
                <div class='row'>
                ";
                echo $form->labelEx($new_tack,'tackName');
                echo $form->textField($new_tack,'tackName',array('size'=>60, 'maxLength'=>50));
                echo $form->error($new_tack,'tackName');
                echo 
                "
                </div>
                ";
                echo 
                "
                <div class='row'>
                ";
                echo $form->labelEx($new_tack,'tackURL');
                echo $form->textField($new_tack,'tackURL',array('size'=>60,'maxlength'=>255)); 
                echo $form->error($new_tack,'tackURL');
                echo 
                "
                </div>
                ";
                echo 
                "           
                <div class='row'>
                ";
                echo $form->labelEx($new_tack,'tackDescription'); 
                echo $form->textArea($new_tack,'tackDescription',array('rows'=>3, 'cols'=>50));
                echo $form->error($new_tack,'tackDescription'); 
                
                echo "
                </div>
                <div class='hidden'>
                ";
                echo $form->hiddenField($new_tack, 'userID', array('value'=>$owner->userID)); 
                echo $form->hiddenField($new_tack, 'boardID', array('value'=>$owner->boardID));
                echo $form->hiddenField($new_tack, 'isPrivate', array('value'=>0)); 
                echo 
                "
                </div>

                <div class='row buttons>';
                ";
                echo CHtml::submitButton( ($new_tack->isNewRecord ? 'create' : 'Save'), array('boardID'=>$owner->boardID,'userID'=>$owner->userID)); 
                
                echo "</div>";
            
                $caller->endWidget(); 
            echo "
            </div>
        </div><!-- form -->

        </div>
        ";
        $caller->endWidget(); 

    }

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
        $pre = "<div class='user_tack' onclick='setOnTop()' id='".$this->tackID."' style=' position:relative;";

            if($this->has_widget())
            {
                //$pre .= 'width:560px';
            }
        $pre  .= "'>\n";
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
        // @todo: make all of these return widgets...
        if($this->tackType == 'ext.Yiitube')
        {
            return array('widget_type'=>$this->tackType, 'widget_properties'=>array('v'=>$this->tackURL, 'size'=>'small'));
        }
        else if ($this->tackType == 'image')
        {
            return '<a href='.$this->tackURL.'><img class="tack_content" src='.$this->tackURL.' /></a>';
        }
        else if ($this->tackType == 'url')
        {
            return '<div class="tack_content" align="center"><a href='.$this->tackURL.'>'.$this->tackName.'</a></div>';
        }
        else
        {
            $html = '<p><div class="tack_content" align="center">'.$this->tackURL.'</div></p>';
            $html .= '<p><div class="tack_content" align="center">'.$this->tackDescription.'</div></p>';
            return $html;
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
