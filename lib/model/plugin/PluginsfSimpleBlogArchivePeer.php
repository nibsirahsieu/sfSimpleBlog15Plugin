<?php
class PluginsfSimpleBlogArchivePeer extends BasesfSimpleBlogArchivePeer
{
  public static function incrementCounter($date, $con = null)
  {
    if (!is_int($date)) $date = strtotime($date);
    $archive = sfSimpleBlogArchiveQuery::create()->findOneByMonthAndYear(date('n', $date), date('Y', $date));
    $archive->setCount($archive->getCount()+1);
    $archive->save($con);
  }

  public static function decrementCounter($date, $con = null)
  {
    if (!is_int($date)) $date = strtotime($date);
    $archive = sfSimpleBlogArchiveQuery::create()->findOneByMonthAndYear(date('n', $date), date('Y', $date));
    if ($archive->getCount() > 0)
    {
      $archive->setCount($archive->getCount()-1);
    }
    $archive->save($con);
  }
}