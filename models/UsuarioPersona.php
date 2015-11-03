<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UsuarioPersona".
 *
 * @property integer $idUsuarioPersona
 * @property integer $Usuario_idUsuario
 * @property integer $Persona_idPersona
 *
 * @property Persona $personaIdPersona
 * @property Usuario $usuarioIdUsuario
 */
class UsuarioPersona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UsuarioPersona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuarioPersona', 'Usuario_idUsuario', 'Persona_idPersona'], 'required'],
            [['idUsuarioPersona', 'Usuario_idUsuario', 'Persona_idPersona'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuarioPersona' => 'Id Usuario Persona',
            'Usuario_idUsuario' => 'Usuario Id Usuario',
            'Persona_idPersona' => 'Persona Id Persona',
        ];
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
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
}
