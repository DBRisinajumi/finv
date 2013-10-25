<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'finv-invoice-form',
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
                            echo $form->error($model,'finv_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_id')) != 'FinvInvoice.finv_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_series_number') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_series_number', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_series_number')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_series_number')) != 'FinvInvoice.finv_series_number')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_number') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_number', array('size' => 20, 'maxlength' => 20));
                            echo $form->error($model,'finv_number')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_number')) != 'FinvInvoice.finv_number')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_issuer_ccmp_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'finvIssuerCcmp',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'finv_issuer_ccmp_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_issuer_ccmp_id')) != 'FinvInvoice.finv_issuer_ccmp_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_payer_ccmp_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'finvPayerCcmp',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'finv_payer_ccmp_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_payer_ccmp_id')) != 'FinvInvoice.finv_payer_ccmp_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_reg_date') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'finv_reg_date',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ;
                            echo $form->error($model,'finv_reg_date')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_reg_date')) != 'FinvInvoice.finv_reg_date')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_date') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'finv_date',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ;
                            echo $form->error($model,'finv_date')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_date')) != 'FinvInvoice.finv_date')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_budget_date') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'finv_budget_date',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ;
                            echo $form->error($model,'finv_budget_date')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_budget_date')) != 'FinvInvoice.finv_budget_date')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_due_date') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'finv_due_date',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ;
                            echo $form->error($model,'finv_due_date')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_due_date')) != 'FinvInvoice.finv_due_date')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_notes') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textArea($model, 'finv_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'finv_notes')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_notes')) != 'FinvInvoice.finv_notes')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_fcrn_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'finvFcrn',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'finv_fcrn_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_fcrn_id')) != 'FinvInvoice.finv_fcrn_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_amt') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_amt', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_amt')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_amt')) != 'FinvInvoice.finv_amt')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_vat') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_vat', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_vat')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_vat')) != 'FinvInvoice.finv_vat')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_total') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_total', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_total')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_total')) != 'FinvInvoice.finv_total')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_basic_fcrn_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'finvBasicFcrn',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'finv_basic_fcrn_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_basic_fcrn_id')) != 'FinvInvoice.finv_basic_fcrn_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_basic_amt') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_basic_amt', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_basic_amt')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_basic_amt')) != 'FinvInvoice.finv_basic_amt')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_basic_vat') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_basic_vat', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_basic_vat')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_basic_vat')) != 'FinvInvoice.finv_basic_vat')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_basic_total') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_basic_total', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_basic_total')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_basic_total')) != 'FinvInvoice.finv_basic_total')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_basic_payment_before') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_basic_payment_before', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'finv_basic_payment_before')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_basic_payment_before')) != 'FinvInvoice.finv_basic_payment_before')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_stst_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'finvStst',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'finv_stst_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_stst_id')) != 'FinvInvoice.finv_stst_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'finv_paid') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'finv_paid');
                            echo $form->error($model,'finv_paid')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FinvInvoice.finv_paid')) != 'FinvInvoice.finv_paid')?$t:'' ?>
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
                                            
                <h3>
                    <?php echo Yii::t('FinvModule.crud', 'FiitInvoiceItems'); ?>
                </h3>
                <?php echo '<i>Switch to view mode to edit related records.</i>' ?>
                                                                                                            
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
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('finvInvoice/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->