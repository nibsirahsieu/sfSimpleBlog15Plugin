<?php
class sfSimpleBlog15Routing
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    // preprend our routes
    $r->prependRoute('sf_simple_blog_show_page', new sfRoute('/:page_title', array('module' => 'sfSimpleBlog', 'action' => 'page')));
    $r->prependRoute('sf_simple_blog_posts_feed', new sfRoute('/posts/:format', array('module' => 'sfSimpleBlogFeed', 'action' => 'postsFeed', 'format' => 'atom1')));
    $r->prependRoute('sf_simple_blog_comments_feed', new sfRoute('/comments/:format', array('module' => 'sfSimpleBlogFeed', 'action' => 'commentsFeed', 'format' => 'atom1')));
    $r->prependRoute('sf_simple_blog_posts_tag_feed', new sfRoute('/tags/:tag/:format', array('module' => 'sfSimpleBlogFeed', 'action' => 'postsForTagFeed', 'format' => 'atom1')));
    if (sfConfig::get('app_sfSimpleBlog_use_date_in_url', false))
    {
      $r->prependRoute('sf_simple_blog_show', new sfRoute('/:year/:month/:day/:stripped_title', array('module'=>'sfSimpleBlog', 'action'=>'show')));
      $r->prependRoute('sf_simple_blog_comments_post_feed', new sfRoute('/:year/:month/:day/:stripped_title/comments/:format', array('module' => 'sfSimpleBlogFeed', 'action' => 'commentsForPostFeed', 'format' => 'atom1')));
    }
    else
    {
      $r->prependRoute('sf_simple_blog_show', new sfRoute('/:stripped_title', array('module'=>'sfSimpleBlog', 'action'=>'show')));
      $r->prependRoute('sf_simple_blog_comments_post_feed', new sfRoute('/:stripped_title/comments/:format', array('module' => 'sfSimpleBlogFeed', 'action' => 'commentsForPostFeed', 'format' => 'atom1')));
    }
    $r->prependRoute('sf_simple_blog_show_by_tag', new sfRoute('/tag/:tag', array('module' => 'sfSimpleBlog', 'action' => 'showByTag')));
    $r->prependRoute('sf_simple_blog_show_by_category', new sfRoute('/category/:category', array('module' => 'sfSimpleBlog', 'action' => 'showByCategory')));
    $r->prependRoute('sf_simple_blog_search', new sfRoute('/search', array('module' => 'sfSimpleBlog', 'action' => 'search')));
  }
  
  static public function addRouteForPostAdmin(sfEvent $event)
  {
    $subject = $event->getSubject();
    $subject->prependRoute('sf_simple_blog_post', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_post',
      'model'                => 'sfSimpleBlogPost',
      'module'               => 'sfSimpleBlogPostAdmin',
      'prefix_path'          => 'sf_simple_blog_post',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
    $subject->prependRoute('sf_simple_blog_post_view_version', new sfRoute('/sf_simple_blog_post/:id/show.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'viewVersion', 'sf_format' => 'html')));
    $subject->prependRoute('sf_simple_blog_post_restore_version', new sfRoute('/sf_simple_blog_post/:id/restore.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'restoreVersion', 'sf_format' => 'html')));
    $subject->prependRoute('sf_simple_blog_post_delete_version', new sfRoute('/sf_simple_blog_post/:id/delete.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'deleteVersion', 'sf_format' => 'html')));
    $subject->prependRoute('sf_simple_blog_post_delete_versions', new sfRoute('/sf_simple_blog_post/deleteVersions.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'deleteVersions', 'sf_format' => 'html')));
  }

  static public function addRouteForCategoryAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_simple_blog_category', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_category',
      'model'                => 'sfSimpleBlogCategory',
      'module'               => 'sfSimpleBlogCategoryAdmin',
      'prefix_path'          => 'sf_simple_blog_category',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForPageAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_simple_blog_page', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_page',
      'model'                => 'sfSimpleBlogPage',
      'module'               => 'sfSimpleBlogPageAdmin',
      'prefix_path'          => 'sf_simple_blog_page',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForTagAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_simple_blog_tag', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_tag',
      'model'                => 'Tag',
      'module'               => 'sfSimpleBlogTagAdmin',
      'prefix_path'          => 'sf_simple_blog_tag',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForLinkAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_simple_blog_link', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_link',
      'model'                => 'sfSimpleBlogLink',
      'module'               => 'sfSimpleBlogLinkAdmin',
      'prefix_path'          => 'sf_simple_blog_link',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForLinkCategoryAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_simple_blog_link_category', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_link_category',
      'model'                => 'sfSimpleBlogLinkCategory',
      'module'               => 'sfSimpleBlogLinkCategoryAdmin',
      'prefix_path'          => 'sf_simple_blog_link_category',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }
}