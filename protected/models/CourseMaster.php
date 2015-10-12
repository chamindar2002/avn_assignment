<?php

/**
 * This is the model class for table "course_master".
 *
 * The followings are the available columns in table 'course_master':
 * @property integer $id
 * @property string $course_name
 * @property integer $course_duration
 * @property string $course_price
 * @property integer $lecturer_id
 *
 * The followings are the available model relations:
 * @property CourseLecturer $lecturer
 */
class CourseMaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_name, course_duration, course_price, lecturer_id', 'required'),
			array('course_duration, lecturer_id', 'numerical', 'integerOnly'=>true),
			array('course_name', 'length', 'max'=>255),
			array('course_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, course_name, course_duration, course_price, lecturer_id', 'safe', 'on'=>'search'),
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
			'lecturer' => array(self::BELONGS_TO, 'CourseLecturer', 'lecturer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_name' => 'Course Name',
			'course_duration' => 'Course Duration (Months)',
			'course_price' => 'Course Price ($)',
			'lecturer_id' => 'Lecturer',
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
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('course_duration',$this->course_duration);
		$criteria->compare('course_price',$this->course_price,true);
		$criteria->compare('lecturer_id',$this->lecturer_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CourseMaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
