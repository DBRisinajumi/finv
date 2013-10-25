<?php
$this->setPageTitle(
    Yii::t('FinvModule.crud', 'Fqnt Quantities')
    . ' - '
    . Yii::t('FinvModule.crud_static', 'Manage')
);

$this->breadcrumbs[] = Yii::t('FinvModule.crud', 'Fqnt Quantities');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'fqnt-quantity-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('FinvModule.crud', 'Fqnt Quantities'); ?>
        <small><?php echo Yii::t('FinvModule.crud_static', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fqnt-quantity-grid',
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
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fqnt_id" => $data["fqnt_id"]))'
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fqnt_id',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fqntQuantity/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fqnt_code',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fqntQuantity/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fqnt_name',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fqntQuantity/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FqntQuantity.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FqntQuantity.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FqntQuantity.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fqnt_id" => $data->fqnt_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fqnt_id" => $data->fqnt_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fqnt_id" => $data->fqnt_id))',
            ),
        )
    )
);
?>