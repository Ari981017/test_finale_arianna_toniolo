<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ContactRequest".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $request_body
 * @property string $request_date
 * @property int|null $request_type_id
 *
 * @property RequestType $requestType
 */
class ContactRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ContactRequest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'request_body', 'request_date'], 'required'],
            [['request_date'], 'safe'],
            [['request_type_id'], 'default', 'value' => null],
            [['request_type_id'], 'integer'],
            [['name', 'email', 'request_body'], 'string', 'max' => 255],
            ['email', 'email'],
            [['request_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestType::class, 'targetAttribute' => ['request_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'request_body' => 'Request Body',
            'request_date' => 'Request Date',
            'request_type_id' => 'Request Type',
        ];
    }

    /**
     * Gets query for [[RequestType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestType()
    {
        return $this->hasOne(RequestType::class, ['id' => 'request_type_id']);
    }
}
