<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'fiit_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_finv_id'); ?>
        <?php echo $form->textField($model, 'fiit_finv_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_desc'); ?>
        <?php echo $form->textArea($model, 'fiit_desc', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_debet_facn_code'); ?>
        <?php echo $form->textField($model, 'fiit_debet_facn_code', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_credit_facn_code'); ?>
        <?php echo $form->textField($model, 'fiit_credit_facn_code', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_fprc_id'); ?>
        <?php echo $form->textField($model, 'fiit_fprc_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_quantity'); ?>
        <?php echo $form->textField($model, 'fiit_quantity'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_fqnt_id'); ?>
        <?php echo $form->textField($model, 'fiit_fqnt_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_price'); ?>
        <?php echo $form->textField($model, 'fiit_price', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_amt'); ?>
        <?php echo $form->textField($model, 'fiit_amt', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_vat'); ?>
        <?php echo $form->textField($model, 'fiit_vat', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_total'); ?>
        <?php echo $form->textField($model, 'fiit_total', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fiit_fvat_id'); ?>
        <?php echo $form->textField($model, 'fiit_fvat_id'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
