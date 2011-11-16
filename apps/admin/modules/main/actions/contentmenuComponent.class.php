<?php

class contentmenuComponent extends sfComponent
{
    public function execute($request)
    {
        if(!$this->getUser()->isAuthenticated())
        {
            return sfView::NONE;
        }
    }
}

?>
