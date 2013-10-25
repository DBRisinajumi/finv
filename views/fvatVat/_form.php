<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fvat-vat-form',
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
                            echo $form->error($model,'fvat_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FvatVat.fvat_id')) != 'FvatVat.fvat_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fvat_rate') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fvat_rate');
                            echo $form->error($model,'fvat_rate')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FvatVat.fvat_rate')) != 'FvatVat.fvat_rate')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fvat_label') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fvat_label', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fvat_label')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FvatVat.fvat_label')) != 'FvatVat.fvat_label')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fvat_order') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fvat_order');
                            echo $form->error($model,'fvat_order')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FvatVat.fvat_order')) != 'FvatVat.fvat_order')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fvat_hide') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fvat_hide');
                            echo $form->error($model,'fvat_hide')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FvatVat.fvat_hide')) != 'FvatVat.fvat_hide')?$t:'' ?>
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
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('fvatVat/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->