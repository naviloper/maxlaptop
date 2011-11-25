<?php

/**
 * page module helper.
 *
 * @package    Maxlaptop
 * @subpackage page
 * @author     navid045@gmail.com
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pageGeneratorHelper extends BasePageGeneratorHelper
{
  public function linkToPublish($object, $params)
  {
  	if(!$object->getIsPublished())
    	return '<li class="sf_admin_action_publish">'.link_to(__("Publish", array(), 'sf_admin'),"page/publish?id=".$object->getId()).'</li>';
    else
        return '<li class="sf_admin_action_draft">'.link_to(__("Draft", array(), 'sf_admin'),"page/draft?id=".$object->getId()).'</li>';
  }
}
