<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "myresume".
 *
 * @property int $id
 * @property int $resume_id
 * @property string|null $create_date
 * @property string|null $update_date
 *
 * @property Resume $resume
 */
class Myresume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'myresume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id'], 'required'],
            [['resume_id'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
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
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
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
