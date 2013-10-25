<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fprc-product-category-form',
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
                            echo $form->error($model,'fprc_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FprcProductCategory.fprc_id')) != 'FprcProductCategory.fprc_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fprc_code') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fprc_code', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'fprc_code')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FprcProductCategory.fprc_code')) != 'FprcProductCategory.fprc_code')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fprc_name') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fprc_name', array('size' => 60, 'maxlength' => 100));
                            echo $form->error($model,'fprc_name')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('FinvModule.crud', 'FprcProductCategory.fprc_name')) != 'FprcProductCategory.fprc_name')?$t:'' ?>
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
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('fprcProductCategory/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->