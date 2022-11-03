<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linktype".
 *
 * @property int $id
 * @property string $type
 *
 * @property RequestType[] $requestTypes
 */
class Linktype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linktype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[RequestTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestTypes()
    {
        return $this->hasMany(RequestType::class, ['type' => 'id']);
    }
}
