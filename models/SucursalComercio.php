<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SucursalComercio".
 *
 * @property integer $idSucursalComercio
 * @property integer $Comercio_idComercio
 * @property string $EstadoSucursal
 * @property string $NombreSucursal
 *
 * @property Comercio $comercioIdComercio
 * @property TransaccionResumen[] $transaccionResumens
 * @property UsuarioSucursal[] $usuarioSucursals
 */
class SucursalComercio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SucursalComercio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Comercio_idComercio'], 'required'],
            [['Comercio_idComercio'], 'integer'],
            [['EstadoSucursal', 'NombreSucursal'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSucursalComercio' => 'Id Sucursal Comercio',
            'Comercio_idComercio' => 'Comercio Id Comercio',
            'EstadoSucursal' => 'Estado Sucursal',
            'NombreSucursal' => 'Nombre Sucursal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercioIdComercio()
    {
        return $this->hasOne(Comercio::className(), ['idComercio' => 'Comercio_idComercio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionResumens()
    {
        return $this->hasMany(TransaccionResumen::className(), ['SucursalComercio_idSucursalComercio' => 'idSucursalComercio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioSucursals()
    {
        return $this->hasMany(UsuarioSucursal::className(), ['SucursalComercio_idSucursalComercio' => 'idSucursalComercio']);
    }
}
