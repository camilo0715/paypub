<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Comercio".
 *
 * @property integer $idComercio
 * @property string $RutRazonSocial
 * @property string $NombreRazonSocial
 * @property string $FechaActivacion
 * @property string $FechaExpiraContrato
 * @property integer $GiroComercial_idGiroComercial
 *
 * @property GiroComercial $giroComercialIdGiroComercial
 * @property SucursalComercio[] $sucursalComercios
 * @property UsuarioComercio[] $usuarioComercios
 */
class Comercio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Comercio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FechaActivacion', 'FechaExpiraContrato'], 'safe'],
            [['GiroComercial_idGiroComercial'], 'required'],
            [['GiroComercial_idGiroComercial'], 'integer'],
            [['RutRazonSocial', 'NombreRazonSocial'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComercio' => 'Id Comercio',
            'RutRazonSocial' => 'Rut Razon Social',
            'NombreRazonSocial' => 'Nombre Razon Social',
            'FechaActivacion' => 'Fecha Activacion',
            'FechaExpiraContrato' => 'Fecha Expira Contrato',
            'GiroComercial_idGiroComercial' => 'Giro Comercial Id Giro Comercial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiroComercialIdGiroComercial()
    {
        return $this->hasOne(GiroComercial::className(), ['idGiroComercial' => 'GiroComercial_idGiroComercial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalComercios()
    {
        return $this->hasMany(SucursalComercio::className(), ['Comercio_idComercio' => 'idComercio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioComercios()
    {
        return $this->hasMany(UsuarioComercio::className(), ['Comercio_idComercio' => 'idComercio']);
    }
}
