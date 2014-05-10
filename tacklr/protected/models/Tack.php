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

        $new_tack = new Tack(null);

        $caller->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'newTack')
        );     

        echo "
        <div class='modal-header' align='center'>
            <a class='close' ata-dismiss='modal'>&times;</a>
            <h4>New tack</h4>
            ";            
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

                <div class='row buttons'>
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

    public static function searchModal($caller, $owner)
    {     

        $new_tack = new Tack(null);

        $caller->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'newTack')
        );     

        echo "
        <div class='modal-header' align='center'>
            <a class='close' ata-dismiss='modal'>&times;</a>
            <h4>New tack</h4>
            ";            
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

                <div class='row buttons'>
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
            //'feedback' => array(self::HAS_MANY, 'Feedback', 'boardID'),
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

    /**
     * SQL:
     * Select * from tbl_tack where tbl_tack.type=$TYPE and (tbl_tack.content like %$KEY1% or tbl_tack.content like %KEY2%...) orderby count()
     */
    public function search_for_board()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('tbl_board',
                                'tbl_tack');
        $criteria->select = array('tbl_board.id');
        $criteria->condition = "foreign_table1.col1=:col_val AND 
                                foreign_table3.col3=:col_val2";
        $criteria->params = array(':col_val' => some_val, ':col_val2' => other_val);
        $criteria->order = 'foreign_table3.col5 DESC';
        $criteria->limit = 10;
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
        $pre = "<li class='user_tack' id='".$this->tackID."'>\n";// style=' position:relative;'>\n";
        if($isOwner)
        {
            $pre .=  CHtml::link('X',array('tack/delete', 'id'=>$this->tackID));
        }
        $pre .= "\t<div class='tack_title' id='".$this->tackName."'>\n";
        $pre .= $this->tackName."\n</div>\n";
        /// @todo add tack type! maybe make it widget type...
        $pre .= "\t\t<div class='tack_content'>\n";
        //$html = "";
        $post = "</div>\n";
        $post .= "<div class='tack_description'>".$this->tackDescription."</div>";
        $post .= "<div class='tack_feedback'>\n";
        $post .= $this->getFeedbackAsHtml();
        $post .= $this->getFeedbackField();
        $post .= "</div>"; // end teac_feedback
        $post .= "</div>"; // end user_tack

        return array('preContent'=>$pre, 'content'=>$this->get_widget(), 'postContent'=>$post);

    }

    public function getFeedbackAsHtml()
    {
        $feedbacks = Feedback::model()->with(array( 'tacks'=>array('condition'=>'tack_id='.$this->tackID)))->findAll();
        $result = "<div class='feedback'>\n";
        foreach ($feedbacks as $feedback)
        {
            $owner = User::model()->findByPk($feedback->owner_id);
            $timestamp=date_format(date_create($feedback->timestamp),'d/m/Y \a\t H:i');

            
            $result .= $feedback->content;
            $result .= "<p><div class='feedback_meta'>".$owner->username." on ".$timestamp."</div></style></p><br/>";
        }
        return $result;
    }
    public function getFeedbackField()
    {
        $result = CHtml::textArea("feedback_entry".$this->tackID,"(what do you think of this?)",array('submit'=>'Nothing', 'class'=>'feedback_entry','onfocus'=>'if(this.value==this.defaultValue)this.value="";', 'onblur'=>'if(this.value=="")this.value=this.defaultValue;'));
        $result .= CHtml::button('give', array('class'=>'feedback_button','submit' => array('action'=>'/tack/addFeedback','method'=>'post','id'=>$this->tackID)));
        return $result;
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
        else if($this->tackType == 'sc-widget')
        {
            return '<iframe id="sc-widget" src="https://w.soundcloud.com/player/?url='.$this->tackURL.'" width="100%" scrolling="no" frameborder="no"></iframe>';

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
