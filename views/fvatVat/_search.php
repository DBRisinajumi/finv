<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'fvat_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fvat_rate'); ?>
        <?php echo $form->textField($model, 'fvat_rate'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fvat_label'); ?>
        <?php echo $form->textField($model, 'fvat_label', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fvat_order'); ?>
        <?php echo $form->textField($model, 'fvat_order'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fvat_hide'); ?>
        <?php echo $form->textField($model, 'fvat_hide'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
