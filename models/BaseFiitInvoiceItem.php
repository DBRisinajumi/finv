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
 * @property integer $fiit_fprc_id
 * @property double $fiit_quantity
 * @property integer $fiit_fqnt_id
 * @property string $fiit_price
 * @property string $fiit_amt
 * @property string $fiit_vat
 * @property string $fiit_total
 * @property integer $fiit_fvat_id
 *
 * Relations of table "fiit_invoice_item" available as properties of the model:
 * @property FinvInvoice $fiitFinv
 * @property FvatVat $fiitFvat
 * @property FprcProductCategory $fiitFprc
 * @property FqntQuantity $fiitFqnt
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
                array('fiit_finv_id, fiit_quantity, fiit_price, fiit_amt, fiit_total', 'required'),
                array('fiit_desc, fiit_debet_facn_code, fiit_credit_facn_code, fiit_fprc_id, fiit_fqnt_id, fiit_vat, fiit_fvat_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('fiit_finv_id, fiit_fprc_id, fiit_fqnt_id, fiit_fvat_id', 'numerical', 'integerOnly' => true),
                array('fiit_quantity', 'numerical'),
                array('fiit_debet_facn_code, fiit_credit_facn_code', 'length', 'max' => 20),
                array('fiit_price, fiit_amt, fiit_vat, fiit_total', 'length', 'max' => 10),
                array('fiit_desc', 'safe'),
                array('fiit_id, fiit_finv_id, fiit_desc, fiit_debet_facn_code, fiit_credit_facn_code, fiit_fprc_id, fiit_quantity, fiit_fqnt_id, fiit_price, fiit_amt, fiit_vat, fiit_total, fiit_fvat_id', 'safe', 'on' => 'search'),
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
            'fiitFinv' => array(self::BELONGS_TO, 'FinvInvoice', 'fiit_finv_id'),
            'fiitFvat' => array(self::BELONGS_TO, 'FvatVat', 'fiit_fvat_id'),
            'fiitFprc' => array(self::BELONGS_TO, 'FprcProductCategory', 'fiit_fprc_id'),
            'fiitFqnt' => array(self::BELONGS_TO, 'FqntQuantity', 'fiit_fqnt_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fiit_id' => Yii::t('FinvModule.crud', 'FiitId'),
            'fiit_finv_id' => Yii::t('FinvModule.crud', 'FinvId'),
            'fiit_desc' => Yii::t('FinvModule.crud', 'Description'),
            'fiit_debet_facn_code' => Yii::t('FinvModule.crud', 'Debet account'),
            'fiit_credit_facn_code' => Yii::t('FinvModule.crud', 'Credit account'),
            'fiit_fprc_id' => Yii::t('FinvModule.crud', 'Price'),
            'fiit_quantity' => Yii::t('FinvModule.crud', 'Quantity'),
            'fiit_fqnt_id' => Yii::t('FinvModule.crud', 'Measure'),
            'fiit_price' => Yii::t('FinvModule.crud', 'Unit price'),
            'fiit_amt' => Yii::t('FinvModule.crud', 'Amount'),
            'fiit_vat' => Yii::t('FinvModule.crud', 'VAT amount'),
            'fiit_total' => Yii::t('FinvModule.crud', 'Total'),
            'fiit_fvat_id' => Yii::t('FinvModule.crud', 'VAT'),
        );
    }

    public function getSearchCriteriaStatement($criteria = null){
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.fiit_id', $this->fiit_id, true);
        $criteria->compare('t.fiit_finv_id', $this->fiit_finv_id);
        $criteria->compare('t.fiit_desc', $this->fiit_desc, true);
        $criteria->compare('t.fiit_debet_facn_code', $this->fiit_debet_facn_code, true);
        $criteria->compare('t.fiit_credit_facn_code', $this->fiit_credit_facn_code, true);
        $criteria->compare('t.fiit_fprc_id', $this->fiit_fprc_id);
        $criteria->compare('t.fiit_quantity', $this->fiit_quantity);
        $criteria->compare('t.fiit_fqnt_id', $this->fiit_fqnt_id);
        $criteria->compare('t.fiit_price', $this->fiit_price, true);
        $criteria->compare('t.fiit_amt', $this->fiit_amt, true);
        $criteria->compare('t.fiit_vat', $this->fiit_vat, true);
        $criteria->compare('t.fiit_total', $this->fiit_total, true);
        $criteria->compare('t.fiit_fvat_id', $this->fiit_fvat_id);
        
        if ($this->finv_ref_id) $criteria->addCondition ("finv_ref = 'BPRD' AND finv_ref_id =".$this->finv_ref_id);
        
        $criteria->join = 'INNER JOIN finv_invoice ON fiit_finv_id = finv_id';
        return $criteria;
        
    }
    public function search($criteria = null)
    {
        $criteria = $this->getSearchCriteriaStatement($criteria);
        return  new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
            'sort' => array('defaultOrder' => 'finv_number'),
        ));
    }

}
