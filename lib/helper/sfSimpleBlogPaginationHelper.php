<?php
function page_pagination($pager, $uri, $sf_params, $prev_text = 'Previous', $next_text = 'Next', $sort = 'desc')
{
  $navigation = '';
  if ($pager->haveToPaginate()) {
    $prms = array();
    if (null !== $sf_params && $sf_params instanceof sfParameterHolder) {
      $prms = array_merge($sf_params->getAll(), $prms);
      unset($prms['module'], $prms['action'], $prms['page']);
    }
    $uri .= '?page=';

    $navigation .= '<div id="nav-below" class="navigation">';
    if ($pager->getPage() != 1) {
      $navigation .= '<div class="nav-next"><a href="'.formatUrlFromParameters($uri.$pager->getPreviousPage(), $prms).'">'.__($next_text).'</a><span class="meta-nav">&rarr;</span></div>';
    }
    if ($pager->getPage() != $pager->getLastPage()) {
      $navigation .= '<div class="nav-previous"><span class="meta-nav">&larr;</span><a href="'.formatUrlFromParameters($uri.$pager->getNextPage(), $prms).'">'.__($prev_text).'</a></div>';
    }
    $navigation .= '</div>';
  }
  return $navigation;
}

function formatUrlFromParameters($uri, $prms)
{
  $url = url_for($uri);
  if (count($prms) > 0)
  {
    $url = url_for($url)."?".http_build_query($prms, '', '&');
  }
  return $url;
}
