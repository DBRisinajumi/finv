<?php
$this->setPageTitle(
    Yii::t('FinvModule.crud', 'Fprc Product Categories')
    . ' - '
    . Yii::t('FinvModule.crud_static', 'Manage')
);

$this->breadcrumbs[] = Yii::t('FinvModule.crud', 'Fprc Product Categories');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'fprc-product-category-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('FinvModule.crud', 'Fprc Product Categories'); ?>
        <small><?php echo Yii::t('FinvModule.crud_static', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fprc-product-category-grid',
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
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fprc_id" => $data["fprc_id"]))'
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fprc_id',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fprcProductCategory/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fprc_code',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fprcProductCategory/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fprc_name',
                'editable' => array(
                    'url' => $this->createUrl('/finv/fprcProductCategory/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FprcProductCategory.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FprcProductCategory.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Finv.FprcProductCategory.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fprc_id" => $data->fprc_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fprc_id" => $data->fprc_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fprc_id" => $data->fprc_id))',
            ),
        )
    )
);
?>