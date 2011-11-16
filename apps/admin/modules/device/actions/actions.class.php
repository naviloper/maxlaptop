<?php

/**
 * device actions.
 *
 * @package    Maxlaptop
 * @subpackage device
 * @author     navid045@gmail.com
 */
class deviceActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Devices = DevicePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DeviceForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DeviceForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Device = DevicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Device does not exist (%s).', $request->getParameter('id')));
    $this->form = new DeviceForm($Device);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Device = DevicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Device does not exist (%s).', $request->getParameter('id')));
    $this->form = new DeviceForm($Device);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Device = DevicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Device does not exist (%s).', $request->getParameter('id')));
    $Device->delete();

    $this->redirect('device/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Device = $form->save();

      $this->redirect('device/edit?id='.$Device->getId());
    }
  }
}
