<?php
/*
 * Plugin Name: Patrocinadores
 * Description: Selecionar patrocinadores
 *  Version: 1.0.0
 * Author: Lucas B. M.
*/

//error_log("Estou dentro do plugin Patrocinadores!");


// Essa variável só é definida quando o WP inicializa, portanto caso ela esteja vazia é acesso externo.
if (!defined('ABSPATH')) {
    die;
}

require_once plugin_dir_path(__FILE__) . '/includes/al_patrocinadores_palestras_widget.php';