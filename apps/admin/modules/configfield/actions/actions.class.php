<?php

/**
 * configfield actions.
 *
 * @package    Maxlaptop
 * @subpackage configfield
 * @author     navid045@gmail.com
 */
class configfieldActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ConfigFields = ConfigFieldPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ConfigFieldForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ConfigFieldForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ConfigField = ConfigFieldPeer::retrieveByPk($request->getParameter('id')), sprintf('Object ConfigField does not exist (%s).', $request->getParameter('id')));
    $this->form = new ConfigFieldForm($ConfigField);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ConfigField = ConfigFieldPeer::retrieveByPk($request->getParameter('id')), sprintf('Object ConfigField does not exist (%s).', $request->getParameter('id')));
    $this->form = new ConfigFieldForm($ConfigField);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ConfigField = ConfigFieldPeer::retrieveByPk($request->getParameter('id')), sprintf('Object ConfigField does not exist (%s).', $request->getParameter('id')));
    $ConfigField->delete();

    $this->redirect('configfield/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ConfigField = $form->save();

      $this->redirect('configfield/edit?id='.$ConfigField->getId());
    }
  }
}
