<?php

/**
 * Project form base class.
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseFormPropel extends sfFormPropel
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
