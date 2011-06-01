<?php
class BasesfSimpleBlogFeedActions extends sfActions
{
  protected function getDateFromRequest(sfWebRequest $request)
  {
    return $request->getParameter('date') != null ? $request->getParameter('date') : $request->getParameter('year').'-'.$request->getParameter('month').'-'.$request->getParameter('day');
  }
  
  public function executePostsFeed(sfWebRequest $request)
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('I18N'));
    $posts = sfSimpleBlogPostQuery::create()
      ->recent()
      ->published()
      ->limit($request->getParameter('nb', sfConfig::get('app_sfSimpleBlog_feed_count', 5)))
      ->find();

    $this->feed = sfFeedPeer::createFromObjects(
      $posts,
      array(
        'format'      => $request->getParameter('format', 'atom1'),
        'title'       => __('Posts from %1%', array('%1%' => sfConfig::get('app_sfSimpleBlog_title', ''))),
        'link'        => $this->getController()->genUrl('sfSimpleBlog/index', true),
        'methods'     => array(
                          'authorEmail' => 'getAuthorEmail',
                          'authorName'  => 'getAuthorName',
                          'description' => 'getExtract',
                         )
      )
    );
    $this->setTemplate('feed');
  }

  public function executeCommentsForPostFeed(sfWebRequest $request)
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('I18N'));
    $post = sfSimpleBlogPostQuery::create()->findByStrippedTitleAndDate(
      $request->getParameter('stripped_title'),
      $this->getDateFromRequest($request)
    );
    $this->forward404Unless($post);
    $comments = $post->getApprovedComments($request->getParameter('nb', sfConfig::get('app_sfSimpleBlog_feed_count', 5)));

    $this->feed = sfFeedPeer::createFromObjects(
      $comments,
      array(
        'format'      => $request->getParameter('format', 'rss'),
        'title'       => __('Comments on post "%1%" from %2%', array('%1%' => $post->getTitle(), '%2%' => sfConfig::get('app_sfSimpleBlog_title', ''))),
        'authorName'  => $post->getAuthorName(),
        'methods'     => array(
                          'title' => 'getAuthorName',
                          'authorEmail' => 'getAuthorEmail',
                          'authorLink'  => 'getAuthorUrl',
                          'link'        => 'getLink',
                          'description' => 'getContent'
                        )
      )
    );
    $this->setTemplate('feed');
  }

  public function executePostsForTagFeed(sfWebRequest $request)
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('I18N'));
    $this->forward404Unless($tag = $request->getParameter('tag'));
    $posts = sfSimpleBlogPostQuery::create()
      ->recent()
      ->tagged($tag)
      ->limit($request->getParameter('nb', sfConfig::get('app_sfSimpleBlog_feed_count', 5)))
      ->find();

      $this->feed = sfFeedPeer::createFromObjects(
      $posts,
      array(
        'format'      => $request->getParameter('format', 'atom1'),
        'title'       => __('Posts tagged "%1%" from %2%', array('%1%' => $tag, '%2%' => sfConfig::get('app_sfSimpleBlog_title', ''))),
        'link'        => $this->getController()->genUrl('sfSimpleBlog/showByTag?tag='.$tag),
        'authorName'  => sfConfig::get('app_sfSimpleBlog_author', ''),
        'methods'     => array('authorEmail' => '')
      )
    );
    $this->setTemplate('feed');
  }
}