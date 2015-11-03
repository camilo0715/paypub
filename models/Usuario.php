<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property integer $idUsuario
 * @property string $Usuario
 * @property string $Password
 * @property integer $Roles_idRoles
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Roles $rolesIdRoles
 * @property UsuarioComercio[] $usuarioComercios
 * @property UsuarioPersona[] $usuarioPersonas
 * @property UsuarioSucursal[] $usuarioSucursals
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuario', 'Password', 'Roles_idRoles'], 'required'],
            [['Roles_idRoles'], 'integer'],
            [['Usuario', 'Password'], 'string', 'max' => 45],
            [['authKey', 'accessToken'], 'string', 'max' => 255],
            [['Usuario'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'Usuario' => 'Usuario',
            'Password' => 'Password',
            'Roles_idRoles' => 'Roles Id Roles',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolesIdRoles()
    {
        return $this->hasOne(Roles::className(), ['idRoles' => 'Roles_idRoles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioComercios()
    {
        return $this->hasMany(UsuarioComercio::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPersonas()
    {
        return $this->hasMany(UsuarioPersona::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioSucursals()
    {
        return $this->hasMany(UsuarioSucursal::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }
}
