<?php

/*
 * This file is part of the sfSimpleBlog package.
 * (c) 2004-2006 Francois Zaninotto <francois.zaninotto@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Blog frontend actions
 *
 * @package    sfSimpleBlog
 * @subpackage plugin
 * @author     Francois Zaninotto <francois.zaninotto@symfony-project.com>
 * @version    SVN: $Id$
 */
class BasesfSimpleBlogComponents extends sfComponents
{
  public function executeRecentPosts()
  {
    $this->posts = sfSimpleBlogPostViewQuery::create()
      ->recent()
      ->published()
      ->limit(sfConfig::get('app_sfSimpleBlog_post_recent', 5))
      ->find();
  }

  public function executeTagList()
  {
    $c = new Criteria();
    $c->add(sfSimpleBlogPostPeer::IS_PUBLISHED, true);
    $c->add(TaggingPeer::TAGGABLE_ID, TaggingPeer::TAGGABLE_ID.' = '. sfSimpleBlogPostPeer::ID, Criteria::CUSTOM);
    $this->tags = TagPeer::getPopulars($c);
  }
}