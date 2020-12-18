<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place_of_work".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $start_date начало работы 
 * @property string|null $end_date
 * @property int|null $until_now по настоящие время
 * @property string|null $organisation
 * @property string|null $position
 * @property string|null $functions Обязонности и функции 
 *
 * @property Resume $resume
 */
class PlaceOfWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_of_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'start_date'], 'required'],
            [['resume_id', 'until_now'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['organisation', 'position'], 'string', 'max' => 127],
            [['functions'], 'string', 'max' => 1024],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'until_now' => 'Until Now',
            'organisation' => 'Organisation',
            'position' => 'Position',
            'functions' => 'Functions',
        ];
    }

    /**
     * Gets query for [[Resume]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::className(), ['id' => 'resume_id']);
    }
}
