<?php


/**
 * Skeleton subclass for performing query and update operations on the 'media' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 09/08/11 12:26:42
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class MediaPeer extends BaseMediaPeer
{
    
    const IMAGE = 'Image';
    const VIDEO = 'Video';
    
    
    public static function getMainImage($parentId, $className)
    {
        if($parentId)
        {
            $c = new Criteria();
            
            $c->add(MediaPeer::CLASS_NAME, $className);
            $c->add(MediaPeer::IS_MAIN, 1);
            $c->add(MediaPeer::PARENT_ID, $parentId);
            $c->add(MediaPeer::TYPE, self::IMAGE);
            
            return MediaPeer::doSelectOne($c);
        }
        else
            return null;
    }
    
    
    public static function getOtherImages($parentId, $className)
    {
        if($parentId)
        {
            $c = new Criteria();
            
            $c->add(MediaPeer::CLASS_NAME, $className);
            $c->add(MediaPeer::IS_MAIN, 1, Criteria::NOT_EQUAL);
            $c->add(MediaPeer::PARENT_ID, $parentId);
            $c->add(MediaPeer::TYPE, self::IMAGE);
            
            return MediaPeer::doSelect($c);
        }
        else
            return null;
    }

    public static function saveMedia($file, $parentId, $type, $className, $isMain)
    {
        if($file['name'])
        {
            $media = new Media();
        
            $media->setParentId($parentId);
            $media->setType($type);
            $media->setClassName($className);
            $media->setPath($file['name']);

            //retrive file extention
            $fileNameArr = explode('.', $file['name']);
            $fileExt = end($fileNameArr);
            $media->setExt($fileExt);

            if ($isMain)
            {
                $media->setIsMain(1);
            }

            $media->save();


            //Save file
            if($type == MediaPeer::IMAGE)
            {
                // resize image
                $image = new sfThumbnail(800, 800);
                $image->loadFile($file['tmp_name']);
                //$image->save(sfConfig::get('sf_upload_dir')."/$parentId/".$file['name'], 'image/jpeg');
                $image->save(sfConfig::get('sf_upload_dir')."/".$media->getId().".".$media->getExt());

                // create thunmbnail
                $imageTh = new sfThumbnail(80, 80);
                $imageTh->loadFile($file['tmp_name']);
                $imageTh->save(sfConfig::get('sf_upload_dir')."/th_".$media->getId().".".$media->getExt());
            }
        }
        
    }
    
} // MediaPeer
