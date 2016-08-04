<?php
/**
 * Links Select Sidebox Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_links_submit_default.php 3.5.3 4/16/2010 Clyde Jones $
 */
  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  $content.= zen_draw_form('links_form', zen_href_link(FILENAME_LINKS, '', $request_type, false), 'get');
  $content .= zen_draw_pull_down_menu('lPath', $links_array, (isset($_GET['lPath']) ? $_GET['lPath'] : ''), 'onchange="this.form.submit();" size="' . MAX_LINKS_LIST . '" style="width: 90%; margin: auto;"') . zen_hide_session_id();
  $content .= zen_draw_hidden_field('main_page', FILENAME_LINKS) . '</form>';

  if (BOX_DISPLAY_VIEW_ALL_LINKS == 'true') {
  $content .= '<br /><a href="' . zen_href_link(FILENAME_LINKS, '', 'NONSSL') . '">' . BOX_INFORMATION_VIEW_ALL_LINKS . '</a>';
}

   if (BOX_DISPLAY_SUBMIT_LINK == 'true') {
  $content .= '<br /><a href="' . zen_href_link(FILENAME_LINKS_SUBMIT, '', 'SSL') . '">' . BOX_INFORMATION_LINKS_SUBMIT . '</a>';
}
  $content .= '</div>';
//EOF