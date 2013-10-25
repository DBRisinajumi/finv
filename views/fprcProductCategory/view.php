<?php
    $this->setPageTitle(
        Yii::t('FinvModule.crud', 'Fprc Product Category')
        . ' - '
        . Yii::t('FinvModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FinvModule.crud','Fprc Product Categories')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FinvModule.crud','Fprc Product Category')?>
    <small><?php echo Yii::t('FinvModule.crud_static','View')?> #<?php echo $model->fprc_id ?></small>
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
                        'name' => 'fprc_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fprc_id',
                                'url' => $this->createUrl('/finv/fprcProductCategory/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fprc_code',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fprc_code',
                                'url' => $this->createUrl('/finv/fprcProductCategory/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fprc_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fprc_name',
                                'url' => $this->createUrl('/finv/fprcProductCategory/editableSaver'),
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