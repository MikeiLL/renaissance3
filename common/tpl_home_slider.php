


 <div class="container">
    <div id="slides">
    <?php
    if (SHOW_BANNERS_GROUP_SETRSB1 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETRSB1)) {
      if ($banner->RecordCount() > 0) {
        echo zen_display_banner('static', $banner);
      }
    }
?>
<?php
if (SHOW_BANNERS_GROUP_SETRSB2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETRSB2)) {
  if ($banner->RecordCount() > 0) {
    echo zen_display_banner('static', $banner);
  }
}
?>
<?php
if (SHOW_BANNERS_GROUP_SETRSB3 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETRSB3)) {
  if ($banner->RecordCount() > 0) {
    echo zen_display_banner('static', $banner);
  }
}
?>
<?php
if (SHOW_BANNERS_GROUP_SETRSB4 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETRSB4)) {
  if ($banner->RecordCount() > 0) {
    echo zen_display_banner('static', $banner);
  }
}
?>
<?php
if (SHOW_BANNERS_GROUP_SETRSB5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETRSB5)) {
  if ($banner->RecordCount() > 0) {
    echo zen_display_banner('static', $banner);
  }
}
?>

    </div>
  </div>

 <script type="text/javascript">
    $(function() {
	$('#slides').slidesjs({
	  width: 980,
	      height: 250,
	      play: {
	    active: true,
		auto: true,
		interval: '<?php echo REN_SLIDES_PLAY ?>',
		pauseOnHover: true,
		restartDelay: 2500
		}
	  });
      });
  </script>


