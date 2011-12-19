<?php

class dosearchAction extends sfAction
{
    public function execute($request)
    {
        $conection = Propel::getConnection();
        
        //set content type to json
        $this->getResponse()->setContentType("application/json");
        
        //make fields array
        $query0 = "select config_field.id, CONCAT(config_field_category.name,\"_\",config_field.name ,'=') as value
        from config_field
        left join config_field_category on (config_field_category.id = config_field.category_id)";
        
        $statement0 = $conection->prepare($query0);
        $statement0->execute();
        $resultsTemp = $statement0->fetchAll(PDO::FETCH_ASSOC);  
        
        $fieldIdValueArr = array();
        foreach ($resultsTemp as $result)
        {
            $fieldIdValueArr[$result['id']] = $result['value'];
        }//
        
        //get brands
        $this->brandsParam = $this->getRequestParameter('brands');
        
        
        
        $query = "SELECT config.id, config.config_name, model.model_name, series.series_name, 
                  brand.brand_name, field_value.id as field_value_id, field_value.field_id,
                  config_field.name as config_field_name, config_field.html_comment, GROUP_CONCAT(CONCAT(config_field_category.name,\"_\",config_field.name ,'=',field_value.value) SEPARATOR '|') as value
                  FROM config

                  LEFT JOIN model ON (config.model_id=model.id)
                  LEFT JOIN series ON (model.series_id=series.id)
                  LEFT JOIN brand ON (series.brand_id=brand.id)
                  LEFT JOIN field_value ON (field_value.config_id = config.id)
                  LEFT JOIN config_field ON (config_field.id = field_value.field_id)
                  LEFT JOIN config_field_category ON (config_field.category_id = config_field_category.id)
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
        
        $query .= " GROUP BY id";
        
        $this->fields = $this->getRequestParameter('fields');
        if (count($this->fields) > 0)
        {
            $query .= " HAVING (";
            $firstItem = true;
            foreach($this->fields as $keyField=>$values)
            {
                if(!$firstItem)
                {
                    $query .= " AND ";
                }
                $query .= " ( ";
                
                $firstItem2 = true;
                foreach ($values as $value)
                {
                    
                    if (!$firstItem2)
                    {
                        $query .= " OR ";
                    }
                    
                    $query .= " value LIKE ( '%".$fieldIdValueArr[$keyField].$value."%' ) ";
                    $firstItem2 = false;
                }
                $query .= " )";
                $firstItem = false;
            }
            $query .= " )";
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
