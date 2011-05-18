<?php

/*
 * This file is part of the sfSimpleBlog package.
 * (c) Nibsirahsieu NT <nibsirahsieu@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Blog frontend actions
 *
 * @package    sfSimpleBlog
 * @subpackage plugin
 * @author     Nibsirahsieu NT <nibsirahsieu@gmail.com>
 * @version    SVN: $Id$
 */
class BasesfSimpleBlogActions extends sfActions
{
  public function  preExecute()
  {
    $this->loadTheme(sfConfig::get('app_sfSimpleBlog_default_theme', 'veryplaintxt'));
  }

  protected function getDateFromRequest(sfWebRequest $request)
  {
    return $request->getParameter('date') != null ? $request->getParameter('date') : $request->getParameter('year').'-'.$request->getParameter('month').'-'.$request->getParameter('day');
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->post_pager = sfSimpleBlogPostQuery::create()
      ->recent()
      ->published()
      ->paginate($request->getParameter('page', 1), sfConfig::get('app_sfSimpleBlog_post_max_per_page', 5));
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->post = sfSimpleBlogPostQuery::create()->findByStrippedTitleAndDate(
      $request->getParameter('stripped_title'),
      $this->getDateFromRequest($request)
    );
    $this->forward404Unless($this->post);
  }

  public function executeShowByTag(sfWebRequest $request)
  {
    $this->forward404Unless($tag = $request->getParameter('tag'));
    $this->post_pager = sfSimpleBlogPostQuery::create()
      ->recent()
      ->published()
      ->tagged($tag)
      ->paginate($request->getParameter('page', 1), sfConfig::get('app_sfSimpleBlog_post_max_per_page', 5));
  }

  public function executeShowByCategory(sfWebRequest $request)
  {
    $this->forward404Unless($category = $request->getParameter('category'));
    $this->post_pager = sfSimpleBlogPostQuery::create()
      ->recent()
      ->published()
      ->categorized($category)
      ->paginate($request->getParameter('page', 1), sfConfig::get('app_sfSimpleBlog_post_max_per_page', 5));
  }

  public function executeSearch(sfWebRequest $request)
  {
    sfConfig::set('sf_escaping_strategy', false);
    $search = $request->getParameter('s');
    $this->post_pager = sfLuceneModelSearch::create('sfSimpleBlogPost', $search)->paginate($request->getParameter('page', 1));
  }
  
  public function executePage(sfWebRequest $request)
  {
    $this->forward404Unless($this->page = sfSimpleBlogPageQuery::create()->filterByStrippedTitle($request->getParameter('page_title'))->findOne());
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
