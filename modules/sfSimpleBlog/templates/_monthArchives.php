<?php use_helper('Date') ?>
<?php foreach ($monthArchives as $v): ?>
  <li>
    <?php $firstDayOfMonth = mktime(0,0,0,$v->getMonth(),1,$v->getYear()); ?>
    <?php	$link = '@sf_simple_blog_month_archives?year='.$v->getYear().'&month='.$v->getMonth() ?>
    <?php echo link_to(format_date($firstDayOfMonth, 'MMMM').' '.$v->getYear().' ('.$v->getCount().')', $link) ?>
  </li>
<?php endforeach; ?>