<?php
class PluginsfSimpleBlogArchiveQuery extends BasesfSimpleBlogArchiveQuery
{
  public function findOneByMonthAndYear($month, $year, $con = null)
  {
    return $this
      ->filterByMonth($month)
      ->filterByYear($year)
      ->findOneOrCreate($con);
  }
}