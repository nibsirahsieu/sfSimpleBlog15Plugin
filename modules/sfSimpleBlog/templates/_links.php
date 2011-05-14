<?php $linkCategories = sfSimpleBlogLinkCategoryQuery::create()->find() ?>
<?php foreach ($linkCategories as $linkCategory): ?>
  <li class="widget-container links">
    <h3 class="widget-title"><?php echo $linkCategory->getName() ?></h3>
    <ul>
      <?php foreach ($linkCategory->getsfSimpleBlogLinks() as $link): ?>
        <li>
          <a href="<?php echo $link->getUri() ?>" title="<?php echo $link->getDescription() ?>"><?php echo $link->getName() ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </li>
<?php endforeach; ?>
