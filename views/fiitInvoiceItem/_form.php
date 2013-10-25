<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fiit-invoice-item-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span7"> <!-- main inputs -->
            <h2>
                <?php echo Yii::t('FinvModule.crud_static','Data')?>                <small>
                    <?php echo $model->itemLabel ?>
                </small>

            </h2>


            <div class="form-horizontal">

                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <?php
                            ;
                            echo $form->error($model,'fiit_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_id')) != 'FiitInvoiceItem.fiit_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_finv_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'fiitFinv',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'fiit_finv_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_finv_id')) != 'FiitInvoiceItem.fiit_finv_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_desc') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textArea($model, 'fiit_desc', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'fiit_desc')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_desc')) != 'FiitInvoiceItem.fiit_desc')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_debet_facn_code') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_debet_facn_code', array('size' => 20, 'maxlength' => 20));
                            echo $form->error($model,'fiit_debet_facn_code')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_debet_facn_code')) != 'FiitInvoiceItem.fiit_debet_facn_code')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_credit_facn_code') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_credit_facn_code', array('size' => 20, 'maxlength' => 20));
                            echo $form->error($model,'fiit_credit_facn_code')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_credit_facn_code')) != 'FiitInvoiceItem.fiit_credit_facn_code')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_fprc_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'fiitFprc',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'fiit_fprc_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_fprc_id')) != 'FiitInvoiceItem.fiit_fprc_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_quantity') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_quantity');
                            echo $form->error($model,'fiit_quantity')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_quantity')) != 'FiitInvoiceItem.fiit_quantity')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_fqnt_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'fiitFqnt',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'fiit_fqnt_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_fqnt_id')) != 'FiitInvoiceItem.fiit_fqnt_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_price') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_price', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fiit_price')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_price')) != 'FiitInvoiceItem.fiit_price')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_amt') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_amt', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fiit_amt')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_amt')) != 'FiitInvoiceItem.fiit_amt')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_vat') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_vat', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fiit_vat')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_vat')) != 'FiitInvoiceItem.fiit_vat')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_total') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fiit_total', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fiit_total')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_total')) != 'FiitInvoiceItem.fiit_total')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fiit_fvat_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'fiitFvat',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'fiit_fvat_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FiitInvoiceItem.fiit_fvat_id')) != 'FiitInvoiceItem.fiit_fvat_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- main inputs -->

        <div class="span5"> <!-- sub inputs -->
            <h2>
                <?php echo Yii::t('FinvModule.crud_static','Relations')?>
            </h2>
                                                                            
        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('FinvModule.crud_static','Fields with <span class="required">*</span> are required.');?>
    </p>

    <div class="form-actions">
        
        <?php
            echo CHtml::Button(
            Yii::t('FinvModule.crud_static', 'Cancel'), array(
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('fiitInvoiceItem/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->