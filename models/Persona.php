<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Persona".
 *
 * @property integer $idPersona
 * @property string $Rut
 * @property string $Nombres
 * @property string $ApellidoPaterno
 * @property string $ApellidoMaterno
 * @property string $FechaNacimiento
 * @property string $FechaCreacCuenta
 * @property string $FechaUltTrx
 * @property string $Saldo
 *
 * @property TransaccionResumen[] $transaccionResumens
 * @property UsuarioPersona[] $usuarioPersonas
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rut'], 'required'],
            [['FechaNacimiento', 'FechaCreacCuenta', 'FechaUltTrx'], 'safe'],
            [['Saldo'], 'number'],
            [['Rut'], 'string', 'max' => 20],
            [['Nombres', 'ApellidoPaterno', 'ApellidoMaterno'], 'string', 'max' => 45],
            [['Rut'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'Rut' => 'Rut',
            'Nombres' => 'Nombres',
            'ApellidoPaterno' => 'Apellido Paterno',
            'ApellidoMaterno' => 'Apellido Materno',
            'FechaNacimiento' => 'Fecha Nacimiento',
            'FechaCreacCuenta' => 'Fecha Creac Cuenta',
            'FechaUltTrx' => 'Fecha Ult Trx',
            'Saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionResumens()
    {
        return $this->hasMany(TransaccionResumen::className(), ['Persona_idPersona' => 'idPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPersonas()
    {
        return $this->hasMany(UsuarioPersona::className(), ['Persona_idPersona' => 'idPersona']);
    }
}
