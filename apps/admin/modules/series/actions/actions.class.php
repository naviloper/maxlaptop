<?php

/**
 * series actions.
 *
 * @package    Maxlaptop
 * @subpackage series
 * @author     navid045@gmail.com
 */
class seriesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Seriess = SeriesPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SeriesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SeriesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Series = SeriesPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Series does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeriesForm($Series);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Series = SeriesPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Series does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeriesForm($Series);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Series = SeriesPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Series does not exist (%s).', $request->getParameter('id')));
    $Series->delete();

    $this->redirect('series/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Series = $form->save();

      $this->redirect('series/edit?id='.$Series->getId());
    }
  }
}
