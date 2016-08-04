<?php
/**
 * magictoolbox products_new_listing module
 */

$original_template_path = dirname(__FILE__).'/tpl_modules_products_new_listing_original.php';
if(!file_exists($original_template_path)) {
    $original_template_path = DIR_WS_TEMPLATES.'template_default/templates/tpl_modules_products_new_listing.php';
}

if(!defined('ZEN_MAGICZOOM_STATUS') || ZEN_MAGICZOOM_STATUS == 'false') {
    require_once($original_template_path);
    return;
}

/*function parse_content ($content) {
    $content = preg_replace_callback('/(<a[^>]href=\"([^"]*)\"><img[^>]src=\"([^"]*)\".*?title=\"([^"]*)\".*?width=\"([0-9]*)\".*?height=\"([0-9]*)\".*?><\/a[^>]*>)/is','parse_content_callback',$content);
    return $content;
}*/

require_once(DIR_FS_CATALOG.DIR_WS_MODULES.'magiczoom/magiczoom_addons.php');

function parse_content_callback($matches) {

    $mod = magiczoomLoadModule();

    if($mod->type != 'standard') return $matches[0];

    if($mod->params->checkValue('use-effect-on-products-new-page','No')) return $matches[0];


    $mod->params->set('show-message', 'No');

    $id = preg_replace('/^.*?products_id=([0-9]*).*/is','$1', $matches[1]);
    if($id == $matches[1]) $pid = null; else $pid = $id;

    $_img = str_replace('%20', ' ', $matches[2]);
    $_img = magiczoomGetImagePath($_img, $pid);

    $img = DIR_WS_CATALOG.magiczoomGetThumb($_img, 'original', $pid);
    $thumb = DIR_WS_CATALOG.magiczoomGetThumb($_img, 'category-thumb', $pid);

    $title = $description = trim($matches[3]);

    if($mod->params->checkValue('link-to-product-page', 'Yes')) {
        $link = $matches[1];
    } else {
    $link = '';
    }

    $result = $mod->template(compact('img','thumb','id','title','description','link'));


    return $result;
}

//ob_start('parse_content');
//require_once($original_template_path);
//ob_end_flush();

ob_start();
require_once($original_template_path);
$tpl_modules_products_new_listing_contents = ob_get_contents();
ob_end_clean();
echo preg_replace_callback('/<a[^>]*?href="([^"]*)"[^>]*><img[^>]*?src="([^"]*)"[^>]*?title="([^"]*)"[^>]*?width="([0-9]*)"[^>]*?height="([0-9]*)"[^>]*><\/a[^>]*>/is', 'parse_content_callback', $tpl_modules_products_new_listing_contents);

?>
