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
				//alert(ui.item.id);                                
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
                    
                
                //tooltip
                $( "#config-list-tbl" ).tooltip();
                    
});
</script>

<h1>Configurations</h1>

<?php echo link_to(image_tag('add-icon.png'), 'config/newconfig', array('title'=>'Add new Config')) ?>

<form action="<?php echo url_for('config/index') ?>" method="get">
    <div class="div-form">
    <div class="div-form-item-float">
        <label>Brand</label>
        <?php echo select_tag('brand', objects_for_select($brands, 'getId', 'getBrandName', $selectedBrand, array('include_blank'=>true)), array('onchange'=>'brandChange()')) ?>
    </div>
        
    <div class="div-form-item-float">
        <label>Series</label>
        <?php echo input_tag('series', $selectedSeries) ?>
        
    </div>
        
    <div class="div-form-item-float">
        <label>Model</label>
        <?php echo input_tag('model', $selectedModel) ?>
        
    </div>
    
    <div class="div-form-item-float">
        <label>&nbsp;</label>
        <input type="submit" value="Filter"></input>        
    </div>
    
    </div>
</form>

<div style="clear: both">
<?php echo $pager->getNbResults() ?> results found.<br />
Displaying results <?php echo $pager->getFirstIndice() ?> to  <?php echo $pager->getLastIndice() ?>.
</div>

<table style="width: 100%" id="config-list-tbl">
  <thead>
    <tr>
      <th>Brand</th>  
      <th>Series</th>  
      <th>Model</th>
      <th>Configuration</th>
      
      <?php /*foreach($configFieldCategories as $configFieldCategory): ?>
      <th>
          <?php echo $configFieldCategory->getName() ?>          
      </th>
      <?php endforeach;*/ ?>
      <th>Edit</th>
      <th>Delete</th> 
      </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $Config): ?>
    <tr>
      <td><?php echo $Config->getModel()->getSeries()->getBrand()->getBrandName() ?></td>
      <td><?php echo $Config->getModel()->getSeries()->getSeriesName() ?></td>
      <td><?php echo $Config->getModel()->getModelName() ?></td>
      <td><?php echo $Config->makeConfigName() ?></td>
      
      <?php /*foreach($configFieldCategories as $configFieldCategory): ?>
      <td>
        <?php echo $Config->getConfigFieldCategoryValue($configFieldCategory) ?>
      </td>
      <?php endforeach;*/ ?>
      <td style="text-align: center;"><?php echo link_to(image_tag('edit-document.png', array('style'=>'border:none;')), 'config/editconfig?id='.$Config->getId(), array()) ?></td>
      <td style="text-align: center;"><?php echo link_to(image_tag('delete-icon.png', array('style'=>'border:none;')), 'config/delete?id='.$Config->getId(), array('confirm'=>'Are you sure?')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- pager -->

<?php
//make query string
$queryString = '';
$queryString .= '&brand='.$selectedBrand;
$queryString .= '&series='.$selectedSeries;
$queryString .= '&model='.$selectedModel;
?>

<?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to('&laquo;', 'config/index?page='.$pager->getFirstPage().$queryString) ?>
  <?php echo link_to('&lt;', 'config/index?page='.$pager->getPreviousPage().$queryString) ?>
  <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'config/index?page='.$page.$queryString) ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'config/index?page='.$pager->getNextPage().$queryString) ?>
  <?php echo link_to('&raquo;', 'config/index?page='.$pager->getLastPage().$queryString) ?>
<?php endif ?>
