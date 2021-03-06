<?php

/**
 * This is the model base class for the table "finv_invoice".
 *
 * Columns in table "finv_invoice" available as properties of the model:
 * @property integer $finv_id
 * @property string $finv_series_number
 * @property string $finv_number
 * @property string $finv_issuer_ccmp_id
 * @property string $finv_payer_ccmp_id
 * @property string $finv_reg_date
 * @property string $finv_date
 * @property string $finv_budget_date
 * @property string $finv_due_date
 * @property string $finv_notes
 * @property integer $finv_fcrn_id
 * @property string $finv_amt
 * @property string $finv_vat
 * @property string $finv_total
 * @property integer $finv_basic_fcrn_id
 * @property string $finv_basic_amt
 * @property string $finv_basic_vat
 * @property string $finv_basic_total
 * @property string $finv_basic_payment_before
 * @property integer $finv_stst_id
 * @property integer $finv_paid
 *
 * Relations of table "finv_invoice" available as properties of the model:
 * @property FiitInvoiceItem[] $fiitInvoiceItems
 * @property CcmpCompany $finvIssuerCcmp
 * @property CcmpCompany $finvPayerCcmp
 * @property FcrnCurrency $finvFcrn
 * @property FcrnCurrency $finvBasicFcrn
 * @property StstState $finvStst
 */
abstract class BaseFinvInvoice extends CActiveRecord
{
    /**
    * ENUM field values as constants
    */
    const FINV_PAID_IS_PAID = 'is paid';
    const FINV_PAID_NOT_PAID = 'not paid';
    const FINV_PAID_PARTLY_PAID = 'partly paid';
    const FINV_REF_BPRD = 'BPRD';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'finv_invoice';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('finv_number, finv_issuer_ccmp_id, finv_payer_ccmp_id, finv_reg_date, finv_fcrn_id, finv_basic_fcrn_id', 'required'),
                array('finv_series_number, finv_date, finv_budget_date, finv_due_date, finv_notes, finv_amt, finv_vat, finv_total, finv_basic_amt, finv_basic_vat, finv_basic_total, finv_basic_payment_before, finv_stst_id, finv_paid, finv_ref,finv_ref_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('finv_fcrn_id, finv_basic_fcrn_id, finv_stst_id', 'numerical', 'integerOnly' => true),
                array('finv_series_number, finv_issuer_ccmp_id, finv_payer_ccmp_id, finv_amt, finv_vat, finv_total, finv_basic_amt, finv_basic_vat, finv_basic_total, finv_basic_payment_before', 'length', 'max' => 10),
                array('finv_number', 'length', 'max' => 20),
                array('finv_paid', 'length', 'max' => 11),
                array('finv_date, finv_budget_date, finv_due_date, finv_notes, finv_ref,finv_ref_id', 'safe'),
                array('finv_id, finv_series_number, finv_number, finv_issuer_ccmp_id, finv_payer_ccmp_id, finv_reg_date, finv_date, finv_budget_date, finv_due_date, finv_notes, finv_fcrn_id, finv_amt, finv_vat, finv_total, finv_basic_fcrn_id, finv_basic_amt, finv_basic_vat, finv_basic_total, finv_basic_payment_before, finv_stst_id, finv_paid', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->finv_series_number;
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
            'fiitInvoiceItems' => array(self::HAS_MANY, 'FiitInvoiceItem', 'fiit_finv_id'),
            'finvIssuerCcmp' => array(self::BELONGS_TO, 'CcmpCompany', 'finv_issuer_ccmp_id'),
            'finvPayerCcmp' => array(self::BELONGS_TO, 'CcmpCompany', 'finv_payer_ccmp_id'),
            'finvFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'finv_fcrn_id'),
            'finvBasicFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'finv_basic_fcrn_id'),
            'finvStst' => array(self::BELONGS_TO, 'StstState', 'finv_stst_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'finv_id' => Yii::t('FinvModule.crud', 'FinvId'),
            'finv_series_number' => Yii::t('FinvModule.crud', 'Series'),
            'finv_number' => Yii::t('FinvModule.crud', 'Number'),
            'finv_issuer_ccmp_id' => Yii::t('FinvModule.crud', 'Issuer'),
            'finv_payer_ccmp_id' => Yii::t('FinvModule.crud', 'Payer'),
            'finv_reg_date' => Yii::t('FinvModule.crud', 'Registred'),
            'finv_date' => Yii::t('FinvModule.crud', 'Date'),
            'finv_budget_date' => Yii::t('FinvModule.crud', 'Budget Date'),
            'finv_due_date' => Yii::t('FinvModule.crud', 'Due Date'),
            'finv_notes' => Yii::t('FinvModule.crud', 'Notes'),
            'finv_fcrn_id' => Yii::t('FinvModule.crud', 'Currency'),
            'finv_amt' => Yii::t('FinvModule.crud', 'Amount'),
            'finv_vat' => Yii::t('FinvModule.crud', 'VAT'),
            'finv_total' => Yii::t('FinvModule.crud', 'Total'),
            'finv_basic_fcrn_id' => Yii::t('FinvModule.crud', 'Base currency'),
            'finv_basic_amt' => Yii::t('FinvModule.crud', 'Base amount'),
            'finv_basic_vat' => Yii::t('FinvModule.crud', 'Base VAT'),
            'finv_basic_total' => Yii::t('FinvModule.crud', 'Base Total'),
            'finv_basic_payment_before' => Yii::t('FinvModule.crud', 'Base Payment Before'),
            'finv_stst_id' => Yii::t('FinvModule.crud', 'Status'),
            'finv_paid' => Yii::t('FinvModule.crud', 'Payment status'),
            'finv_ref' => Yii::t('FinvModule.crud', 'REF'),
            'finv_ref_id' => Yii::t('FinvModule.crud', 'REF ID'),
        );
    }

    public function enumLabels()
    {
        return array(
           'finv_paid' => array(
               'is paid' => Yii::t('FinvModule.crud', 'Is Paid'),
               'not paid' => Yii::t('FinvModule.crud', 'Not Paid'),
               'partly paid' => Yii::t('FinvModule.crud', 'Partly Paid'),
           ),
           'finv_ref' => array(
               'BPRD' => Yii::t('FinvModule.crud', 'Bprd'),
           ),
            );
    }

    public function getEnumFieldLabels($column){

        $aLabels = $this->enumLabels();
        if(!isset($aLabels[$column])){
            return FALSE;
        }
        return $aLabels[$column];
    }

    public function getEnumFieldValuetext($column){

        $aLabels = $this->enumLabels();
        if(!isset($aLabels[$column])){
            return FALSE;
        }
        $aVT = array();
        foreach($aLabels[$column] as $value => $text){
            $aVT[] = array('value'=>$value,'text'=>$text);
        }
        return $aVT;
    }

    public function getEnumLabel($column,$value){

        $aLabels = $this->enumLabels();

        if(!isset($aLabels[$column])){
            return $value;
        }

        if(!isset($aLabels[$column][$value])){
            return $value;
        }

        return $aLabels[$column][$value];
    }

    public function getSearchCriteria($criteria = null){
        
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.finv_id', $this->finv_id);
        $criteria->compare('t.finv_series_number', $this->finv_series_number, true);
        $criteria->compare('t.finv_number', $this->finv_number, true);
        $criteria->compare('t.finv_issuer_ccmp_id', $this->finv_issuer_ccmp_id);
        $criteria->compare('t.finv_payer_ccmp_id', $this->finv_payer_ccmp_id);
        $criteria->compare('t.finv_reg_date', $this->finv_reg_date, true);
        $criteria->compare('t.finv_date', $this->finv_date, true);
        $criteria->compare('t.finv_budget_date', $this->finv_budget_date, true);
        $criteria->compare('t.finv_due_date', $this->finv_due_date, true);
        $criteria->compare('t.finv_notes', $this->finv_notes, true);
        $criteria->compare('t.finv_fcrn_id', $this->finv_fcrn_id);
        $criteria->compare('t.finv_amt', $this->finv_amt, true);
        $criteria->compare('t.finv_vat', $this->finv_vat, true);
        $criteria->compare('t.finv_total', $this->finv_total, true);
        $criteria->compare('t.finv_basic_fcrn_id', $this->finv_basic_fcrn_id);
        $criteria->compare('t.finv_basic_amt', $this->finv_basic_amt, true);
        $criteria->compare('t.finv_basic_vat', $this->finv_basic_vat, true);
        $criteria->compare('t.finv_basic_total', $this->finv_basic_total, true);
        $criteria->compare('t.finv_basic_payment_before', $this->finv_basic_payment_before, true);
        $criteria->compare('t.finv_stst_id', $this->finv_stst_id);
        $criteria->compare('t.finv_paid', $this->finv_paid);
        $criteria->compare('t.finv_ref', $this->finv_ref);
        $criteria->compare('t.finv_ref_id', $this->finv_ref_id);
        
        if(Yii::app()->sysCompany->getActiveCompany()){
            $criteria->compare('finv_issuer_ccmp_id', Yii::app()->sysCompany->getActiveCompany());
        } 
        
        
        return $criteria;
        
    }

}
