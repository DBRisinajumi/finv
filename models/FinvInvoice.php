<?php

// auto-loading
Yii::setPathOfAlias('FinvInvoice', dirname(__FILE__));
Yii::import('FinvInvoice.*');

class FinvInvoice extends BaseFinvInvoice {

    public $fiit = array();

    public $finv_date_from;
    public $finv_date_to;
    public $finv_due_date_from;
    public $finv_due_date_to;
    public $range;


    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getItemLabel() {
        return parent::getItemLabel();
    }

    public function getSeriesNumber() {
        return $this->finv_series_number . '-'.$this->finv_number;
    }

    public function behaviors() {
        return array_merge(
                parent::behaviors(), array()
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('finv_date_from,finv_date_to,finv_due_date_from,finv_due_date_to', 'safe', 'on' => 'search'),
            )
        );
    }

    /**
     * create new invoice
     * @param array $invoice
     * @return FALSE/int finv_id
     */
    public function createInvoice($invoice) {

        //default values
        $invoice['finv_reg_date'] = date('Y-m-d');

        //create invoice record
        $this->attributes = $invoice;
        try {
            if (!$this->save()) {
                return FALSE;
            }
        } catch (Exception $e) {
            $this->addError('finv_id', $e->getMessage());
            return FALSE;
        }
        return $this->finv_id;
    }

    /**
     * add item to invoice
     * @param array $item
     * @return int fiit_id
     */
    public function insertInvoiceItem($item) {
        $fiit = new FiitInvoiceItem;
        $fiit->attributes = $item;
        $fiit->fiit_finv_id = $this->finv_id;

        try {
            if (!$fiit->save()) {
                $this->fiit[] = $fiit;
                return FALSE;
            }
            $this->fiit[] = $fiit;
        } catch (Exception $e) {
            $fiit->addError('fiit_id', $e->getMessage());
            $this->fiit[] = $fiit;
            return FALSE;
        }
        return $fiit->fiit_id;
    }

    /**
     * recalc totals
     */
    public function recalcInvoice($finv_id) {
        $this->unsetAttributes();
        $this->finv_id = $finv_id;
        $this->refresh();
        $this->finv_amt = 0;
        $this->finv_total = 0;
        $this->finv_vat = 0;

        $criteria = new CDbCriteria;
        $criteria->compare('t.fiit_finv_id', $finv_id);
        //$fiit_model = new FiitInvoiceItem();
        //$fiit_model->setAttribute('fiit_finv_id', $finv_id);
        $fiits = FiitInvoiceItem::model()->findAll($criteria);
        foreach ($fiits as $fiit) {
            $fiit->fiit_amt = round($fiit->fiit_price * $fiit->fiit_quantity, 2);
            $fiit->fiit_total = $fiit->fiit_amt;
            $fiit->fiit_vat = 0;
            try {
                if (!$fiit->save()) {
                    $this->addError('fiit_id', 'Can not update fiit item');
                    return FALSE;
                }
            } catch (Exception $e) {
                $this->addError('', $e->getMessage());
                return FALSE;
            }

            $this->finv_amt += $fiit->fiit_amt;
            $this->finv_total += $fiit->fiit_total;
            $this->finv_vat += $fiit->fiit_vat;
        }

        $this->finv_basic_amt = Yii::app()->currency->convertToBase($this->finv_amt, $this->finv_fcrn_id, $this->finv_date);
        $this->finv_basic_total = Yii::app()->currency->convertToBase($this->finv_total, $this->finv_fcrn_id, $this->finv_date);
        $this->finv_basic_vat = Yii::app()->currency->convertToBase($this->finv_vat, $this->finv_fcrn_id, $this->finv_date);
        try {
            if (!$this->save()) {
                $this->addError('finv_id', 'Can not update finv record');
                return FALSE;
            }
        } catch (Exception $e) {
            $this->addError('finv_id', $e->getMessage());
            return FALSE;
        }

        return TRUE;
    }

    public function getInvoiceErrors() {
        $error = $this->errors;
        foreach ($this->fiit as $fiit) {
            $error = array_merge($error, $fiit->errors);
        }
        return $error;
    }

    public function getTotalsBasicTotal() {
        $criteria = $this->getSearchCriteria();
        $criteria->select = 'SUM(finv_basic_total)';
        return number_format($this->commandBuilder->createFindCommand($this->getTableSchema(), $criteria)->queryScalar(), 2, '.', '');
    }

    public function getTotalsTotal() {
        $criteria = $this->getSearchCriteria();
        $criteria->select = 'SUM(finv_total)';
        return number_format($this->commandBuilder->createFindCommand($this->getTableSchema(), $criteria)->queryScalar(), 2, '.', '');
    }

    public function getFinvIdList() {
        $criteria = $this->getSearchCriteria();
        $criteria->select = 'GROUP_CONCAT(finv_id SEPARATOR ",")';
        $list = $this->commandBuilder->createFindCommand($this->getTableSchema(), $criteria)->queryScalar();
        return trim(trim($list),',');
    }
    
    public function getCssClass(){
        
        $today = date('Y-m-d');
        if (strtotime($this->finv_due_date) >= strtotime($today))
        {
            return 'row-pending';
        }
        elseif ($this->finv_paid == 'not paid') return 'row-notpaid';
        elseif ($this->finv_paid == 'is paid') return 'row-paid';
        elseif ($this->finv_paid == 'partly paid') return 'row-partlypaid';
    }
            

    public function getSearchCriteria($criteria = null) {

        $criteria = parent::getSearchCriteria($criteria);

        /**
         * filter date to from
         */
        if(!empty($this->finv_date_from)){
            $criteria->AddCondition("t.finv_date >= '".$this->finv_date_from."'");
        }

        if(!empty($this->finv_date_to)){
            $criteria->AddCondition("t.finv_date <= '".$this->finv_date_to."'");
        }

        if(!empty($this->finv_due_date_from)){
            $criteria->AddCondition("t.finv_due_date >= '".$this->finv_due_date_from."'");
        }

        if(!empty($this->finv_due_date_to)){
            $criteria->AddCondition("t.finv_due_date <= '".$this->finv_due_date_to."'");
        }
        
        if(!empty($this->range) ) DbrLib::addRangeCriteria ($criteria, $this->range, 't.finv_due_date');

        return $criteria;

    }

    public function search($criteria = null) {

        $criteria = $this->getSearchCriteria($criteria);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
            'sort' => array('defaultOrder' => 'finv_series_number, LPAD(finv_number,10,\' \')',
         )));
    }

}
