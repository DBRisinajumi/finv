<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'finv_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_series_number'); ?>
        <?php echo $form->textField($model, 'finv_series_number', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_number'); ?>
        <?php echo $form->textField($model, 'finv_number', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_issuer_ccmp_id'); ?>
        <?php echo $form->textField($model, 'finv_issuer_ccmp_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_payer_ccmp_id'); ?>
        <?php echo $form->textField($model, 'finv_payer_ccmp_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_reg_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
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
                    ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
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
                    ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_budget_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
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
                    ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_due_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
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
                    ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_notes'); ?>
        <?php echo $form->textArea($model, 'finv_notes', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_fcrn_id'); ?>
        <?php echo $form->textField($model, 'finv_fcrn_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_amt'); ?>
        <?php echo $form->textField($model, 'finv_amt', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_vat'); ?>
        <?php echo $form->textField($model, 'finv_vat', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_total'); ?>
        <?php echo $form->textField($model, 'finv_total', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_basic_fcrn_id'); ?>
        <?php echo $form->textField($model, 'finv_basic_fcrn_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_basic_amt'); ?>
        <?php echo $form->textField($model, 'finv_basic_amt', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_basic_vat'); ?>
        <?php echo $form->textField($model, 'finv_basic_vat', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_basic_total'); ?>
        <?php echo $form->textField($model, 'finv_basic_total', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_basic_payment_before'); ?>
        <?php echo $form->textField($model, 'finv_basic_payment_before', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_stst_id'); ?>
        <?php echo $form->textField($model, 'finv_stst_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'finv_paid'); ?>
        <?php echo $form->textField($model, 'finv_paid'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
