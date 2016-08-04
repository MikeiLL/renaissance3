<?php

$original_template_path = dirname(__FILE__).'/tpl_whats_new_original.php';
if(!file_exists($original_template_path)) {
    $original_template_path = DIR_WS_TEMPLATES.'template_default/sideboxes/tpl_whats_new.php';
}

if(!defined('ZEN_MAGICZOOM_STATUS') || ZEN_MAGICZOOM_STATUS == 'false') {
    require_once($original_template_path);
    return;
}

require_once(DIR_FS_CATALOG.DIR_WS_MODULES.'magiczoom/magiczoom_addons.php');
/* load module */
$mod = magiczoomLoadModule();

if($mod->params->checkValue('use-effect-on-whats-new-block', 'No')) {
    require_once($original_template_path);
    return;
}

if(!$GLOBALS['MAGICZOOM_HEADERS_LOADED']) {
    echo $mod->headers(DIR_WS_CATALOG.DIR_WS_TEMPLATE.'jscript', DIR_WS_CATALOG.DIR_WS_TEMPLATE.'css/magiczoom');
    $GLOBALS['MAGICZOOM_HEADERS_LOADED'] = true;
}


$showMessage = $mod->params->getValue('show-message');
$mod->params->set('show-message', 'No');

$content = '';
$whats_new_box_counter = 0;
unset($items);
$items = array();

while(!$random_whats_new_sidebox_product->EOF) {

    $whats_new_box_counter++;

    /* $query = "select p.* from (".TABLE_PRODUCTS." p
                       left join ".TABLE_PRODUCTS_DESCRIPTION." pd on p.products_id = pd.products_id )
                       where p.products_id = pd.products_id
                       and p.products_status = 1 and p.products_id = ".intval($random_whats_new_sidebox_product->fields['products_id']);
    // $random_whats_new_sidebox_product = zen_random_select($random_whats_new_sidebox_product_query);
    // $product = $db->Execute($query);
    // print_r($product); die();
    */

    $products_image = $random_whats_new_sidebox_product->fields['products_image'];

    $whats_new_price = zen_get_products_display_price($random_whats_new_sidebox_product->fields['products_id']);

    $pid = $random_whats_new_sidebox_product->fields['products_id'];
    if(empty($pid)) $pid = null;

    $image = magiczoomGetImagePath(str_replace('%20', ' ', $products_image), $pid);

    if(!empty($products_image) && file_exists(DIR_FS_CATALOG.$image)) {

        $img = DIR_WS_CATALOG.magiczoomGetThumb($image, 'original', $pid);
        $thumb = DIR_WS_CATALOG.magiczoomGetThumb($image, 'whats-new-block-thumb', $pid);

        $id = 'whatsNew'.$random_whats_new_sidebox_product->fields['products_id'];
        $title = $random_whats_new_sidebox_product->fields['products_name'];

        if($mod->params->checkValue('link-to-product-page', 'Yes')) {
            $link = zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath='.zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']).'&products_id='.$random_whats_new_sidebox_product->fields['products_id']);
        } else {
        $link = '';
        }

        $content .= '<div class="sideBoxContent centeredContent">';
        $content .= $mod->template(compact('img', 'thumb', 'id', 'title', 'link'));
        $content .= '<br />'.$random_whats_new_sidebox_product->fields['products_name'].'</a>';
        $content .= '<div>'.$whats_new_price.'</div>';
        $content .= '</div>';

    }
    else { // default
        $content .= '<div class="sideBoxContent centeredContent">';
        $content .= '<a href="'.zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath='.zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']).'&products_id='.$random_whats_new_sidebox_product->fields['products_id']).'">'.zen_image(DIR_WS_IMAGES.$random_whats_new_sidebox_product->fields['products_image'], $random_whats_new_sidebox_product->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
        $content .= '<br />'.$random_whats_new_sidebox_product->fields['products_name'].'</a>';
        $content .= '<div>'.$whats_new_price.'</div>';
        $content .= '</div>';
    }

    $random_whats_new_sidebox_product->MoveNextRandom();

}


$mod->params->set('show-message', $showMessage);


?>
