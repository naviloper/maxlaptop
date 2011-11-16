<?php use_helper('Form') ?>
<?php use_helper('Object') ?>
<?php use_helper('JavascriptBase') ?>          

<div class="main-image">
                <label>Main Image</label>
                <?php if ($media = MediaPeer::getMainImage($model->getId(), 'Model')): ?>
                    <div class="edit-media-item">
                        <?php echo image_tag(public_path('uploads/th_'.$media->getId().'.'.$media->getExt()), array()) ?>
                        <div><?php echo link_to('Delete', 'media/delete?id='.$media->getId().'&parent='.$model->getId()) ?></div>
                    </div>
                <?php else: ?>
                    <?php echo input_file_tag('main_image', array()) ?>
                <?php endif; ?>                
            </div>            
            
            <div class="other-image">
                <fieldset style="width: 360px;">
                    <legend>Other Images</legend>
                    <?php $medias = MediaPeer::getOtherImages($model->getId(), 'Model') ?>
                    <?php foreach ($medias as $media): ?>
                        <div class="edit-media-item">
                            <?php echo image_tag(public_path('uploads/th_'.$media->getId().'.'.$media->getExt()), array()) ?>
                            <div><?php echo link_to('Delete', 'media/delete?id='.$media->getId().'&parent='.$model->getId()) ?></div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div id="add-other-images">
                        <div><input type="file" name="other_images[0]" ></input></div>                        
                    </div>
                    <div style="margin-top: 20px;"><?php echo link_to_function('Add new image', 'addNewImage()') ?></div>
                    
                </fieldset>                
            </div>