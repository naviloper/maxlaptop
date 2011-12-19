<?php

/**
 * config actions.
 *
 * @package    Maxlaptop
 * @subpackage config
 * @author     navid045@gmail.com
 */
class configgActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->brands = BrandPeer::doSelect(new Criteria);
  }
  
  public function executeGetSeries(sfWebRequest $request){
      $c = new Criteria();
      $c->add(SeriesPeer::BRAND_ID,$request->getGetParameter('brand_id'));
      $this->series = SeriesPeer::doSelect($c);
  }

  public function executeGetModels(sfWebRequest $request){
      $c = new Criteria();
      $c->add(ModelPeer::SERIES_ID,$request->getGetParameter('series_id'));
      $this->models = ModelPeer::doSelect($c);
  }

  public function executeGetConfigs(sfWebRequest $request){
      $c = new Criteria();
      $c->add(ConfigPeer::MODEL_ID,$request->getGetParameter('model_id'));
      $this->configs = ConfigPeer::doSelect($c);
  }

  public function executeAddBrand(sfWebRequest $request){
      try{
          $q = new Brand();
          $q->setBrandName($request->getParameter('brand_name'));
          $q->save();
          $this->res = "Brand Added!";
      }
      catch (Exception $exc){
          $this->res = $exc->getMessage();
      }
  }

  public function executeAddSeries(sfWebRequest $request){
      try{
          $q = new Series();
          $q->setSeriesName($request->getParameter('series_name'));
          $q->setBrandId($request->getParameter('brand_id'));
          $q->save();
          $this->res = "Series Added!";
      }
      catch (Exception $exc){
          $this->res = $exc->getMessage();
      }
  }

  public function executeAddModel(sfWebRequest $request){
      try{
          $q = new Model();
          $q->setModelName($request->getParameter('model_name'));
          $q->setSeriesId($request->getParameter('series_id'));
          $q->save();
          $this->res = "Model Added!";
      }
      catch (Exception $exc){
          $this->res = $exc->getMessage();
      }
  }

  public function executeDelete(sfWebRequest $request){
      $type = $request->getParameter('type');
      $id = $request->getParameter('id');
      $c = new Criteria();
      try {
          if($type=="brand") BrandPeer::doDelete($c->add(BrandPeer::ID, $id));
          if($type=="series") SeriesPeer::doDelete($c->add(SeriesPeer::ID, $id));
          if($type=="model") ModelPeer::doDelete($c->add(ModelPeer::ID, $id));
          if($type=="config") ConfigPeer::doDelete($c->add(ConfigPeer::ID, $id));
          $this->res = "OK";          
      } catch (Exception $exc) {
          $this->res = $exc->getMessage();
      }
  }

  public function executeGetConfigEditor(sfWebRequest $request){
      $cid = $request->getParameter('config_id');
      if($cid!=-1){
          $config = ConfigPeer::retrieveByPK($cid);
          $this->values = $config->getConfigFieldValues();
      }else $this->values = array();
      $this->cats = ConfigFieldCategoryPeer::doSelect(new Criteria);
  }

  public function executeGetFieldValues(sfWebRequest $request){
      $fid = $request->getParameter('field_id');
      $q = $request->getParameter('query');
      $c = new Criteria();
      //$c->addSelectColumn(FieldValuePeer::VALUE);
      //$c->addSelectColumn(FieldValuePeer::FIELD_ID);
      $c->add(FieldValuePeer::FIELD_ID, $fid);
      $c->add(FieldValuePeer::VALUE, '%'.$q.'%', Criteria::LIKE);
      //$c->setDistinct();
      $this->values = FieldValuePeer::doSelect($c);
  }

  public function executeProcessConfigForm(sfWebRequest $request){
      $data = $request->getGetParameters();
      $config = new Config();
      if($data['cid']=='-1'){ // New Config
          $config->setModelId($data['mid']);
          $config->save();
          foreach($data as $field=>$value) if($field!='cid' && $field!='mid'){
              $fv = new FieldValue();
              $fv->setConfigId($config->getId());
              $fv->setFieldId(intval($field));
              $fv->setValue($value);
              //echo intval($field)."\n";
              $fv->save();
          }
      }else{
          $config = ConfigPeer::retrieveByPK($data['cid']);
          foreach($data as $field=>$value) if($field!='cid' && $field!='mid'){
              $c = new Criteria();
              $c->add(FieldValuePeer::FIELD_ID, intval($field));
              $c->add(FieldValuePeer::CONFIG_ID, $config->getId());
              $fv = FieldValuePeer::doSelectOne($c);
              if(!is_object($fv)){
                  $fv = new FieldValue();
                  $fv->setConfigId($config->getId());
                  $fv->setFieldId(intval($field));
              } 
              $fv->setValue($value);
              //echo intval($fv->getValue())."#";
              //print_r($fv, FALSE);
              $fv->save();
          }
      }
      $this->res = $config->getId();
  }

}
