<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TransaccionResumen".
 *
 * @property integer $idTransaccionResumen
 * @property integer $Persona_idPersona
 * @property string $FechaOperacion
 * @property string $HoraOperacion
 * @property string $ResultadoOperacion
 * @property string $FechaContabiliza
 * @property integer $SucursalComercio_idSucursalComercio
 *
 * @property TransaccionDetalle[] $transaccionDetalles
 * @property Persona $personaIdPersona
 * @property SucursalComercio $sucursalComercioIdSucursalComercio
 */
class TransaccionResumen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TransaccionResumen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Persona_idPersona', 'SucursalComercio_idSucursalComercio'], 'required'],
            [['Persona_idPersona', 'SucursalComercio_idSucursalComercio'], 'integer'],
            [['FechaOperacion', 'HoraOperacion', 'FechaContabiliza'], 'safe'],
            [['ResultadoOperacion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTransaccionResumen' => 'Id Transaccion Resumen',
            'Persona_idPersona' => 'Persona Id Persona',
            'FechaOperacion' => 'Fecha Operacion',
            'HoraOperacion' => 'Hora Operacion',
            'ResultadoOperacion' => 'Resultado Operacion',
            'FechaContabiliza' => 'Fecha Contabiliza',
            'SucursalComercio_idSucursalComercio' => 'Sucursal Comercio Id Sucursal Comercio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionDetalles()
    {
        return $this->hasMany(TransaccionDetalle::className(), ['TransaccionResumen_idTransaccionResumen' => 'idTransaccionResumen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaIdPersona()
    {
        return $this->hasOne(Persona::className(), ['idPersona' => 'Persona_idPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalComercioIdSucursalComercio()
    {
        return $this->hasOne(SucursalComercio::className(), ['idSucursalComercio' => 'SucursalComercio_idSucursalComercio']);
    }
}
