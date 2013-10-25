<?php
$this->setPageTitle(
        Yii::t('FinvModule.crud', 'Fqnt Quantity')
        . ' - '
        . Yii::t('FinvModule.crud_static', 'Update')
        . ': '   
        . $model->getItemLabel()
);    
$this->breadcrumbs[Yii::t('FinvModule.crud','Fqnt Quantities')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        
        <?php echo Yii::t('FinvModule.crud','Fqnt Quantity'); ?>
        <small>
            <?php echo Yii::t('FinvModule.crud_static','Update')?> #<?php echo $model->fqnt_id ?>
        </small>
        
    </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<?php
    $this->renderPartial('_form', array('model' => $model));
?>
