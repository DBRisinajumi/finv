<h2>
    <?php echo Yii::t('FinvModule.crud_static', 'Relations') ?></h2>


<?php 
        echo '<h3>FiitInvoiceItems ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' =>  array('//finv/fiitInvoiceItem/admin')
                        ),
                        array(
                'icon' => 'icon-plus',
                'url' => array(
                    '//finv/fiitInvoiceItem/create',
                    'FiitInvoiceItem' => array('fiit_fqnt_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),
            
                    )
                )
            );
        echo '</h3>' ?>
<ul>

    <?php
    $records = $model->fiitInvoiceItems(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('/finv/fiitInvoiceItem/view', 'fiit_id' => $relatedModel->fiit_id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('/finv/fiitInvoiceItem/update', 'fiit_id' => $relatedModel->fiit_id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

