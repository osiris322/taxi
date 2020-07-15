<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $date_finish
 * @property int $priority
 * @property bool $status
 */
class Task extends \yii\db\ActiveRecord
{
    const PRIORITY_HIGH = 1;
    const PRIORITY_MIDDLE = 2;
    const PRIORITY_LOW = 3;
    
    const STATUS_OPEN = 0;
    const STATUS_CLOSE = 1;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'priority'], 'required'],
            [['description'], 'string'],
            //[['date_finish'], 'date','format' => 'php:Y-m-d'],
            [['date_finish'], 'safe'],
            [['priority'], 'integer'],
            [['status'], 'boolean'],
            ['priority', 'in', 'range' => [
                    self::PRIORITY_HIGH,
                    self::PRIORITY_MIDDLE,
                    self::PRIORITY_LOW,
                ]
            ],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'date_finish' => 'Дата выполнения',
            'priority' => 'Приоритет',
            'status' => 'Завершено?',
        ];
    }
    
    /**
     * Список приоритетов
     * @return array
     */
    public static function listPriority() {
        $array = [
            self::PRIORITY_HIGH => 'Высокий',
            self::PRIORITY_MIDDLE => 'Средний',
            self::PRIORITY_LOW => 'НИзкий',
        ];
        return $array;
    }
    
    /**
     * именованиеприоритета
     * @param int $id
     * @return string|null
     */
    public static function getNamePriority(int $id) {
        $array = static::listPriority();
        return isset($array[$id]) ? $array[$id] : null;
    }
}
