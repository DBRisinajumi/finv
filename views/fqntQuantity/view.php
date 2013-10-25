<?php
    $this->setPageTitle(
        Yii::t('FinvModule.crud', 'Fqnt Quantity')
        . ' - '
        . Yii::t('FinvModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FinvModule.crud','Fqnt Quantities')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FinvModule.crud','Fqnt Quantity')?>
    <small><?php echo Yii::t('FinvModule.crud_static','View')?> #<?php echo $model->fqnt_id ?></small>
    </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>


<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('FinvModule.crud_static','Data')?>            <small>
                <?php echo $model->itemLabel?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'fqnt_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fqnt_id',
                                'url' => $this->createUrl('/finv/fqntQuantity/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fqnt_code',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fqnt_code',
                                'url' => $this->createUrl('/finv/fqntQuantity/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fqnt_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fqnt_name',
                                'url' => $this->createUrl('/finv/fqntQuantity/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>    </div>
</div>