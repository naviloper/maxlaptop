<?php
$seriesArr = array();

foreach ($serieses as $series)
{
    $seriesArr['series'][] = array('id'=>$series->getId(), 'name'=>$series->getSeriesName());            
}
?>
<?php echo json_encode($seriesArr) ?>