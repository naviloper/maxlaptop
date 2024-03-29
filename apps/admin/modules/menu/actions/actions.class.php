<?php

/**
 * menu actions.
 *
 * @package    Maxlaptop
 * @subpackage menu
 * @author     navid045@gmail.com
 */
class menuActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Menus = MenuPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MenuForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MenuForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Menu = MenuPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Menu does not exist (%s).', $request->getParameter('id')));
    $this->form = new MenuForm($Menu);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Menu = MenuPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Menu does not exist (%s).', $request->getParameter('id')));
    $this->form = new MenuForm($Menu);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Menu = MenuPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Menu does not exist (%s).', $request->getParameter('id')));
    $Menu->delete();

    $this->redirect('menu/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Menu = $form->save();

      $this->redirect('menu/edit?id='.$Menu->getId());
    }
  }
}
