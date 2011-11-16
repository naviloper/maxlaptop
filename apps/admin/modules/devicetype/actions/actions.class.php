<?php

/**
 * devicetype actions.
 *
 * @package    Maxlaptop
 * @subpackage devicetype
 * @author     navid045@gmail.com
 */
class devicetypeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->DeviceTypes = DeviceTypePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DeviceTypeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DeviceTypeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($DeviceType = DeviceTypePeer::retrieveByPk($request->getParameter('id')), sprintf('Object DeviceType does not exist (%s).', $request->getParameter('id')));
    $this->form = new DeviceTypeForm($DeviceType);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($DeviceType = DeviceTypePeer::retrieveByPk($request->getParameter('id')), sprintf('Object DeviceType does not exist (%s).', $request->getParameter('id')));
    $this->form = new DeviceTypeForm($DeviceType);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($DeviceType = DeviceTypePeer::retrieveByPk($request->getParameter('id')), sprintf('Object DeviceType does not exist (%s).', $request->getParameter('id')));
    $DeviceType->delete();

    $this->redirect('devicetype/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $DeviceType = $form->save();

      $this->redirect('devicetype/edit?id='.$DeviceType->getId());
    }
  }
}
