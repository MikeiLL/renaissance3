<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_main_product_image.php 3208 2006-03-19 16:48:57Z birdbrain $
 */
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE)); ?> 
<div id="productMainImage" class="centeredContent back">
<?php // bof Zen Magnific 2012-04-30 niestudio ?>
<?php
//$rel = 'magnific';
//if (ZEN_MAGNIFIC_STATUS == 'true') {
//  if (ZEN_MAGNIFIC_GALLERY_MODE == 'true' && ZEN_MAGNIFIC_GALLERY_MAIN_IMAGE == 'true') {
//    $rel = 'magnific';
//  } else {
//    $rel = 'magnific-' . rand(100, 999);
//  }
	
//	BOF (ZCadditions (rbarbour) edits)
	
	if (ZEN_MAGNIFIC_STATUS == 'true') {
  if (ZEN_MAGNIFIC_GALLERY_MODE == 'true' && ZEN_MAGNIFIC_GALLERY_MAIN_IMAGE == 'true') {
    $relBOF = '<div class="html-code grid-of-images popup-gallery">';
    $relEOF = '</div>';
  } else {
    $relBOF = '<div class="html-code grid-of-images popup">';
    $relEOF = '</div>';
  }
		
?>

<script language="javascript" type="text/javascript"><!--
document.write('<?php echo $relBOF . '<a href="' . zen_magnific($products_image_large, addslashes($products_name), LARGE_IMAGE_WIDTH, LARGE_IMAGE_HEIGHT) . '" class="' . "nofollow" . '" title="' . addslashes($products_name) . '">' . zen_image($products_image_medium, addslashes($products_name), MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br /><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>' . $relEOF; ?>');
//--></script>
<?php // EOF (ZCadditions (rbarbour) edits) ?>

<?php } else { ?>
<?php // eof Zen Magnific 2012-04-30 niestudio ?>
<script language="javascript" type="text/javascript"><!--
document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '\\\')">' . zen_image(addslashes($products_image_medium), addslashes($products_name), MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br /><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>'; ?>');
//--></script>
<?php // bof Zen Magnific 2012-04-30 niestudio ?>
<?php } ?>
<?php // eof Zen Magnific 2012-04-30 niestudio ?>
<noscript>
<?php
  echo '<a href="' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '" target="_blank">' . zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br /><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
?>
</noscript>
</div>