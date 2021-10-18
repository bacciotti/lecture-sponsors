<?php

add_action('widgets_init', 'al_pat_pal_registra_widget');

function al_pat_pal_registra_widget()
{
    register_widget('PatrocinadoresAlura');
}

class PatrocinadoresAlura extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'al_patrocinadores_palestras_widget',
            'Patrocinadores',
            array('description' => 'Selecione os patrocinadores!')
        );
    }

    public function form($instance)
    {
        ?>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('caelum') ?>"
                   name="<?= $this->get_field_name('caelum') ?>"
                   value="1" <?php checked('1', $instance['caelum']) ?>>
            <label for="<?= $this->get_field_id('caelum') ?>">Caelum</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('casa_codigo') ?>"
                   name="<?= $this->get_field_name('casa_codigo') ?>"
                   value="1" <?php checked('1', $instance['casa_codigo']) ?>>
            <label for="<?= $this->get_field_id('Casa do Código') ?>">Casa do Código</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('Hipsters') ?>"
                   name="<?= $this->get_field_name('Hipsters') ?>"
                   value="1" <?php checked('1', $instance['Hipsters']) ?>>
            <label for="<?= $this->get_field_id('Hipsters') ?>">Hipsters</label>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['caelum'] = !empty($new_instance['caelum']) ? strip_tags($new_instance['caelum']) : '';
        $instance['casa_codigo'] = !empty($new_instance['casa_codigo']) ? strip_tags($new_instance['casa_codigo']) : '';
        $instance['Hipsters'] = !empty($new_instance['Hipsters']) ? strip_tags($new_instance['Hipsters']) : '';
        return $instance;
    }

    public function widget($args, $instance)
    {
        ?>
        <section class="patrocinadores-principais">
            <h3 class="titulo-patrocinadores">Patrocinadores</h3>
            <ul class="lista-patrocinadores">
                <?php if (!empty($instance['caelum'])) : ?>
                    <li><img src="<?= plugin_dir_url(__FILE__) . '../img/caelium.svg' ?>"></li>
                <?php endif; ?>
                <?php if (!empty($instance['casa_codigo'])) : ?>
                    <li><img src="<?= plugin_dir_url(__FILE__) . '../img/cdc.svg' ?>"></li>
                <?php endif; ?>
                <?php if (!empty($instance['hipsters'])) : ?>
                    <li><img src="<?= plugin_dir_url(__FILE__) . '../img/hipsters.svg' ?>"></li>
                <?php endif; ?>
            </ul>
        </section>
        <?php
    }
}