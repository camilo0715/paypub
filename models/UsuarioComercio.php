<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UsuarioComercio".
 *
 * @property integer $idUsuarioComercio
 * @property integer $Usuario_idUsuario
 * @property integer $Comercio_idComercio
 *
 * @property Comercio $comercioIdComercio
 * @property Usuario $usuarioIdUsuario
 */
class UsuarioComercio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UsuarioComercio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuario_idUsuario', 'Comercio_idComercio'], 'required'],
            [['Usuario_idUsuario', 'Comercio_idComercio'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuarioComercio' => 'Id Usuario Comercio',
            'Usuario_idUsuario' => 'Usuario Id Usuario',
            'Comercio_idComercio' => 'Comercio Id Comercio',
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
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
}
