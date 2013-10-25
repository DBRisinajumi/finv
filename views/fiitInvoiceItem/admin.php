<?php
$this->setPageTitle(
    Yii::t('FinvModule.crud', 'Fiit Invoice Items')
    . ' - '
    . Yii::t('FinvModule.crud_static', 'Manage')
);

$this->breadcrumbs[] = Yii::t('FinvModule.crud', 'Fiit Invoice Items');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'fiit-invoice-item-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('FinvModule.crud', 'Fiit Invoice Items'); ?>
        <small><?php echo Yii::t('FinvModule.crud_static', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fiit-invoice-item-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{pager}{summary}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fiit_id" => $data["fiit_id"]))'
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_id',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'fiit_finv_id',
                'value' => 'CHtml::value($data, \'fiitFinv.itemLabel\')',
                'filter' => CHtml::listData(FinvInvoice::model()->findAll(array('limit' => 1000)), 'finv_id', 'itemLabel'),
            ),
            #'fiit_desc',
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_debet_facn_code',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_credit_facn_code',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'fiit_fprc_id',
                'value' => 'CHtml::value($data, \'fiitFprc.itemLabel\')',
                'filter' => CHtml::listData(FprcProductCategory::model()->findAll(array('limit' => 1000)), 'fprc_id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_quantity',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'fiit_fqnt_id',
                'value' => 'CHtml::value($data, \'fiitFqnt.itemLabel\')',
                'filter' => CHtml::listData(FqntQuantity::model()->findAll(array('limit' => 1000)), 'fqnt_id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_price',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_amt',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_vat',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fiit_total',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'fiit_fvat_id',
                'value' => 'CHtml::value($data, \'fiitFvat.itemLabel\')',
                'filter' => CHtml::listData(FvatVat::model()->findAll(array('limit' => 1000)), 'fvat_id', 'itemLabel'),
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FiitInvoiceItem.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FiitInvoiceItem.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FiitInvoiceItem.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fiit_id" => $data->fiit_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fiit_id" => $data->fiit_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fiit_id" => $data->fiit_id))',
            ),
        )
    )
);
?>