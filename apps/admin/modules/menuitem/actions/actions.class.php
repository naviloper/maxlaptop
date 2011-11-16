<?php

/**
 * menuitem actions.
 *
 * @package    Maxlaptop
 * @subpackage menuitem
 * @author     navid045@gmail.com
 */
class menuitemActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->MenuItems = MenuItemPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MenuItemForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MenuItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($MenuItem = MenuItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object MenuItem does not exist (%s).', $request->getParameter('id')));
    $this->form = new MenuItemForm($MenuItem);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($MenuItem = MenuItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object MenuItem does not exist (%s).', $request->getParameter('id')));
    $this->form = new MenuItemForm($MenuItem);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($MenuItem = MenuItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object MenuItem does not exist (%s).', $request->getParameter('id')));
    $MenuItem->delete();

    $this->redirect('menuitem/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $MenuItem = $form->save();

      $this->redirect('menuitem/edit?id='.$MenuItem->getId());
    }
  }
}
