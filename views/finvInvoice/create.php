<?php
$this->setPageTitle(
    Yii::t('FinvModule.crud', 'Finv Invoice')
    . ' - '
    . Yii::t('FinvModule.crud_static', 'Create')
);

$this->breadcrumbs[Yii::t('FinvModule.crud', 'Finv Invoices')] = array('admin');
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('FinvModule.crud', 'Finv Invoice'); ?>
        <small><?php echo Yii::t('FinvModule.crud_static', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>