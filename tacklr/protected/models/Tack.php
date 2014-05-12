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
 * @property string $tackContent
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
                echo $form->labelEx($new_tack,'tackContent');
                echo $form->textField($new_tack,'tackContent',array('size'=>60,'maxlength'=>255)); 
                echo $form->error($new_tack,'tackContent');
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
                echo $form->labelEx($new_tack,'tackContent');
                echo $form->textField($new_tack,'tackContent',array('size'=>60,'maxlength'=>255)); 
                echo $form->error($new_tack,'tackContent');
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
			array('tackName, tackContent, tackDescription', 'required'),
			array('boardID, isPrivate, top, left', 'numerical', 'integerOnly'=>true),
			array('userID', 'numerical'),
            array('tackContent', 'length', 'max'=>255),
            array('tackType', 'length', 'max'=>255),
			//array('createDate, updateDate', 'default',),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('tackID, userID, boardID, isPrivate, tackName, tackContent, tackImage, tackDescription, updateDate, createDate', 'safe', 'on'=>'search'),
            //array('tackID, userID, boardID, isPrivate, tackName, tackContent, tackImage, tackDescription, updateDate, createDate', 'safe', 'on'=>'insert'),
            array('tackID, userID, boardID, isPrivate, tackName, tackContent, tackImage, tackDescription, updateDate, createDate', 'safe', 'on'=>'update'),
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
            'tackContent' => 'Tack URL',
            'tackType' => 'Tack Type',
			'tackImage' => 'Tack Image',
			'tackDescription' => 'Tack Description',
			'updateDate' => 'Update Date',
			'createDate' => 'Create Date',
            'top' => 'top',
            'left' => 'left',
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
        $criteria->compare('tackContent',$this->tackContent,true);
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
    public function toHtml($isOwner=false,$index=false)
    {
        $pre = "<li class='user_tack pull-left pull-up' id='".$this->tackID."'";
        if(!$index && ( ((int)$this->top != 0) && ((int)$this->left != 0)))
        {
            $pre .= " style= position:absolute;". $this->getPostionsAsHtml($index);
        }

        $pre .= ">\n\t<div class='tack_title' id='".$this->tackName."'><p>";
        
        if($isOwner)
        {
            $pre .= "<span>" . CHtml::link('X',array('tack/delete', 'id'=>$this->tackID))."   " ;
            $pre .= CHtml::ajaxSubmitButton('Update Position',Yii::app()->createUrl('/tack/updatePosition'),
                    array(
                        'type'=>'POST',
                        'data'=> 'js:{"id":'.$this->tackID.',"x":String($(\'#'.$this->tackID.'\').position().left), "y":String($(\'#'.$this->tackID.'\').position().top)}',                        
                        //'success'=>'js:function(string){ alert(string); }',   
                        //'error' =>'js:function(string) {alert(string);}'        
                    ),array('class'=>'button',)). "</span>";
        }
        if($index)
        {
            $pre .="<span>" . CHtml::link('Go to board',array('board/view', 'id'=>((string)$this->boardID))) . "</span>";
        }

        $pre .= (strlen($this->tackName) == 0 ? "." : $this->tackName)."</p></div>\n";
        /// @todo add tack type! maybe make it widget type...
        $pre .= "<div class='tack_content_and_comment_container'>";
        $pre .= "<div class='tack_shadow'></div>";
        $pre .= "\t\t<div class='tack_content'>\n";
        //$html = "";
        $post = "</div>\n";
        $post .= $this->getTackDescriptionAsHtml();
        $post .= "<div class='feedback_area'>\n";
        $post .= $this->getFeedbackAsHtml();
        $post .= "</div>"; // end teac_feedback
        $post .= $this->getFeedbackField($index);
        $post .= "</div>"; // end tack_content_and_comment_container
        $post .= "</div>"; // end user_tack

        return array('preContent'=>$pre, 'content'=>$this->get_widget(), 'postContent'=>$post);

    }

    public function getPostionsAsHtml($index=false)
    {
        $html = "";
        if($index)
        {
            return $html;
        }
        $html .= (is_null($this->top) ? "" : "top:".$this->top."px;"). (is_null($this->left) ? "" : "left:".$this->left."px;");
        return $html;
    }

    public function getTackDescriptionAsHtml()
    {
        $result = "";
        if(strlen($this->tackDescription) > 0)
        {
            $result = "<div class='tack_description'>".$this->tackDescription."</div>";
        }
        return $result;
    }

    public function getFeedbackAsHtml()
    {
        $feedbacks = Feedback::model()->with(array( 'tacks'=>array('condition'=>'tack_id='.$this->tackID)))->findAll();
        $result = "<div class='feedback".$this->tackID."'>\n";
        foreach ($feedbacks as $feedback)
        {
            $owner = User::model()->findByPk($feedback->owner_id);
            $timestamp=date_format(date_create($feedback->timestamp),'d/m/Y \a\t H:i');

                            
            $result .= $feedback->content;
            $result .= "<p><div class='feedback_meta'>".$owner->username." on ".$timestamp.((string)$feedback->owner_id == ( (Yii::app()->user->isGuest ? false : (string)User::model()->findByAttributes(array('username'=>Yii::app()->user->id))->userID ? "<a href='".Yii::app()->createUrl("tack/deleteFeedback", array('id'=>$feedback->feedback_id,'boardid'=>$this->boardID))."'>\tDELETE</a>" : "")))."</div></style></p><br/>";
        }
        return $result;
    }
    public function getFeedbackField($index=false)
    {

        $result = '<div class="form"><form action="/mytacks/tacklr/tack/updateFeedback"'.(Yii::app()->user->isGuest? 'style="visibility:hidden;"' : '' ).'>
            <div>
                <textarea rows="3" name="comment" class="feedback_form" placeholder="Comment then press \'enter\'" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"></textarea>
            </div> 
            <div class="hidden">
                <input value="'.$this->tackID.'" name="tackid" id="tackid">
                <input value="'.Yii::app()->user->id.'" name="username" id="username">
                <input value="'.$this->boardID.'" name="boardid" id="boardid">
                '.($index ? '<input value="index" name="index" id="gotoindex">' : '').'
            </div>
            </form></div>';
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
            return array('widget_type'=>$this->tackType, 'widget_properties'=>array('v'=>$this->tackContent, 'size'=>'small'));
        }
        else if($this->tackType == 'sc-widget')
        {
            return '<iframe id="sc-widget" src="https://w.soundcloud.com/player/?url='.$this->tackContent.'" width="100%" scrolling="no" frameborder="no"></iframe>';

        }
        else if ($this->tackType == 'image')
        {
            return '<a href='.$this->tackContent.'><img class="tack_content" src='.$this->tackContent.' /></a>';
        }
        else if ($this->tackType == 'url')
        {
            return '<div class="tack_content" align="center"><a href='.$this->tackContent.'>'.$this->tackName.'</a></div>';
        }
        else
        {
            $html = '<p><div class="tack_content" align="center">'.$this->tackContent.'</div></p>';
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
