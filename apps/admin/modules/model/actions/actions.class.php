<?php

/**
 * model actions.
 *
 * @package    Maxlaptop
 * @subpackage model
 * @author     navid045@gmail.com
 */
class modelActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Models = ModelPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ModelForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ModelForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Model = ModelPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Model does not exist (%s).', $request->getParameter('id')));
    $this->form = new ModelForm($Model);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Model = ModelPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Model does not exist (%s).', $request->getParameter('id')));
    $this->form = new ModelForm($Model);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Model = ModelPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Model does not exist (%s).', $request->getParameter('id')));
    $Model->delete();

    $this->redirect('model/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Model = $form->save();

      $this->redirect('model/edit?id='.$Model->getId());
    }
  }
}
