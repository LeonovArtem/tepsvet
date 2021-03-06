<?php

namespace app\components\chat\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property string $message
 * @property integer $userId
 * @property string $updateDate
 */
class Chat extends ActiveRecord
{

    public $userModel;
    public $userField;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['userId'], 'integer'],
            [['updateDate', 'message'], 'safe']
        ];
    }


    public function getUser()
    {
        if (isset($this->userModel))
            return $this->hasOne($this->userModel, ['id' => 'userId']);
        else
            return $this->hasOne(Yii::$app->getUser()->identityClass, ['id' => 'userId']);
    }

    public function getAllUser()
    {
        $users = new $this->userModel;
        return $users->find()->all();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'userId' => 'User',
            'updateDate' => 'Update Date',
        ];
    }

    public function beforeSave($insert)
    {
        $this->userId = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }

    public static function records()
    {
        return static::find()->orderBy('id desc')->limit(10)->all();
    }

    public function data()
    {
        $output = '';
        $models = Chat::records();
        if ($models)
            foreach ($models as $model) {
                if (isset($model->user->userField)) {
                    $avatar = $model->user->img_profil;
                } else {
                    $avatar = Yii::$app->assetManager->getPublishedUrl("@app/components/chat/assets/img/avatar.png");
                }
                $output .= '<div class="item">
                <img class="online" alt="user image" src="' . $avatar . '">
                <p class="message">
                    <a class="name" href="#">
                        <small class="text-muted pull-right" style="color:green"><i class="fa fa-clock-o"></i> ' . \kartik\helpers\Enum::timeElapsed($model->updateDate) . '</small>
                        ' . $model->user->username . '
                    </a>
                   ' . '<div class="direct-chat-text">' . $model->message . '</div>' . '
                </p><hr>
            </div>';
            }

        return $output;
    }

}
