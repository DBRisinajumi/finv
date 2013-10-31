<?php

// auto-loading
Yii::setPathOfAlias('FinvInvoice', dirname(__FILE__));
Yii::import('FinvInvoice.*');

class FinvInvoice extends BaseFinvInvoice {

    public $fiit = array();

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

    public function behaviors() {
        return array_merge(
                parent::behaviors(), array()
        );
    }

    public function rules() {
        return array_merge(
                parent::rules()
                /* , array(
                  array('column1, column2', 'rule1'),
                  array('column3', 'rule2'),
                  ) */
        );
    }

    /**
     * ideja par fikso funkciju
     * @param type $param
     * @param type $scenario
     * @param type $error
     * @return boolean
     */
    static function p3insert($param, $scenario = FALSE, &$error) {
        $model = new FinvInvoice;
        if ($scenario) {
            $model->scenario = $this->scenario; //rulles var definēt pārbaudi
        }

        $model->attributes = $param;

        try {
            if ($model->save()) {
                return $model->primaryKey();
            }
            $error = $model->errors;
            return FALSE;
        } catch (Exception $e) {
            $model->addError('finv_id', $e->getMessage());
            return FALSE;
        }
    }

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

    public function getInvoiceErrors() {
        $error = $this->errors;
        foreach ($this->fiit as $fiit) {
            $error = array_merge($error, $fiit->errors);
        }
        return $error;
    }

    public function getTotalsBasicTotal(){
        $criteria=$this->getSearchCriteria();
        $criteria->select='SUM(finv_basic_total)';
        return number_format($this->commandBuilder->createFindCommand($this->getTableSchema(),$criteria)->queryScalar(),2,'.','');
    }

    public function search($criteria = null)
    {
        $criteria = $this->getSearchCriteria($criteria);
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }


}
