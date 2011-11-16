<?php

/**
 * brand actions.
 *
 * @package    Maxlaptop
 * @subpackage brand
 * @author     navid045@gmail.com
 */
class brandActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Brands = BrandPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BrandForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BrandForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Brand = BrandPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Brand does not exist (%s).', $request->getParameter('id')));
    $this->form = new BrandForm($Brand);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Brand = BrandPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Brand does not exist (%s).', $request->getParameter('id')));
    $this->form = new BrandForm($Brand);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Brand = BrandPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Brand does not exist (%s).', $request->getParameter('id')));
    $Brand->delete();

    $this->redirect('brand/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Brand = $form->save();

      $this->redirect('brand/edit?id='.$Brand->getId());
    }
  }
}
