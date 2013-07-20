<?php

/**
 * @file
 * Rate widget theme
 */
?>
<ul>
  <li class="thumb-up">
    <?php print $up_button; ?>
    <div class="percent"><?php print $results['up_percent'] . '%'; ?></div>
  </li>
  <li class="thumb-down">
    <?php print $down_button; ?>
    <div class="percent"><?php print $results['down_percent'] . '%'; ?></div>
  </li>
</ul>
<?php
if ($info) {
  print '<div class="rate-info">' . $info . '</div>';
}

?>

