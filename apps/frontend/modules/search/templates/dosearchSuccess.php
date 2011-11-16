<?php
//make json array
$resultArr = array();
$counter = 0;

foreach ($results as $item)
{
    $resultArr[$counter]['brand_name'] = $item->brand_name;
    //$resultArr[$counter]['brand_id'] = $item->id3;

    $resultArr[$counter]['series_name'] = $item->series_name;
    //$resultArr[$counter]['series_id'] = $item->id2;

    $resultArr[$counter]['model_name'] = $item->model_name;
    //$resultArr[$counter]['model_id'] = $item->id1;

    $resultArr[$counter]['config_name'] = $item->config_name;
    $resultArr[$counter]['config_id'] = $item->id;

    $counter++;
}
?>
<?php echo json_encode($resultArr) ?>