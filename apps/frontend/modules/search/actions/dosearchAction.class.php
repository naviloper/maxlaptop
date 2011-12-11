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
        
        $firsWhere = true;
        
        //add brands to query
        if (count($this->brandsParam) > 0)
        {
            $firsWhere = false;
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
        /*$this->fields = $this->getRequestParameter('fields');
        if (count($this->fields) > 0)
        {
            if ($firsWhere)
            {
                $query .= "WHERE ";
            }
            else
            {
                $query .= "AND ";
            }
            $query .= " config.id IN (  SELECT field_value.config_id FROM field_value";
            $firstWhere = false;
            
            $firstWhere2 = true;
            
            foreach($this->fields as $keyField=>$values)
            {
                if ($firstWhere2)
                    $query .= " WHERE ";
                else
                    $query .= " OR ";
                
                $firstWhere2 = false;
                
                $query .= " (field_id = ".$keyField." AND value IN ( ";
                $first = true;
                foreach ($values as $value)
                {
                    if(!$first)
                    {
                        $query .= ", ";
                    }
                    $query .= "'$value'";
                    $first = false;
                }
                $query .= " ) ";
                $query .= " ) ";
                
            }
            $query .= " ) ";
        }*/
        $this->fields = $this->getRequestParameter('fields');
        if (count($this->fields) > 0)
        {
            if ($firsWhere)
            {
                $query .= "WHERE ";
            }
            else
            {
                $query .= "AND ";
            }
            $query .= " config.id IN (  SELECT field_value.config_id FROM field_value";
            $firstWhere = false;
            
            $first = true;
            $query .= " WHERE field_id IN (";
            foreach($this->fields as $keyField=>$values)
            {
                if(!$first)
                {
                    $query .= ", ";
                }
                $query .= $keyField;
                $first = false;
            }
            $query .= ")";
            
            $first = true;
            $query .= " AND value IN ( ";
            foreach($this->fields as $keyField=>$values)
            {
                foreach ($values as $value)
                {
                    if(!$first)
                    {
                        $query .= ", ";
                    }
                    $query .= "'$value'";
                    $first = false;
                }                 
            }
             
            $query .= " ) ) ";
        }
        
        $statement = $conection->prepare($query);
        $statement->execute();
        $this->results = $statement->fetchAll(PDO::FETCH_OBJ);
                
        //echo $query;
        //print_r($results);
        //exit();
            
    }
}

?>
