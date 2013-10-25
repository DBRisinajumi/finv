<?php
$this->setPageTitle(
    Yii::t('FinvModule.crud', 'Fvat Vats')
    . ' - '
    . Yii::t('FinvModule.crud_static', 'Manage')
);

$this->breadcrumbs[] = Yii::t('FinvModule.crud', 'Fvat Vats');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'fvat-vat-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('FinvModule.crud', 'Fvat Vats'); ?>
        <small><?php echo Yii::t('FinvModule.crud_static', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fvat-vat-grid',
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
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fvat_id" => $data["fvat_id"]))'
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fvat_id',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fvat_rate',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fvat_label',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fvat_order',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fvat_hide',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FvatVat.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FvatVat.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FvatVat.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fvat_id" => $data->fvat_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fvat_id" => $data->fvat_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fvat_id" => $data->fvat_id))',
            ),
        )
    )
);
?>