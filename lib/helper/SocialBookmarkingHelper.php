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
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_delicious($url, $title=null, $imgtitle='Share on del.icio.us')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/delicious.gif','title='.$imgtitle), 'http://del.icio.us/post?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Technorati.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_technorati($url, $imgtitle='Share on Technorati')
{
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/technorati.gif','title='.$imgtitle), 'http://technorati.com/faves/?add='.$url);
}

/**
 * Builds a link to add url to Furl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_furl($url, $title=null, $imgtitle='Share on Furl')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/furl.gif','title='.$imgtitle), 'http://www.furl.net/storeIt.jsp?t='.$title.'&u='.$url);
}

/**
 * Builds a link to add url to Yahoo! My Web.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_yahoo_myweb($url, $title=null, $imgtitle='Share on Yahoo! My Web')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/yahoo_myweb.gif','title='.$imgtitle), 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$url.'&t='.$title);
}

/**
 * Builds a link to add url Google Bookmarks.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_google_bookmarks($url, $title=null, $imgtitle='Share on Google Bookmarks')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/google_bmarks.gif','title='.$imgtitle), 'http://www.google.com/bookmarks/mark?op=edit&bkmk='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Blinklist.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_blinklist($url, $title=null, $imgtitle='Share on Blinklist')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/blinklist.gif','title='.$imgtitle), 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$url.'&Title='.$title);
}

/**
 * Builds a link to add url to ma.gnolia.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_magnolia($url, $title=null, $imgtitle='Share on ma.gnolia')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/magnolia.gif','title='.$imgtitle), 'http://ma.gnolia.com/bookmarklet/add?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Windows Live.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_windows_live($url, $title=null, $imgtitle='Share on Windows Live')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/windows_live.gif','title='.$imgtitle), 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$url.'&title='.$title.'&top=1');
}

/**
 * Builds a link to add url to Digg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_digg($url, $title=null, $imgtitle='Share on Digg')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/digg.gif','title='.$imgtitle), 'http://digg.com/submit?phase=2&url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Netscape.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_netscape($url, $title=null, $imgtitle='Share on Netscape')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/netscape.gif','title='.$imgtitle), 'http://www.netscape.com/submit/?U='.$url.'&T='.$title);
}

/**
 * Builds a link to add url to StumbleUpon.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_stumbleupon($url, $title=null, $imgtitle='Share on StumbleUpon')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/stumbleupon.gif','title='.$imgtitle), 'http://www.stumbleupon.com/submit?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Newsvine.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_newsvine($url, $title=null, $imgtitle='Share on Newsvine')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/newsvine.gif','title='.$imgtitle), 'http://www.newsvine.com/_wine/save?u='.$url.'&h='.$title);
}

/**
 * Builds a link to add url to Reddit.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_reddit($url, $title=null, $imgtitle='Share on Reddit')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/reddit.gif','title='.$imgtitle), 'http://reddit.com/submit?url='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Tailrank.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_tailrank($url, $title=null, $imgtitle='Share on Tailrank')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/tailrank.gif','title='.$imgtitle), 'http://tailrank.com/share/?link_href='.$url.'&title='.$title);
}

/**
 * Builds a link to add url to Spurl.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_spurl($url, $title=null, $imgtitle='Share on Spurl')
{
  $title = urlencode($title);
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/spurl.gif','title='.$imgtitle), 'http://www.spurl.net/spurl.php?title='.$title.'&url='.$url);
}

/**
 * Builds a link to add url to Yigg.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $imgtitle - Text which is shown on image hover
 * @return  string   Linked icon
 * @see     link_to, image_tag
 */
function link_to_yigg($url, $imgtitle='Share on Yigg')
{
  $url = urlencode($url);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/yigg.gif','title='.$imgtitle), 'http://yigg.de/neu?exturl='.$url);
}

function link_to_twitter($url, $title, $imgtitle = 'Share on Twitter')
{
  $url = urlencode($url);
  $title = urlencode($title);
  
  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/twitter.png', 'title='.$imgtitle), 'http://twitter.com/home?status='.$url.'+'.$title);
}

function link_to_facebook($url, $title, $imgtitle = 'Share on Facebook')
{
  $url = urlencode($url);
  $title = urlencode($title);

  return link_to(image_tag('/sfSocialBookmarkingPlugin/images/facebook.png', 'title='.$imgtitle), 'http://www.facebook.com/share.php?u='.$url.'&title='.$title);
}

/**
 * Builds links to all available social bookmarking services.
 * 
 * @param   string   $url - Url which should be added 
 * @param   string   $title - Title which describes the content of the page
 * @return  string   Linked icons
 * @see     link_to_delicious, link_to_technorati, link_to_furl, link_to_yahoo_myweb, link_to_google_bookmarks, link_to_blinklist, link_to_magnolia, link_to_windows_live, link_to_digg, link_to_netscape, link_to_stumbleupon, link_to_newsvine, link_to_reddit, link_to_tailrank, link_to_spurl, link_to_yigg
 */
function link_to_all_social_bookmarking($url, $title=null)
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
    $links .= $key == 0 ? call_user_func($func, $url, $title) : ' '.call_user_func($func, $url, $title);
  }
  return $links;
}