<?php

// auto-loading
Yii::setPathOfAlias('FiitInvoiceItem', dirname(__FILE__));
Yii::import('FiitInvoiceItem.*');

class FiitInvoiceItem extends BaseFiitInvoiceItem
{

    //invoice attribute
    public $finv_ref = 'BPRD';
    public $finv_ref_id;
    
    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    public function getTotalsFiitQuantity(){
        $criteria=$this->getSearchCriteriaStatement();
        $criteria->select='SUM(fiit_quantity)';
        return number_format($this->commandBuilder->createFindCommand($this->getTableSchema(),$criteria)->queryScalar(),2,'.','');
    }

    public function getTotalsFiitTotal(){
        $criteria=$this->getSearchCriteriaStatement();
        $criteria->select='SUM(fiit_total)';
        return number_format($this->commandBuilder->createFindCommand($this->getTableSchema(),$criteria)->queryScalar(),2,'.','');
    }
}
