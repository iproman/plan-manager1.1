<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "title".
 *
 * @property int $id ID
 * @property string $name Название
 * @property string $content Содержание
 * @property int $status Статус
 * @property string $branch Ветка
 * @property int $project_id Название проекта
 * @property int $created_at Создано
 * @property int $updated_at Обновлено
 *
 * @property Project[] $projects
 */
class Title extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                'name',
                'required'
            ],
            [
                [
                    'created_at',
                    'updated_at'
                ],
                'safe'
            ],
            [
                'name',
                'string',
                'max' => 64
            ],
            [
                'branch',
                'string',
                'max' => 10
            ],
            [
                [
                    'content',
                    'branch',
                ],
                'default',
                'value' => null,
            ],
            [
                'content',
                'string',
                'max' => 255
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'content' => 'Содержание',
            'branch' => 'Ветка',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['title_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getTitleNames()
    {
        $titleList = Title::find()->asArray()->all();

        return ArrayHelper::map($titleList, 'id', 'name');
    }
}
