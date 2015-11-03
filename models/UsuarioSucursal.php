<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UsuarioSucursal".
 *
 * @property integer $idUsuarioSucursal
 * @property integer $Usuario_idUsuario
 * @property integer $SucursalComercio_idSucursalComercio
 * @property string $Estado
 *
 * @property SucursalComercio $sucursalComercioIdSucursalComercio
 * @property Usuario $usuarioIdUsuario
 */
class UsuarioSucursal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UsuarioSucursal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuario_idUsuario', 'SucursalComercio_idSucursalComercio'], 'required'],
            [['Usuario_idUsuario', 'SucursalComercio_idSucursalComercio'], 'integer'],
            [['Estado'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuarioSucursal' => 'Id Usuario Sucursal',
            'Usuario_idUsuario' => 'Usuario Id Usuario',
            'SucursalComercio_idSucursalComercio' => 'Sucursal Comercio Id Sucursal Comercio',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalComercioIdSucursalComercio()
    {
        return $this->hasOne(SucursalComercio::className(), ['idSucursalComercio' => 'SucursalComercio_idSucursalComercio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
}
