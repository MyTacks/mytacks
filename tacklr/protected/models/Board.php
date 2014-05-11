<?php

/**
 * This is the model class for table "tbl_board".
 *
 * The followings are the available columns in table 'tbl_board':
 * @property integer $boardID
 * @property string $boardTitle
 * @property string $userID
 * @property integer $categoryID
 * @property string $description
 * @property string $updateDate
 * @property string $createDate
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property User $user
 * @property Follow[] $follows
 * @property Tack[] $tacks
 */
class Board extends CActiveRecord
{
	 public static function getCreatorModal($caller, $owner)
    {     

        $new_board = new Board;

        $caller->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'newBoard')
        );     

        echo "
        <div class='modal-header' align='center'>
            <a class='close' ata-dismiss='modal'>&times;</a>
            <h4>New board</h4>
            ";            
        echo "
        </div>

        <div class='modal-body' align='center'>
            <div class='form'> ";
            $form=$caller->beginWidget('CActiveForm', array(
                    'id'=>'board-form',
                    'action'=>'/mytacks/tacklr/board/create/',
                    'method'=>'post',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                )); 
                echo "
			    <p class=\"note\">Fields with <span class=\"required\">*</span> are required.</p>

				
				<div class=\"row\">";
					echo $form->labelEx($new_board,'boardTitle'); 
					echo $form->textField($new_board,'boardTitle',array('size'=>60,'maxlength'=>255)); 
					echo $form->error($new_board,'boardTitle'); 
				echo "</div>";

					echo $form->labelEx($new_board,'categoryID');
			        
			            $models = Category::model()->findAll(array('order' => 'categoryName'));
			            $list = CHtml::listData($models, 'categoryID', 'categoryName');
			        	echo $form->dropDownList($new_board, 'categoryID', $list, array('empty' => 'Choose a category'));
						echo $form->error($new_board,'categoryID');
				echo " </br>
			    <div class=\"row buttons\">
			        <a href=\"/mytacks/tacklr/category/create\"><button type=\"button\">Create New Category</button></a>
			    </div>

				<div class=\"row\">";
					echo $form->labelEx($new_board,'description');
					echo $form->textArea($new_board,'description',array('rows'=>3, 'cols'=>50)); 
					echo $form->error($new_board,'description'); 
				echo "</div>

                <div class='row buttons'>
                ";
                echo CHtml::submitButton( ($new_board->isNewRecord ? 'create' : 'Save'), array('userID'=>Yii::app()->user->getId())); 
                
                echo "</div>";
            
                $caller->endWidget(); 
            echo "
            </div>
        </div><!-- form -->

        </div>
        ";
        $caller->endWidget(); 
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_board';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('boardTitle, description, categoryID', 'required'),
			array('categoryID', 'numerical', 'integerOnly'=>true),
			array('boardTitle', 'length', 'max'=>255),
			array('userID', 'length', 'max'=>20),
			array('description, createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('boardID, boardTitle, userID, categoryID, description, updateDate, createDate', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'categoryID'),
			'user' => array(self::BELONGS_TO, 'User', 'userID'),
			'follows' => array(self::HAS_MANY, 'Follow', 'boardID'),
			'tacks' => array(self::HAS_MANY, 'Tack', 'boardID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'boardID' => 'Board',
			'boardTitle' => 'Board Title',
			'userID' => 'User',
			'categoryID' => 'Category',
			'description' => 'Description',
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

		$criteria->compare('boardID',$this->boardID);
		$criteria->compare('boardTitle',$this->boardTitle,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('categoryID',$this->categoryID);
		$criteria->compare('description',$this->description,true);
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
	 * @return Board the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
