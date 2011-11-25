<?php

/**
 * Project filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseFormFilterPropel extends sfFormFilterPropel
{
  public function setup()
  {
       //Following code will remove Required validators from these fields.
      unset($this->validatorSchema['created_at']);
      unset($this->validatorSchema['updated_at']);
      //following code will remove fields from form
      unset($this->widgetSchema['created_at']);
      unset($this->widgetSchema['updated_at']);
   }
}
