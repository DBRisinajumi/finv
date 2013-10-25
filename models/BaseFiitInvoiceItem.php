<?php

/**
 * This is the model base class for the table "fiit_invoice_item".
 *
 * Columns in table "fiit_invoice_item" available as properties of the model:
 * @property string $fiit_id
 * @property integer $fiit_finv_id
 * @property string $fiit_desc
 * @property string $fiit_debet_facn_code
 * @property string $fiit_credit_facn_code
 * @property double $fiit_quantity
 * @property integer $fiit_cqnt_id
 * @property string $fiit_price
 * @property string $fiit_amt
 * @property string $fiit_vat
 * @property string $fiit_total
 * @property integer $fiit_fvat_id
 *
 * Relations of table "fiit_invoice_item" available as properties of the model:
 * @property FvatVat $fiitFvat
 * @property FinvInvoice $fiitFinv
 */
abstract class BaseFiitInvoiceItem extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'fiit_invoice_item';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('fiit_finv_id, fiit_debet_facn_code, fiit_credit_facn_code, fiit_quantity, fiit_cqnt_id, fiit_price, fiit_amt, fiit_total', 'required'),
                array('fiit_desc, fiit_vat, fiit_fvat_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('fiit_finv_id, fiit_cqnt_id, fiit_fvat_id', 'numerical', 'integerOnly' => true),
                array('fiit_quantity', 'numerical'),
                array('fiit_debet_facn_code, fiit_credit_facn_code', 'length', 'max' => 20),
                array('fiit_price, fiit_amt, fiit_vat, fiit_total', 'length', 'max' => 10),
                array('fiit_desc', 'safe'),
                array('fiit_id, fiit_finv_id, fiit_desc, fiit_debet_facn_code, fiit_credit_facn_code, fiit_quantity, fiit_cqnt_id, fiit_price, fiit_amt, fiit_vat, fiit_total, fiit_fvat_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->fiit_desc;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'fiitFvat' => array(self::BELONGS_TO, 'FvatVat', 'fiit_fvat_id'),
            'fiitFinv' => array(self::BELONGS_TO, 'FinvInvoice', 'fiit_finv_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fiit_id' => Yii::t('FinvModule.crud', 'Fiit'),
            'fiit_finv_id' => Yii::t('FinvModule.crud', 'Fiit Finv'),
            'fiit_desc' => Yii::t('FinvModule.crud', 'Fiit Desc'),
            'fiit_debet_facn_code' => Yii::t('FinvModule.crud', 'Fiit Debet Facn Code'),
            'fiit_credit_facn_code' => Yii::t('FinvModule.crud', 'Fiit Credit Facn Code'),
            'fiit_quantity' => Yii::t('FinvModule.crud', 'Fiit Quantity'),
            'fiit_cqnt_id' => Yii::t('FinvModule.crud', 'Fiit Cqnt'),
            'fiit_price' => Yii::t('FinvModule.crud', 'Fiit Price'),
            'fiit_amt' => Yii::t('FinvModule.crud', 'Fiit Amt'),
            'fiit_vat' => Yii::t('FinvModule.crud', 'Fiit Vat'),
            'fiit_total' => Yii::t('FinvModule.crud', 'Fiit Total'),
            'fiit_fvat_id' => Yii::t('FinvModule.crud', 'Fiit Fvat'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.fiit_id', $this->fiit_id, true);
        $criteria->compare('t.fiit_finv_id', $this->fiit_finv_id);
        $criteria->compare('t.fiit_desc', $this->fiit_desc, true);
        $criteria->compare('t.fiit_debet_facn_code', $this->fiit_debet_facn_code, true);
        $criteria->compare('t.fiit_credit_facn_code', $this->fiit_credit_facn_code, true);
        $criteria->compare('t.fiit_quantity', $this->fiit_quantity);
        $criteria->compare('t.fiit_cqnt_id', $this->fiit_cqnt_id);
        $criteria->compare('t.fiit_price', $this->fiit_price, true);
        $criteria->compare('t.fiit_amt', $this->fiit_amt, true);
        $criteria->compare('t.fiit_vat', $this->fiit_vat, true);
        $criteria->compare('t.fiit_total', $this->fiit_total, true);
        $criteria->compare('t.fiit_fvat_id', $this->fiit_fvat_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
