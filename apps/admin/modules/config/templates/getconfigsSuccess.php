<?php
$valuesArr = array();

foreach ($values as $value)
{
    $valuesArr['values'][] = array('id'=>$value->getId(), 'name'=>$value->getValue());            
}
?>
<?php echo json_encode($valuesArr) ?>