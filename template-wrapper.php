<?php
global $theme_developer_template_name;
$cur_file = $theme_developer_template_name;
ob_start();
include $theme_developer_template_name;
$html = ob_get_clean();
print preg_replace( '/(<[a-z]*\b([^><](?!data-template))*)>/i', '$1 data-template="' . $cur_file . '">', $html );
