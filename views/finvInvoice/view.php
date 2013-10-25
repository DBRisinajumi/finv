<?php
    $this->setPageTitle(
        Yii::t('FinvModule.crud', 'Finv Invoice')
        . ' - '
        . Yii::t('FinvModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FinvModule.crud','Finv Invoices')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FinvModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FinvModule.crud','Finv Invoice')?>
    <small><?php echo Yii::t('FinvModule.crud_static','View')?> #<?php echo $model->finv_id ?></small>
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
                        'name' => 'finv_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_id',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_series_number',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_series_number',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_number',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_number',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'finv_issuer_ccmp_id',
            'value' => ($model->finvIssuerCcmp !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->finvIssuerCcmp->itemLabel,
                            array('/finv/ccmpCompany/view','ccmp_id' => $model->finvIssuerCcmp->ccmp_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/ccmpCompany/update','ccmp_id' => $model->finvIssuerCcmp->ccmp_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
        array(
            'name' => 'finv_payer_ccmp_id',
            'value' => ($model->finvPayerCcmp !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->finvPayerCcmp->itemLabel,
                            array('/finv/ccmpCompany/view','ccmp_id' => $model->finvPayerCcmp->ccmp_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/ccmpCompany/update','ccmp_id' => $model->finvPayerCcmp->ccmp_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'finv_reg_date',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_reg_date',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_date',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_date',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_budget_date',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_budget_date',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_due_date',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_due_date',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_notes',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_notes',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'finv_fcrn_id',
            'value' => ($model->finvFcrn !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->finvFcrn->itemLabel,
                            array('/finv/fcrnCurrency/view','fcrn_id' => $model->finvFcrn->fcrn_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/fcrnCurrency/update','fcrn_id' => $model->finvFcrn->fcrn_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'finv_amt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_amt',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_vat',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_vat',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_total',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_total',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'finv_basic_fcrn_id',
            'value' => ($model->finvBasicFcrn !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->finvBasicFcrn->itemLabel,
                            array('/finv/fcrnCurrency/view','fcrn_id' => $model->finvBasicFcrn->fcrn_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/fcrnCurrency/update','fcrn_id' => $model->finvBasicFcrn->fcrn_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'finv_basic_amt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_basic_amt',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_basic_vat',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_basic_vat',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_basic_total',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_basic_total',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'finv_basic_payment_before',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_basic_payment_before',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'finv_stst_id',
            'value' => ($model->finvStst !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->finvStst->itemLabel,
                            array('/finv/ststState/view','stst_id' => $model->finvStst->stst_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/finv/ststState/update','stst_id' => $model->finvStst->stst_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'finv_paid',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'finv_paid',
                                'url' => $this->createUrl('/finv/finvInvoice/editableSaver'),
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