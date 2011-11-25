<?php

require_once dirname(__FILE__).'/../lib/brandGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/brandGeneratorHelper.class.php';

/**
 * brand actions.
 *
 * @package    Maxlaptop
 * @subpackage brand
 * @author     navid045@gmail.com
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class brandActions extends autoBrandActions
{
    public function executeListMoveUp(sfWebRequest $request){
    $id = $request->getParameter('id');

    $current = BrandPeer::retrieveByPK($id);
    $items = BrandPeer::doSelect(new Criteria());
    for($i=1;$i<count($items);$i++){
        //echo $items[$i];
        if($items[$i]->getId()==$id){
            $tmp = $items[$i-1]->getWeight();
            $items[$i-1]->setWeight( $tmp!=$items[$i]->getWeight()?$items[$i]->getWeight():$items[$i]->getWeight()-1 ); 
            $items[$i]->setWeight( $tmp );
            $items[$i]->save();
            $items[$i-1]->save();
            break;
        }
    }
    $this->redirect('brand');
}

public function executeListMoveDown(sfWebRequest $request){
    $id = $request->getParameter('id');

    $current = BrandPeer::retrieveByPK($id);
    $items = BrandPeer::doSelect(new Criteria());
    for($i=count($items)-2;$i>=0;$i--){
        //echo $items[$i];
        if($items[$i]->getId()==$id){
            $tmp = $items[$i+1]->getWeight();
            $items[$i+1]->setWeight( $tmp!=$items[$i]->getWeight()?$items[$i]->getWeight():$items[$i]->getWeight()+1 ); 
            $items[$i]->setWeight( $tmp );
            $items[$i]->save();
            $items[$i+1]->save();
            break;
        }
    }
    $this->redirect('brand');
}
}
