<?php

/**
 * configfieldcategory actions.
 *
 * @package    Maxlaptop
 * @subpackage configfieldcategory
 * @author     navid045@gmail.com
 */
class configfieldcategoryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ConfigFieldCategorys = ConfigFieldCategoryPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ConfigFieldCategoryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ConfigFieldCategoryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ConfigFieldCategory = ConfigFieldCategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object ConfigFieldCategory does not exist (%s).', $request->getParameter('id')));
    $this->form = new ConfigFieldCategoryForm($ConfigFieldCategory);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ConfigFieldCategory = ConfigFieldCategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object ConfigFieldCategory does not exist (%s).', $request->getParameter('id')));
    $this->form = new ConfigFieldCategoryForm($ConfigFieldCategory);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ConfigFieldCategory = ConfigFieldCategoryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object ConfigFieldCategory does not exist (%s).', $request->getParameter('id')));
    $ConfigFieldCategory->delete();

    $this->redirect('configfieldcategory/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ConfigFieldCategory = $form->save();

      $this->redirect('configfieldcategory/edit?id='.$ConfigFieldCategory->getId());
    }
  }
}
