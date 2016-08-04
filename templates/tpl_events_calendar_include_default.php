<?php
/**
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: events_calendar_include_default.php 2007-07-10 stav@eweb.gr
*/

?>
<SCRIPT LANGUAGE="JavaScript">
    function jump(view, url)
    {
        if (document.all||document.getElementById)
        {
            month= document.calendar._month.options[document.calendar._month.selectedIndex].value;
            year=  document.calendar._year.options[document.calendar._year.selectedIndex].value;
            return url +'&_month='+ month +'&_year='+ year +'&year_view='+ view;
        }
    }
</SCRIPT>

<!-- events_calendar //-->
  

<?php
// Construct a calendar to show the current month
$cal = new Calendar;

$cal->setStartDay(FIRST_DAY_OF_WEEK);
$this_month = date('m');
$this_year = date('Y');

if ($HTTP_GET_VARS['_month']) 
{
	
    //$month = $_month;
    //$year = $_year;
    $month = $HTTP_GET_VARS['_month'];
    $year = $HTTP_GET_VARS['_year'];
    $a = $cal->adjustDate($month, $year);
    $month_ = $a[0];
    $year_= $a[1];
}
else
{
    $year = date('Y');
    $month = date('m');
    $month_= $month;
    $year_= $year;
}
?>

<table class="calendarBox" cellspacing="1" cellpadding="2">
    <tr>
        <td align="center" valign="top">
            <?php echo $cal->getMonthView($month,$year); ?>
        </td>
    </tr>
    
    <tr>
        <td class="yearHeader" align="center" valign="top">
        <form style="margin:0; padding:0" method="get" name="calendar" action="index.php?main_page=events_calendar">
            <!-- Month List -->
            <select name="_month">
            <?php
                $monthShort = explode(",", MONTHS_SHORT_ARRAY);
                $month = date('m');
                while (list($key, $value) = each($monthShort))
                {
                    if ($HTTP_GET_VARS['_month'])
                    {
                        $selected = '';
                        if($key+1 == $_month)
                        {
                            $selected = 'selected';
                        }
                        $key=$key+1;
            ?>          
                        <option value="<?php echo $key; ?>" <?php echo $selected; ?> >
                            <?php echo $value; ?>
                        </option> 
            <?php
                    }
                    else
                    {
                        $selected = '';
                        if($key+1 == $month)
                        {
                            $selected = 'selected';
                        }
                        $key=$key+1;
            ?>
                        <option value="<?php echo $key; ?>" <?php echo $selected; ?> >
                            <?php echo $value; ?>
                        </option> 
            <?php
                    }
                }
            ?>
            </select><select name="_year">
            <!-- Year List -->
            <?php
                $year = date('Y');
                $years = NUMBER_OF_YEARS;
                for ($y=0; $y < $years; $y++)
                {
                    $_y = $year+$y;
                    if ($HTTP_GET_VARS['_month'])
                    {
                        if($_y == $_year)
                        {
                            echo '<option value="'. $_y .'" selected>'. $_y .'</option>' . "\n";
                        }
                        else
                        {
                            echo '<option value="'. $_y .'">'. $_y .'</option>' . "\n";
                        }
                    }
                    else
                    {
                        if($_y == $year)
                        {
                            echo '<option value="'. $_y .'" selected>'. $_y .'</option>' . "\n";
                        }
                        else
                        {
                            echo '<option value="'. $_y .'">'. $_y .'</option>' . "\n";
                        }
                    }
                }
            ?>
            </select><input type="button" class="yearHeaderButton" title="<?php echo BOX_GO_BUTTON_TITLE; ?>" value="<?php echo BOX_GO_BUTTON; ?>" onclick="top.window.location=jump(0,'<?php echo  'index.php?main_page='.FILENAME_EVENTS_CALENDAR; ?>')"/>
        </form>
</td>
</tr>
    <tr>
      <td class="yearHeader" align="center" valign="top">
        <input type="button" class="yearHeaderButton" title="<?php echo BOX_YEAR_VIEW_BUTTON_TITLE; ?>" value="<?php echo BOX_YEAR_VIEW_BUTTON; ?>" onClick="top.window.location=jump(1,'<?php echo  'index.php?main_page='.FILENAME_EVENTS_CALENDAR ; ?>')"/>
      </td>
    </tr>
</table>
<!-- events_calendar //-->
