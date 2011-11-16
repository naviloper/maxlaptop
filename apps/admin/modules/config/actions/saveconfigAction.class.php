<?php

class saveconfigAction extends sfAction
{
    public function execute($request)
    {
        
        //get params
        $this->brand = $this->getRequestParameter('brand');
        $this->series = $this->getRequestParameter('series');
        $this->model = $this->getRequestParameter('model');
        $this->configId = $this->getRequestParameter('config_id');
        
        //get image files
        $this->mainImage = $this->getRequest()->getFiles('main_image');
        $this->otherImages = $this->getRequest()->getFiles('other_images');
        
        //print_r($this->otherImages);
        //exit ();
                
        //load/create series and model
        if(SeriesPeer::isNew($this->series))
        {
            //create new series
            $seriesObj = new Series;
            $seriesObj->setSeriesName($this->series);
            $seriesObj->setBrandId($this->brand);
            $seriesObj->save();
            
            //create new model
            $modelObj = new Model;
            $modelObj->setModelName($this->model);
            $modelObj->setSeries($seriesObj);
            $modelObj->save();
            
        }
        else
        {
            //load series object
            $seriesObj = SeriesPeer::getSeriesByName($this->series);
                        
            if(ModelPeer::isNew($this->model))
            {
                //create new model
                $modelObj = new Model;
                $modelObj->setModelName($this->model);
                $modelObj->setSeries($seriesObj);
                $modelObj->save();
            }
            else
            {
                $modelObj = ModelPeer::getModelByName($this->model);
            }
        }
        //////////////////////
        
        
        if(($this->isNew = $this->getRequestParameter('is_new')) == 'true' ) 
        {
            //create new config
            $config = new Config();

            $config->setConfigName($this->getRequestParameter('name'));
            $config->setModel($modelObj);
            $config->save();

            //load config fields
            $configFields = ConfigFieldPeer::doSelect(new Criteria());

            foreach ($configFields as $configField)
            {
                //get param
                if ($this->hasRequestParameter("field_".$configField->getId()))
                {
                    //if (strlen($this->getRequestParameter("field_".$configField->getId())) > 0 )
                    //{
                        $fieldValue = new FieldValue();

                        $fieldValue->setConfig($config);
                        $fieldValue->setFieldId($configField->getId());
                        $fieldValue->setValue($this->getRequestParameter("field_".$configField->getId()));

                        $fieldValue->save();
                    //}
                }
            }
        }
        else
        {
            //load config
            $config = ConfigPeer::retrieveByPK($this->configId);
            
            $config->setConfigName($this->getRequestParameter('name'));
            $config->setModel($modelObj);
            $config->save();
            
            //load config fields
            $configFields = ConfigFieldPeer::doSelect(new Criteria());
            
            foreach ($configFields as $configField)
            {
                //get param
                if ($this->hasRequestParameter("field_".$configField->getId()))
                {
                    //if (strlen($this->getRequestParameter("field_".$configField->getId())) > 0 )
                    //{
                        $fieldValue = FieldValuePeer::getFieldValue($configField->getId(), $config->getId());

                        $fieldValue->setValue($this->getRequestParameter("field_".$configField->getId()));

                        $fieldValue->save();
                    //}
                }
            }
            
        }
        
        
        //save main image
        MediaPeer::saveMedia($this->mainImage, $modelObj->getId(), MediaPeer::IMAGE, 'Model', true);
        
        //save other images
        foreach ($this->otherImages as $image)        
        {
            MediaPeer::saveMedia($image, $modelObj->getId(), MediaPeer::IMAGE, 'Model', false);
        }
        
        if(($saveAndNew = $this->getRequestParameter('save_and_new')) == 'true')
            $this->redirect('config/newconfig');
        else
            $this->redirect('config/editconfig?id='.$config->getId());
    }
}

?>