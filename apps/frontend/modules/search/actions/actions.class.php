<?php

/**
 * search actions.
 *
 * @package    Maxlaptop
 * @subpackage search
 * @author     navid045@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      //tabs array, we add tab items to it
      $this->tabs = array();
      
      //get available brands
      $this->brands = BrandPeer::doSelect(new Criteria);
      
      $tabIndex = 1;
      
      $this->tabs[$tabIndex]['title'] = 'ÈÑäÏ';
      $this->tabs[$tabIndex]['content'] = $this->renderBrands($this->brands);
      
      ++$tabIndex;
      
      //get field sets
      $this->configFieldCategories = ConfigFieldCategoryPeer::doSelect(new Criteria);
      
      foreach($this->configFieldCategories as $configFieldCategory)
      {
          $this->tabs[$tabIndex]['title'] = $configFieldCategory->getName();
          $this->tabs[$tabIndex]['content'] = $this->renderFieldCategory($configFieldCategory);
      
          ++$tabIndex;
      }
  }
  
  
  protected function renderBrands($brands)
  {
      $str = "";
      
      $str .= "<div>";
      foreach($brands as $brand)
      {
          $str .= "<label>".$brand->getBrandName()."</label>";
          $str .= "<input type=\"checkbox\" name=\"brands[".$brand->getId()."]\"  id=\"brands_".$brand->getId()."\" ><br>";
      }
      $str .= "</div>";
      
      return $str;
  }
  
  
  protected function renderFieldCategory(ConfigFieldCategory $fieldCategory)
  {
      $str = "";
      
      $fields = $fieldCategory->getConfigFields();
      
      foreach($fields as $field)
      {
          $str .= "<fieldset>";
          $str .= "<legend>".$field->getName()."</legend>";
          
          $fieldId = $field->getId();
        
            $cField = new Criteria();
            $cField->add(FieldValuePeer::FIELD_ID, $fieldId);

            /*$c1 = $cField->getNewCriterion(FieldValuePeer::VALUE, $query.'%', Criteria::LIKE);
            $c2 = $cField->getNewCriterion(FieldValuePeer::VALUE, "", Criteria::NOT_EQUAL);
            $c1->addAnd($c2);        
            $cField->addAnd($c1);*/
            
            $cField->add(FieldValuePeer::VALUE, "", Criteria::NOT_EQUAL);
            
            $cField->addGroupByColumn(FieldValuePeer::VALUE);
            $cField->addAscendingOrderByColumn(FieldValuePeer::VALUE);
            $cField->setLimit(15);

            $values = FieldValuePeer::doSelect($cField);
            
            $valueIndex = 0;
                        
            foreach ($values as $value)
            {
                $str .= "<label>".$value->getValue()."</label>";
                $str .= "<input type=\"checkbox\" name=\"fields[".$field->getId()."][$valueIndex]\"  id=\"fields_".$field->getId()."_$valueIndex\" value=\"".$value->getValue()."\" /><br>";
                $valueIndex++;
            }
          
          $str .= "</fieldset>";
      }
      
      return $str;
      
  }
}