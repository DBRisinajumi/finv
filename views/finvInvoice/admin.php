<?php
$this->setPageTitle(
    Yii::t('FinvModule.crud', 'Finv Invoices')
    . ' - '
    . Yii::t('FinvModule.crud_static', 'Manage')
);

$this->breadcrumbs[] = Yii::t('FinvModule.crud', 'Finv Invoices');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'finv-invoice-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('FinvModule.crud', 'Finv Invoices'); ?>
        <small><?php echo Yii::t('FinvModule.crud_static', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('FinvInvoice.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'finv-invoice-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("finv_id" => $data["finv_id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_id',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_series_number',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_number',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'finv_issuer_ccmp_id',
                'value' => 'CHtml::value($data, \'finvIssuerCcmp.itemLabel\')',
                'filter' => '',//CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),
            ),
            array(
                'name' => 'finv_payer_ccmp_id',
                'value' => 'CHtml::value($data, \'finvPayerCcmp.itemLabel\')',
                'filter' => '',//CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_reg_date',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_date',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_budget_date',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_due_date',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'finv_notes',
            array(
                'name' => 'finv_fcrn_id',
                'value' => 'CHtml::value($data, \'finvFcrn.itemLabel\')',
                'filter' => '',//CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_amt',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_vat',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_total',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'finv_basic_fcrn_id',
                'value' => 'CHtml::value($data, \'finvBasicFcrn.itemLabel\')',
                'filter' => '',//CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_basic_amt',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_basic_vat',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_basic_total',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_basic_payment_before',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'finv_stst_id',
                'value' => 'CHtml::value($data, \'finvStst.itemLabel\')',
                'filter' => '',//CHtml::listData(StstState::model()->findAll(array('limit' => 1000)), 'stst_id', 'itemLabel'),
            ),*/
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'finv_paid',
                'value' => '$data->getEnumLabel(\'finv_paid\',$data->finv_paid)',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    'source' => $model->getEnumFieldValuetext('finv_paid'),
                    //'placement' => 'right',
                ),
               'filter' => $model->getEnumFieldLabels('finv_paid'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'finv_ref',
                'value' => '$data->getEnumLabel(\'finv_ref\',$data->finv_ref)',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    'source' => $model->getEnumFieldValuetext('finv_ref'),
                    //'placement' => 'right',
                ),
               'filter' => $model->getEnumFieldLabels('finv_ref'),
            ),/*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'finv_ref_id',
                'editable' => array(
                    'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FinvInvoice.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FinvInvoice.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FinvInvoice.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("finv_id" => $data->finv_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("finv_id" => $data->finv_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("finv_id" => $data->finv_id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('FinvInvoice.view.grid'); ?>