<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'fqnt_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fqnt_code'); ?>
        <?php echo $form->textField($model, 'fqnt_code', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fqnt_name'); ?>
        <?php echo $form->textField($model, 'fqnt_name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FinvModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
