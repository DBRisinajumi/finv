<?php
    $this->setPageTitle(
        Yii::t('FinvModule.crud', 'Fiit Invoice Item')
        . ' - '
        . Yii::t('FinvModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FinvModule.crud','Fiit Invoice Items')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FinvModule.crud','Fiit Invoice Item')?>
    <small><?php echo Yii::t('FinvModule.crud_static','View')?> #<?php echo $model->fiit_id ?></small>
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
                        'name' => 'fiit_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_id',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'fiit_finv_id',
            'value' => ($model->fiitFinv !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fiitFinv->itemLabel,
                            array('/finv/finvInvoice/view','finv_id' => $model->fiitFinv->finv_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/finvInvoice/update','finv_id' => $model->fiitFinv->finv_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'fiit_desc',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_desc',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fiit_debet_facn_code',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_debet_facn_code',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fiit_credit_facn_code',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_credit_facn_code',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'fiit_fprc_id',
            'value' => ($model->fiitFprc !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fiitFprc->itemLabel,
                            array('/finv/fprcProductCategory/view','fprc_id' => $model->fiitFprc->fprc_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/fprcProductCategory/update','fprc_id' => $model->fiitFprc->fprc_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'fiit_quantity',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_quantity',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'fiit_fqnt_id',
            'value' => ($model->fiitFqnt !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fiitFqnt->itemLabel,
                            array('/finv/fqntQuantity/view','fqnt_id' => $model->fiitFqnt->fqnt_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/fqntQuantity/update','fqnt_id' => $model->fiitFqnt->fqnt_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'fiit_price',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_price',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fiit_amt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_amt',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fiit_vat',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_vat',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fiit_total',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fiit_total',
                                'url' => $this->createUrl('/finv/fiitInvoiceItem/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'fiit_fvat_id',
            'value' => ($model->fiitFvat !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fiitFvat->itemLabel,
                            array('/finv/fvatVat/view','fvat_id' => $model->fiitFvat->fvat_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/fvatVat/update','fvat_id' => $model->fiitFvat->fvat_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
           ),
        )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>    </div>
</div>