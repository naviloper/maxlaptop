<?php
$modelsArr = array();

foreach ($models as $model)
{
    $modelsArr['models'][] = array('id'=>$model->getId(), 'name'=>$model->getModelName());            
}
?>
<?php echo json_encode($modelsArr) ?>