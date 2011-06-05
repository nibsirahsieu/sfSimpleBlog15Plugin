<?php

/**
 * Helper functions for generating links (string XHTML compliant <a href> tags) to easily add a url
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
 * @ignore
 */
function social_bookmarking_options($share_on, $options = array())
{
  if (isset($options['class']))
  {
    $options['class'] = $options['class'].' '.$share_on;
  }
  else
  {
    $options['class'] = $share_on;
  }
  if (!isset($options['title']))
  {
    $options['title'] = 'Share on '.$share_on;
  }
  return $options;
}

/**
 * Builds a link to add url to del.icio.us.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_delicious($url, $title, $name = 'delicious', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);
  return link_to($name, 'http://del.icio.us/post?url='.$url.'&title='.$title, social_bookmarking_options('delicious', $options));
}

/**
 * Builds a link to add url to Technorati.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_technorati($url, $name = 'technorati', $options = array())
{
  $url = urlencode($url);

  return link_to($name, 'http://technorati.com/faves/?add='.$url, social_bookmarking_options('technorati', $options));
}

/**
 * Builds a link to add url to Furl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_furl($url, $title, $name = 'furl', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.furl.net/storeIt.jsp?t='.$title.'&u='.$url, social_bookmarking_options('furl', $options));
}

/**
 * Builds a link to add url to Yahoo! My Web.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_yahoo_myweb($url, $title, $name = 'yahoo myweb', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$url.'&t='.$title, social_bookmarking_options('yahoo myweb', $options));
}

/**
 * Builds a link to add url Google Bookmarks.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_google_bookmarks($url, $title, $name = 'google bookmark', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.google.com/bookmarks/mark?op=edit&bkmk='.$url.'&title='.$title, social_bookmarking_options('google bookmark', $options));
}

/**
 * Builds a link to add url to Blinklist.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_blinklist($url, $title, $name = 'blinklist', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$url.'&Title='.$title, social_bookmarking_options('blinklist', $options));
}

/**
 * Builds a link to add url to ma.gnolia.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_magnolia($url, $title, $name = 'magnolia', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://ma.gnolia.com/bookmarklet/add?url='.$url.'&title='.$title, social_bookmarking_options('magnolia', $options));
}

/**
 * Builds a link to add url to Windows Live.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_windows_live($url, $title, $name = 'window live', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$url.'&title='.$title.'&top=1', social_bookmarking_options('window live', $options));
}

/**
 * Builds a link to add url to Digg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_digg($url, $title, $name = 'digg', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://digg.com/submit?phase=2&url='.$url.'&title='.$title, social_bookmarking_options('digg', $options));
}

/**
 * Builds a link to add url to Netscape.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_netscape($url, $title, $name = 'netscape', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.netscape.com/submit/?U='.$url.'&T='.$title, social_bookmarking_options('netscape', $options));
}

/**
 * Builds a link to add url to StumbleUpon.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_stumbleupon($url, $title, $name = 'stumbleupon', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.stumbleupon.com/submit?url='.$url.'&title='.$title, social_bookmarking_options('stumbleupon', $options));
}

/**
 * Builds a link to add url to Newsvine.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_newsvine($url, $title, $name = 'newsvine', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.newsvine.com/_wine/save?u='.$url.'&h='.$title, social_bookmarking_options('newsvine', $options));
}

/**
 * Builds a link to add url to Reddit.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_reddit($url, $title, $name = 'reddit', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://reddit.com/submit?url='.$url.'&title='.$title, social_bookmarking_options('reddit', $options));
}

/**
 * Builds a link to add url to Tailrank.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_tailrank($url, $title, $name = 'tailrank', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://tailrank.com/share/?link_href='.$url.'&title='.$title, social_bookmarking_options('tailrank', $options));
}

/**
 * Builds a link to add url to Spurl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_spurl($url, $title, $name = 'spurl', $options = array())
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to($name, 'http://www.spurl.net/spurl.php?title='.$title.'&url='.$url, social_bookmarking_options('spurl', $options));
}

/**
 * Builds a link to add url to Yigg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_yigg($url, $name = 'yigg', $options = array())
{
  $url = urlencode($url);

  return link_to($name, 'http://yigg.de/neu?exturl='.$url, social_bookmarking_options('yigg', $options));
}

/**
 * Builds a link to add url to twitter.
 *
 * @param   string   $url - Url which should be added
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_twitter($url, $title, $name = 'twitter', $options = array())
{
  $url = urlencode($url);
  $title = urlencode($title);
  
  return link_to($name, 'http://twitter.com/home?status='.$url.'+'.$title, social_bookmarking_options('twitter', $options));
}

/**
 * Builds a link to add url to facebook.
 *
 * @param   string   $url - Url which should be added
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $name - name of the link
 * @param   array    $options additional HTML compliant <a> tag parameters
 * @return  string   string XHTML compliant <a href> tag
 * @see     link_to
 */
function link_to_facebook($url, $title, $name = 'facebook', $options = array())
{
  $url = urlencode($url);
  $title = urlencode($title);

  return link_to($name, 'http://www.facebook.com/share.php?u='.$url.'&title='.$title, social_bookmarking_options('facebook', $options));
}

/**
 * Builds links to all available social bookmarking services.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   string XHTML compliant <a href> tags
 * @see     link_to_delicious, link_to_technorati, link_to_furl, link_to_yahoo_myweb, link_to_google_bookmarks, link_to_blinklist, link_to_magnolia, link_to_windows_live, link_to_digg, link_to_netscape, link_to_stumbleupon, link_to_newsvine, link_to_reddit, link_to_tailrank, link_to_spurl, link_to_yigg
 */
function link_to_all_social_bookmarking($url, $title)
{
  $links = '<li>'.link_to_twitter($url, $title).'</li>';
  $links .= '<li>'.link_to_facebook($url, $title).'</li>';
  $links .= '<li>'.link_to_delicious($url, $title).'</li>';
  $links .= '<li>'.link_to_technorati($url).'</li>';
  $links .= '<li>'.link_to_furl($url, $title).'</li>';
  $links .= '<li>'.link_to_yahoo_myweb($url, $title).'</li>';
  $links .= '<li>'.link_to_google_bookmarks($url, $title).'</li>';
  $links .= '<li>'.link_to_blinklist($url, $title).'</li>';
  $links .= '<li>'.link_to_magnolia($url, $title).'</li>';
  $links .= '<li>'.link_to_windows_live($url, $title).'</li>';
  $links .= '<li>'.link_to_digg($url, $title).'</li>';
  $links .= '<li>'.link_to_netscape($url, $title).'</li>';
  $links .= '<li>'.link_to_stumbleupon($url, $title).'</li>';
  $links .= '<li>'.link_to_newsvine($url, $title).'</li>';
  $links .= '<li>'.link_to_reddit($url, $title).'</li>';
  $links .= '<li>'.link_to_tailrank($url, $title).'</li>';
  $links .= '<li>'.link_to_spurl($url, $title).'</li>';
  $links .= '<li>'.link_to_yigg($url).'</li>';

  return $links;
}

/**
 * Builds links for defined bookmarking services.
 *
 * @param   mixed   $social_bookmarking - array or string (separated by , character) of bookmarking services
 * @param   mixed   $url - Url which should be added
 * @param   string  $title - Title which describes the content of the page
 * @return  string  string XHTML compliant <a href> tags
 */
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
