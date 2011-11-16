<?php

/**
 * media actions.
 *
 * @package    Maxlaptop
 * @subpackage media
 * @author     navid045@gmail.com
 */
class mediaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Medias = MediaPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MediaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MediaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Media = MediaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Media does not exist (%s).', $request->getParameter('id')));
    $this->form = new MediaForm($Media);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Media = MediaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Media does not exist (%s).', $request->getParameter('id')));
    $this->form = new MediaForm($Media);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
      if(!$this->hasRequestParameter('id'))
      {
          $request->checkCSRFProtection();
      }    

    $this->forward404Unless($Media = MediaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Media does not exist (%s).', $request->getParameter('id')));
    
    //Delete files from file system.
    unlink(sfConfig::get('sf_upload_dir')."/".$Media->getId().".".$Media->getExt());
    unlink(sfConfig::get('sf_upload_dir')."/th_".$Media->getId().".".$Media->getExt());
        
    $Media->delete();
    
    if ($this->hasRequestParameter('parent'))
    {
        $configId = $this->getRequestParameter('parent');
        $this->redirect('config/editconfig?id='.$configId);
    }
    else
        $this->redirect('media/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Media = $form->save();

      $this->redirect('media/edit?id='.$Media->getId());
    }
  }
}
