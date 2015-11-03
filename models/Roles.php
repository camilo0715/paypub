<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Roles".
 *
 * @property integer $idRoles
 * @property string $Descripcion
 *
 * @property Usuario[] $usuarios
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRoles' => 'Id Roles',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['Roles_idRoles' => 'idRoles']);
    }
}
