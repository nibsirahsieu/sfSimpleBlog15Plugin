<?php

class sfSimpleBlogTools
{
  public static function generatePostUri($post, $postfix = null, $action = 'show')
  {
    if (sfConfig::get('app_sfSimpleBlog_use_date_in_url', false))
    {
      $publishedAt = strtotime($post->getPublishedAt());
      return 'sfSimpleBlog/' . $action . '?' .
        'year='.date('Y', $publishedAt) . 
        '&month='.date('m', $publishedAt) .
        '&day='.date('d', $publishedAt) .
        '&stripped_title='.$post->getStrippedTitle() .
        $postfix;
    }
    else
    {
      return 'sfSimpleBlog/' . $action . '?stripped_title=' . $post->getStrippedTitle().$postfix;
    }
  }
}

?>