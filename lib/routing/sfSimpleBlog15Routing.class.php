<?php
class sfSimpleBlog15Routing
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    // preprend our routes
    $r->prependRoute('sf_simple_blog_search', new sfRoute('/search', array('module' => 'sfSimpleBlog', 'action' => 'search')));
    $r->prependRoute('sf_simple_blog_posts_feed', new sfRoute('/:format/posts', array('module' => 'sfSimpleBlog', 'action' => 'postsFeed', 'format' => 'atom1')));
    $r->prependRoute('sf_simple_blog_comments_feed', new sfRoute('/:format/comments', array('module' => 'sfSimpleBlog', 'action' => 'commentsFeed', 'format' => 'atom1')));
    $r->prependRoute('sf_simple_blog_about', new sfRoute('/about', array('module' => 'sfSimpleBlog', 'action' => 'about')));
    if (sfConfig::get('app_sfSimpleBlog_use_date_in_url', false))
    {
      $r->prependRoute('sf_simple_blog_show', new sfRoute('/:year/:month/:day/:stripped_title', array('module'=>'sfSimpleBlog', 'action'=>'show')));
    }
    else
    {
      $r->prependRoute('sf_simple_blog_show', new sfRoute('/:stripped_title', array('module'=>'sfSimpleBlog', 'action'=>'show')));
    }
    $r->prependRoute('sf_simple_blog_show_by_tag', new sfRoute('/tag/:tag', array('module' => 'sfSimpleBlog', 'action' => 'showByTag')));
    $r->prependRoute('sf_simple_blog_show_by_category', new sfRoute('/category/:category', array('module' => 'sfSimpleBlog', 'action' => 'showByCategory')));
  }
  
  static public function addRouteForPostAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_simple_blog_post', new sfPropel15RouteCollection(array(
      'name'                 => 'sf_simple_blog_post',
      'model'                => 'sfSimpleBlogPost',
      'module'               => 'sfSimpleBlogPostAdmin',
      'prefix_path'          => 'sf_simple_blog_post',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
    $event->getSubject()->prependRoute('sf_simple_blog_post_view_version', new sfRoute('/sf_simple_blog_post/:id/show.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'viewVersion', 'sf_format' => 'html')));
    $event->getSubject()->prependRoute('sf_simple_blog_post_restore_version', new sfRoute('/sf_simple_blog_post/:id/restore.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'restoreVersion', 'sf_format' => 'html')));
    $event->getSubject()->prependRoute('sf_simple_blog_post_delete_version', new sfRoute('/sf_simple_blog_post/:id/delete.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'deleteVersion', 'sf_format' => 'html')));
    $event->getSubject()->prependRoute('sf_simple_blog_post_delete_versions', new sfRoute('/sf_simple_blog_post/deleteVersions.:sf_format', array('module' => 'sfSimpleBlogPostAdmin', 'action' => 'deleteVersions', 'sf_format' => 'html')));
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

  static public function addRouteForAboutAdmin(sfEvent $event)
  {
    $r = $event->getSubject();
    $r->prependRoute('sf_simple_blog_about_index', new sfRoute('sf_simple_blog_about', array('module' => 'sfSimpleBlogAboutAdmin', 'action' => 'index')));
    $r->prependRoute('sf_simple_blog_about_update', new sfRoute('sf_simple_blog_about_update', array('module' => 'sfSimpleBlogAboutAdmin', 'action' => 'update')));
  }
}