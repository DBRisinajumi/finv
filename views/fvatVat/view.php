<?php
    $this->setPageTitle(
        Yii::t('FinvModule.crud', 'Fvat Vat')
        . ' - '
        . Yii::t('FinvModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FinvModule.crud','Fvat Vats')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FinvModule.crud','Fvat Vat')?>
    <small><?php echo Yii::t('FinvModule.crud_static','View')?> #<?php echo $model->fvat_id ?></small>
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
                        'name' => 'fvat_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fvat_id',
                                'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fvat_rate',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fvat_rate',
                                'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fvat_label',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fvat_label',
                                'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fvat_order',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fvat_order',
                                'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fvat_hide',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fvat_hide',
                                'url' => $this->createUrl('/finv/fvatVat/editableSaver'),
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