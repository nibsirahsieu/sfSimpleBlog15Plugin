<?php

/**
 * Helper functions for generating links (linked icons) to easily add a url 
 * to a social bookmarking application. 
 *
 * <strong>Example:</strong>
 * <code>
 *  <?php use_helper('SocialBookmarking') ?>
 *
 *  <?php echo link_to_delicious('http://www.foobar.com?foo=bar&bar=123', 'How to do a FooBar'); ?> 
 * </code>
 *
 * With this code, a del.icio.us icon would be returned which links to a 
 * page that lets you bookmark the site in del.icio.us.
 *
 * You can also link to all available social bookmarking sites:
 *
 * <strong>Example:</strong>
 * <code>
 *   <?php use_helper('SocialBookmarking') ?>
 *
 *   <?php echo link_to_social_bookmarking('http://www.foobar.com?foo=bar&bar=123', 'How to do a FooBar'); ?>
 * </code>
 *
 * @package     symfony
 * @subpackage  helper
 * @author      Arthur Koziel <arthur@arthurkoziel.de>
 * @version     SVN: $Id$
 */

use_helper('Url');

/**
 * Builds a link to add url to del.icio.us.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_delicious($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://del.icio.us/post?url='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on delicious'));
}

/**
 * Builds a link to add url to Technorati.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_technorati($url, $name)
{
  $url = urlencode($url);

  return link_to($name, 'http://technorati.com/faves/?add='.$url, array('class' => $name, 'title' => 'Share on technorati'));
}

/**
 * Builds a link to add url to Furl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_furl($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.furl.net/storeIt.jsp?t='.$title.'&u='.$url, array('class' => $name, 'title' => 'Share on furl'));
}

/**
 * Builds a link to add url to Yahoo! My Web.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_yahoo_myweb($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$url.'&t='.$title, array('class' => $name, 'title' => 'Share on yahoo myweb'));
}

/**
 * Builds a link to add url Google Bookmarks.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_google_bookmarks($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.google.com/bookmarks/mark?op=edit&bkmk='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on google bookmark'));
}

/**
 * Builds a link to add url to Blinklist.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_blinklist($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$url.'&Title='.$title, array('class' => $name, 'title' => 'Share on blinklist'));
}

/**
 * Builds a link to add url to ma.gnolia.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_magnolia($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://ma.gnolia.com/bookmarklet/add?url='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on magnolia'));
}

/**
 * Builds a link to add url to Windows Live.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_windows_live($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$url.'&title='.$title.'&top=1', array('class' => $name, 'title' => 'Share on window live'));
}

/**
 * Builds a link to add url to Digg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_digg($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://digg.com/submit?phase=2&url='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on digg'));
}

/**
 * Builds a link to add url to Netscape.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_netscape($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.netscape.com/submit/?U='.$url.'&T='.$title, array('class' => $name, 'title' => 'Share on netscape'));
}

/**
 * Builds a link to add url to StumbleUpon.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_stumbleupon($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.stumbleupon.com/submit?url='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on stumbleupon'));
}

/**
 * Builds a link to add url to Newsvine.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_newsvine($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.newsvine.com/_wine/save?u='.$url.'&h='.$title, array('class' => $name, 'title' => 'Share on newsvine'));
}

/**
 * Builds a link to add url to Reddit.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_reddit($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://reddit.com/submit?url='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on reddit'));
}

/**
 * Builds a link to add url to Tailrank.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_tailrank($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://tailrank.com/share/?link_href='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on Tailrank'));
}

/**
 * Builds a link to add url to Spurl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_spurl($url, $title, $name)
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.spurl.net/spurl.php?title='.$title.'&url='.$url, array('class' => $name, 'title' => 'Share on spurl'));
}

/**
 * Builds a link to add url to Yigg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $name - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_yigg($url, $name)
{
  $url = urlencode($url);

  return link_to($name, 'http://yigg.de/neu?exturl='.$url, array('class' => $name, 'title' => "Share on yigg"));
}

function link_to_twitter($url, $title, $name)
{
  $url = urlencode($url);
  $title = urlencode($title);
  
  return link_to($name, 'http://twitter.com/home?status='.$url.'+'.$title, array('class' => $name, 'title' => 'Share on twitter'));
}

function link_to_facebook($url, $title, $name)
{
  $url = urlencode($url);
  $title = urlencode($title);

  return link_to($name, 'http://www.facebook.com/share.php?u='.$url.'&title='.$title, array('class' => $name, 'title' => 'Share on facebook'));
}

/**
 * Builds links to all available social bookmarking services.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   Linked icons
 * @see     link_to_delicious, link_to_technorati, link_to_furl, link_to_yahoo_myweb, link_to_google_bookmarks, link_to_blinklist, link_to_magnolia, link_to_windows_live, link_to_digg, link_to_netscape, link_to_stumbleupon, link_to_newsvine, link_to_reddit, link_to_tailrank, link_to_spurl, link_to_yigg
 */
function link_to_all_social_bookmarking($url, $title)
{
  $links = link_to_twitter($url, $title);
  $links .= ' '.link_to_facebook($url, $title);
  $links .= ' '.link_to_delicious($url, $title);
  $links .= ' '.link_to_technorati($url);
  $links .= ' '.link_to_furl($url, $title);
  $links .= ' '.link_to_yahoo_myweb($url, $title);
  $links .= ' '.link_to_google_bookmarks($url, $title);
  $links .= ' '.link_to_blinklist($url, $title);
  $links .= ' '.link_to_magnolia($url, $title);
  $links .= ' '.link_to_windows_live($url, $title);
  $links .= ' '.link_to_digg($url, $title);
  $links .= ' '.link_to_netscape($url, $title);
  $links .= ' '.link_to_stumbleupon($url, $title);
  $links .= ' '.link_to_newsvine($url, $title);
  $links .= ' '.link_to_reddit($url, $title);
  $links .= ' '.link_to_tailrank($url, $title);
  $links .= ' '.link_to_spurl($url, $title);
  $links .= ' '.link_to_yigg($url);

  return $links;
}

function link_to_social_bookmarking($social_bookmarking, $url, $title = null)
{
  $links = '';
  if (!is_array($social_bookmarking))
  {
    $social_bookmarking = explode(',', $social_bookmarking);
  }
  foreach ($social_bookmarking as $key => $v)
  {
    $func = 'link_to_'.$v;
    $links .= '<li>'.call_user_func($func, $url, $title, $v).'</li>';
  }
  return $links;
}
