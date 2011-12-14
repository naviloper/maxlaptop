<?php

class MyConfigForm extends BaseForm
{
    public function setup()
    {
        $this->setWidgets(array(
            'is_new'=> new sfWidgetFormInputHidden(),
            'config_id'=> new sfWidgetFormInputHidden(),
            'brand'=> new sfWidgetFormPropelChoice(array('model'=>'Brand', 'add_empty'=>true, 'method'=>'getBrandName')),
            'series'=> new sfWidgetFormInput(),
            'model'=> new sfWidgetFormInput()
        ));
        
        $this->setValidators(array(
            'is_new'=> new sfValidatorChoice(array('choices'=>array('true', 'false'))),
            'config_id'=> new sfValidatorNumber(array('required'=>false)),
            'brand'=> new sfValidatorPropelChoice(array('model'=>'Brand')),
            'series'=> new sfValidatorString(),
            'model' => new sfValidatorString()
        ));
        
        $this->getValidatorSchema()->setOption('allow_extra_fields', true);
    }
}

?>
