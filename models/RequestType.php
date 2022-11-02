<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "RequestType".
 *
 * @property int $id
 * @property string $description
 * @property int|null $type
 *
 * @property ContactRequest[] $contactRequests
 */
class RequestType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'RequestType';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['type'], 'default', 'value' => null],
            [['type'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[ContactRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactRequests()
    {
        return $this->hasMany(ContactRequest::class, ['request_type_id' => 'id']);
    }
}
