<?php

require_once dirname(__FILE__).'/../lib/pageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pageGeneratorHelper.class.php';

/**
 * page actions.
 *
 * @package    Maxlaptop
 * @subpackage page
 * @author     navid045@gmail.com
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pageActions extends autoPageActions
{
  public function executeBatchPublish(sfWebRequest $request, $set=true)
  {
    $ids = $request->getParameter('ids');
 
    $c = new Criteria();
    $q = PagePeer::retrieveByPKs($ids);
 
    foreach ($q as $page)
    {
      $page->setIsPublished( $set );
      $page->save();
    }
 
    $this->getUser()->setFlash('notice', 'The selected pages have been '.($set?'published':'drafted').' successfully.');
 
    $this->redirect('page');
  }
  
  public function executeBatchDraft(sfWebRequest $request)
  {
  	$this->executeBatchPublish($request, false);
  }
  
  public function executePublish(sfWebRequest $request, $set=true)
  {
    $id = $request->getParameter('id');
  	
    $c = new Criteria();
    $page = PagePeer::retrieveByPK($id);

    $page->setIsPublished( $set );
    $page->save();
    
    $this->getUser()->setFlash('notice', 'The selected page has been '.($set?'published':'drafted').' successfully.');
    $this->redirect('page');
  }
  
  public function executeDraft(sfWebRequest $request, $set=true)
  {
  	$this->executePublish($request, false);
  }
}
