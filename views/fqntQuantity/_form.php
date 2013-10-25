<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fqnt-quantity-form',
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
                            echo $form->error($model,'fqnt_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FqntQuantity.fqnt_id')) != 'FqntQuantity.fqnt_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fqnt_code') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fqnt_code', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fqnt_code')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FqntQuantity.fqnt_code')) != 'FqntQuantity.fqnt_code')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fqnt_name') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fqnt_name', array('size' => 50, 'maxlength' => 50));
                            echo $form->error($model,'fqnt_name')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FqntQuantity.fqnt_name')) != 'FqntQuantity.fqnt_name')?$t:'' ?>
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
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('fqntQuantity/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->