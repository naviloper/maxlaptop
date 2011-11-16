<?php

class getmodelimagesAction extends sfAction
{
    public function execute($request)
    {
        $this->model = new Model();
        
        $this->model = ModelPeer::retrieveByPK($this->getRequestParameter('model_id'));
    }
}

?>
