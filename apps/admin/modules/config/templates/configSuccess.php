
<?php use_helper('Form') ?>
<?php use_helper('Object') ?>
<?php use_helper('JavascriptBase') ?>

<script>

    
var targetField;
var otherImageIndex = 0;
    
function brandChange()
{
    var selectedBrand = $("#brand option:selected").val();
    
    $("#series").val('');
    $("#model").val('');
}

function addNewImage()
{
    otherImageIndex++;
    
    var str = "<div><input type=\"file\" name=\"other_images["+otherImageIndex.toString()+"]\" ></input></div>";
    
    $("#add-other-images").append(str);
}

function saveAndNew()
{
    $('#save_and_new').val('true');
}


function loadModelImages(modelId)
{
    $('#model-images').slideUp(500, function(){
        $.ajax({
                url: "<?php echo url_for('config/getmodelimages') ?>",
		dataType: "html",
		data: {
                    model_id: modelId                    
		},
		success: function( data ) {
                    $('#model-images').html(data);
                    $('#model-images').slideDown(500, function(){})
                }
				});
    });
}

$(function() {
                var selectedBrand = $("#brand option:selected").val();
                
		//series autocomplete
		$( "#series" ).autocomplete({
                        
                        source: function( request, response ) {
				$.ajax({
                                    url: "<?php echo url_for('config/getseries') ?>",
					dataType: "json",
					data: {
						brand: $("#brand option:selected").val(),
                                                query: request.term
					},
					success: function( data ) {
                                            response( $.map( data.series, function( item ) {
							return {
								label: item.name,
								value: item.name,
                                                                id: item.id
							}
                                             }));
					}
				});
			},
			minLength: 0,
			select: function( event, ui ) {
				//alert(ui.item.id);
			},
			open: function() {
				
			},
			close: function() {
				
			},                        
                        change: function(event, ui)
                        {
                            $("#model").val('');
                        }
                    });
                    
                    
                    
                    
                //model autocomplete
		$( "#model" ).autocomplete({
                    
                        source: function( request, response ) {
				$.ajax({
                                    url: "<?php echo url_for('config/getmodels') ?>",
					dataType: "json",
					data: {
						series: $("#series").val(),
                                                query: request.term
					},
					success: function( data ) {
                                            response( $.map( data.models, function( item ) {
							return {
								label: item.name,
								value: item.name,
                                                                id: item.id
							}
                                             }));
					}
				});
			},
			minLength: 0,
			select: function( event, ui ) {
				loadModelImages(ui.item.id);                                
			},
			open: function() {
				
			},
			close: function() {
				
			}
                    });
                    
                
                //fields autocomplete
                $('.dynamic-fields').focus(function(){			
			targetField = $(this).attr("id");						
                });                    
                    
                $('.dynamic-fields').autocomplete({
                    
                        source: function( request, response ) {
                                //alert(targetField);
                                $.ajax({
                                    url: "<?php echo url_for('config/getconfigs') ?>",
					dataType: "json",
					data: {
						field: targetField,
                                                query: request.term                                                
					},
					success: function( data ) {
                                            response( $.map( data.values, function( item ) {
							return {
								label: item.name,
								value: item.name,
                                                                id: item.id
							}
                                             }));
					}
				});
			},
			minLength: 0,
			select: function( event, ui ) {
				//alert(ui.item.id);
			},
			open: function() {
                            
			},
			close: function() {
				
			}
                    });
                    
});
</script>

<form action="<?php echo url_for('config/saveconfig') ?>" method="post" enctype="multipart/form-data">
    <div class="div-form">
        
        <?php if ($isNew): ?>
            <h1>Add new laptop configuration</h1>
            <?php echo input_hidden_tag('is_new', 'true') ?>
        <?php else: ?>
            <h1>Edit configuration</h1>
        <?php endif; ?>
        
        <div class="div-form-item-float">
            <label>Brand</label>
            <?php echo select_tag('brand', objects_for_select($brands, 'getId', 'getBrandName', $selectedBrand, array()), array('onchange'=>'brandChange()')) ?>
        </div>
        
        <div class="div-form-item-float">
            <label>Series</label>
            <?php echo input_tag('series', $series->getSeriesName()) ?>
            <?php //echo button_to_function('+', 'addNewSeries', array('class'=>'add-button')) ?>
        </div>
        
        <div class="div-form-item-float">
            <label>Model</label>
            <?php echo input_tag('model', $model->getModelName()) ?>
            <?php //echo button_to_function('+', 'addNewModel', array('class'=>'add-button')) ?>
        </div>
        
            
        <!--<div class="div-form-item-float">
            <label>Configure name</label>    
            <?php //echo input_tag('name', $config->getConfigName()) ?>            
        </div>-->
        <?php echo input_hidden_tag('config_id', $configId) ?>
        
        <?php if (!$isNew): ?>
            <div class="configs-list">
            <div>Available configurations for this model</div>
            
            <div>
                <ul id="config-list-ul">
                <?php foreach ($configs as $configList): ?>
                    <?php if ($configList->getId() == $config->getId()): ?>
                        <li class="li-selected"><strong><?php echo $configList->makeConfigName() ?></strong></li>
                    <?php else: ?>
                        <li><?php echo link_to($configList->makeConfigName(), 'config/editconfig?id='.$configList->getId()) ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </div>
            
            </div>
        <?php endif; ?>
            
            
        
                
       
        
        <div class="config-fields">
        <h2>Configurations</h2>
        
        <?php foreach($configFieldCategories as $configFieldCategory): ?>
        <fieldset>
            <legend><?php echo $configFieldCategory->getName() ?></legend>
            <?php
            $c = new Criteria();
            $c->add(ConfigFieldPeer::CATEGORY_ID, $configFieldCategory->getId());
            $c->addDescendingOrderByColumn(ConfigFieldPeer::WEIGTH);
            
            $configFields = ConfigFieldPeer::doSelect($c);
            ?>
            
            <?php foreach ($configFields as $field): ?>            
            <div>
                <label><?php echo $field->getName() ?></label>
                <?php if ($isNew): ?>
                    <input type="text" name="<?php echo 'field_'.$field->getId() ?>" id="<?php echo 'field_'.$field->getId() ?>" class="dynamic-fields" value=""></input> <span><?php echo $field->getHtmlComment() ?></span>
                <?php else: ?>
                    <input type="text" name="<?php echo 'field_'.$field->getId() ?>" id="<?php echo 'field_'.$field->getId() ?>" class="dynamic-fields" value="<?php echo FieldValuePeer::getFieldValue($field->getId(), $config->getId())->getValue() ?>"></input> <span><?php echo $field->getHtmlComment() ?></span>
                <?php endif; ?>                
            </div>
            <?php endforeach; ?>
            
        </fieldset>
        <?php endforeach; ?>
        
        </div>
        
        <div class="config-fields">    
        <!-- Image section start -->
        <h2>Available images for this model</h2>
        <fieldset>
            <legend>Images</legend>
            
            <div id="model-images">
            <div class="main-image">
                <label>Main Image</label>
                <?php if ($media = MediaPeer::getMainImage($model->getId(), 'Model')): ?>
                    <div class="edit-media-item">
                        <?php echo image_tag(public_path('uploads/th_'.$media->getId().'.'.$media->getExt()), array()) ?>
                        <div><?php echo link_to('Delete', 'media/delete?id='.$media->getId().'&parent='.$config->getId(), array('confirm'=>'Are you sure?')) ?></div>
                    </div>
                <?php else: ?>
                    <?php echo input_file_tag('main_image', array()) ?>
                <?php endif; ?>                
            </div>            
            
            <div class="other-image">
                <fieldset>
                    <legend>Other Images</legend>
                    <?php $medias = MediaPeer::getOtherImages($model->getId(), 'Model') ?>
                    <?php foreach ($medias as $media): ?>
                        <div class="edit-media-item">
                            <?php echo image_tag(public_path('uploads/th_'.$media->getId().'.'.$media->getExt()), array()) ?>
                            <div><?php echo link_to('Delete', 'media/delete?id='.$media->getId().'&parent='.$config->getId(), array('confirm'=>'Are you sure?')) ?></div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div id="add-other-images">
                        <div><input type="file" name="other_images[0]" ></input></div>                        
                    </div>
                    <div style="margin-top: 20px;"><?php echo link_to_function('Add new image', 'addNewImage()') ?></div>
                    
                </fieldset>                
            </div>
            </div>
            
        </fieldset>
        
        <!-- Image section end --> 
        </div>
    
    <div class="config-fields">
        <input type="submit" value="Save">
        <?php echo input_hidden_tag('save_and_new', 'false') ?>
        <input type="submit" value="Save and new" onclick="saveAndNew()">
        
        <?php if (!$isNew): ?>
            <?php echo button_to('Delete', 'config/delete?id='.$config->getId(), array('confirm'=>'Are you sure?')) ?>
        <?php endif; ?>
    </div>
        
</div>       
</form>

        
