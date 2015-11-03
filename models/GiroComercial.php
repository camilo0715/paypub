<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "GiroComercial".
 *
 * @property integer $idGiroComercial
 * @property string $DescripcionGiroComerTribut
 * @property string $DescripcionGiroComerInterna
 *
 * @property Comercio[] $comercios
 */
class GiroComercial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'GiroComercial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DescripcionGiroComerTribut', 'DescripcionGiroComerInterna'], 'required'],
            [['DescripcionGiroComerTribut', 'DescripcionGiroComerInterna'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idGiroComercial' => 'Id Giro Comercial',
            'DescripcionGiroComerTribut' => 'Descripcion Giro Comer Tribut',
            'DescripcionGiroComerInterna' => 'Descripcion Giro Comer Interna',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercios()
    {
        return $this->hasMany(Comercio::className(), ['GiroComercial_idGiroComercial' => 'idGiroComercial']);
    }
}
