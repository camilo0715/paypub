<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TipoTransaccion".
 *
 * @property integer $idTipoTransaccion
 * @property string $DescripcionTransaccion
 *
 * @property TransaccionDetalle[] $transaccionDetalles
 */
class TipoTransaccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoTransaccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DescripcionTransaccion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoTransaccion' => 'Id Tipo Transaccion',
            'DescripcionTransaccion' => 'Descripcion Transaccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionDetalles()
    {
        return $this->hasMany(TransaccionDetalle::className(), ['TipoTransaccion_idTipoTransaccion' => 'idTipoTransaccion']);
    }
}
