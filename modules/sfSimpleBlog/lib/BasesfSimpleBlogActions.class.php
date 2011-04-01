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
    $this->postCategories = array();
    $this->post_pager = sfSimpleBlogPostQuery::create()
      ->recent()
      ->published()
      ->paginate($request->getParameter('page', 1), sfConfig::get('app_sfSimpleBlog_post_max_per_page', 5));

    $results = $this->post_pager->getResults();
    if (!$results->isEmpty())
    {
      $postCategories = sfSimpleBlogPostCategoryQuery::create()
        ->join('sfSimpleBlogCategory')
        ->select(array('SfBlogPostId', 'sfSimpleBlogCategory.Name'))
        ->filterBySfBlogPostId(array_keys($results->toKeyValue()))
        ->find();
      foreach ($postCategories as $postCategory)
      {
        $this->postCategories[$postCategory['SfBlogPostId']][] = $postCategory['sfSimpleBlogCategory.Name'];
      }
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->post = sfSimpleBlogPostQuery::create()->findByStrippedTitleAndDate(
      $request->getParameter('stripped_title'),
      $this->getDateFromRequest($request)
    );
    $this->forward404Unless($this->post);
    $this->prevPost = sfSimpleBlogPostViewQuery::create()
        ->previousPublished($this->post->getInternalPublishedAt())
        ->findOne();
    $this->nextPost = sfSimpleBlogPostViewQuery::create()
        ->nextPublished($this->post->getInternalPublishedAt())
        ->findOne();
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
        'link'        => $this->getController()->genUrl('sfSimpleBlog/index'),
        'authorName'  => sfConfig::get('app_sfSimpleBlog_author', ''),
        'methods'     => array('authorEmail' => '', 'authorName'  => 'getAuthor')
      )
    );
    $this->setTemplate('feed');
  }

  public function executeShowByTag(sfWebRequest $request)
  {
    $tag = $request->getParameter('tag');
    $this->forward404Unless($tag);
    $criteria = TagPeer::getTaggedWithCriteria('sfSimpleBlogPost', array($tag));
    $this->post_pager = sfSimpleBlogPostQuery::create(null, $criteria)
      ->recent()
      ->published()
      ->paginate($request->getParameter('page', 1), sfConfig::get('app_sfSimpleBlog_post_max_per_page', 5));
  }

  public function executeShowByCategory(sfWebRequest $request)
  {
    $this->post_pager = sfSimpleBlogPostQuery::create()
      ->recent()
      ->published()
      ->join('sfSimpleBlogPost.sfSimpleBlogPostCategory')
      ->join('sfSimpleBlogPostCategory.sfSimpleBlogCategory')
      ->where('sfSimpleBlogCategory.Name = ?', $request->getParameter('category'))
      ->paginate($request->getParameter('page', 1), sfConfig::get('app_sfSimpleBlog_post_max_per_page', 5));
  }

  public function executeSearch(sfWebRequest $request)
  {
    sfConfig::set('sf_escaping_strategy', false);
    $search = $request->getParameter('s');
    $this->post_pager = sfLuceneModelSearch::create('sfSimpleBlogPost', $search)->paginate($request->getParameter('page', 1));
  }
  
  public function executeAbout(sfWebRequest $request)
  {
    $this->about = sfSimpleBlogAboutQuery::create()->findOneOrCreate();
  }
}