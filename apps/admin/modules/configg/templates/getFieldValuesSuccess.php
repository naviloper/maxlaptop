<?php
$tempArr = array();
$resultArr = array();

foreach ($values as $v)
{
    if($v->getvalue()!="" && !in_array($v->getValue(), $tempArr)) $resultArr['values'][] = array('id'=>$v->getId(), 'value'=>$v->getvalue());            
    $tempArr[] = $v->getValue();
}
?>
<?php echo json_encode($resultArr) ?>
