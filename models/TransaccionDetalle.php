<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TransaccionDetalle".
 *
 * @property integer $idTransaccionDetalle
 * @property integer $TransaccionResumen_idTransaccionResumen
 * @property integer $TipoTransaccion_idTipoTransaccion
 * @property string $ValorOperacion
 *
 * @property TipoTransaccion $tipoTransaccionIdTipoTransaccion
 * @property TransaccionResumen $transaccionResumenIdTransaccionResumen
 */
class TransaccionDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TransaccionDetalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TransaccionResumen_idTransaccionResumen', 'TipoTransaccion_idTipoTransaccion'], 'required'],
            [['TransaccionResumen_idTransaccionResumen', 'TipoTransaccion_idTipoTransaccion'], 'integer'],
            [['ValorOperacion'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTransaccionDetalle' => 'Id Transaccion Detalle',
            'TransaccionResumen_idTransaccionResumen' => 'Transaccion Resumen Id Transaccion Resumen',
            'TipoTransaccion_idTipoTransaccion' => 'Tipo Transaccion Id Tipo Transaccion',
            'ValorOperacion' => 'Valor Operacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTransaccionIdTipoTransaccion()
    {
        return $this->hasOne(TipoTransaccion::className(), ['idTipoTransaccion' => 'TipoTransaccion_idTipoTransaccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionResumenIdTransaccionResumen()
    {
        return $this->hasOne(TransaccionResumen::className(), ['idTransaccionResumen' => 'TransaccionResumen_idTransaccionResumen']);
    }
}
