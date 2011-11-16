<?php

class dosearchAction extends sfAction
{
    public function execute($request)
    {
        //set content type to json
        $this->getResponse()->setContentType("application/json");
        
        //get brands
        $this->brandsParam = $this->getRequestParameter('brands');
        
        $conection = Propel::getConnection();
        
        $query = "SELECT config.id, config.config_name, model.model_name, series.series_name, 
                  brand.brand_name, field_value.id as field_value_id, field_value.field_id,
                  field_value.value, config_field.name as config_field_name, config_field.html_comment
                  FROM config

                  LEFT JOIN model ON (config.model_id=model.id)
                  LEFT JOIN series ON (model.series_id=series.id)
                  LEFT JOIN brand ON (series.brand_id=brand.id)
                  LEFT JOIN field_value ON (field_value.config_id = config.id)
                  LEFT JOIN config_field ON (config_field.id = field_value.field_id)
                  ";
        
        //add brands to query
        if (count($this->brandsParam) > 0)
        {
            $query .= " WHERE brand.id IN ( ";
            $first = true;
        
            foreach ($this->brandsParam as $key=>$val)
            {
                if(!$first)
                {
                    $query .= ", ";
                }
                $query .= $key;
                $first = false;
            }
            
            $query .= ") ";
        }
        //add fields parameter to query
        $this->fields = $this->getRequestParameter('fields');
        if (count($this->fields) > 0)
        {
            
        }
        
        //echo $query;
        
        $statement = $conection->prepare($query);
        $statement->execute();
        $this->results = $statement->fetchAll(PDO::FETCH_OBJ);
        
        //echo $query;
        //print_r($results);
        //exit();
            
    }
}

?>
