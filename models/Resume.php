<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property string $family
 * @property string $name
 * @property string|null $fatername
 * @property string $bird_date
 * @property string|null $six
 * @property string|null $photo_url
 * @property resource|null $photo_blob
 * @property string|null $comment
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['family', 'name', 'bird_date'], 'required'],
            [['bird_date'], 'safe'],
            [['photo_blob'], 'string'],
            [['family', 'name', 'fatername'], 'string', 'max' => 80],
            [['six'], 'string', 'max' => 1],
            [['photo_url'], 'string', 'max' => 256],
            [['comment'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'family' => 'Family',
            'name' => 'Name',
            'fatername' => 'Fatername',
            'bird_date' => 'Bird Date',
            'six' => 'Six',
            'photo_url' => 'Photo Url',
            'photo_blob' => 'Photo Blob',
            'comment' => 'Comment',
        ];
    }
}
