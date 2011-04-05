<?php

class sfSimpleBlogTools
{
  public static function generatePostUri($post, $postfix = null, $action = 'show')
  {
    $strippedTitle = is_array($post) ? $post['StrippedTitle'] : $post->getStrippedTitle();
    if (sfConfig::get('app_sfSimpleBlog_use_date_in_url', false))
    {
      $publishedAt =  is_array($post) ? strtotime($post['PublishedAt']) : strtotime($post->getPublishedAt());
      return 'sfSimpleBlog/' . $action . '?' .
        'year='.date('Y', $publishedAt) .
        '&month='.date('m', $publishedAt) .
        '&day='.date('d', $publishedAt) .
        '&stripped_title='.$strippedTitle .
        $postfix;
    }
    else
    {
      return 'sfSimpleBlog/' . $action . '?stripped_title=' . $strippedTitle.$postfix;
    }
  }

  public static function indexObjectsByFunction($array, $function)
  {
    $result = array();
    foreach($array as $object) {
      $result[$object->$function()] = $object;
    }
    return $result;
  }
}

?>