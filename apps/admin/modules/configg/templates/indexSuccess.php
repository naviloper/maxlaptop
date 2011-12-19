<?php use_helper('JavascriptBase') ?>
<?php use_stylesheet('configg') ?>
<div id="lists">
<div id='brands' class="box1">
<h3>Brands:</h3>
<ul class="brand">
<?php
$delete_permission = true;
foreach($brands as $brand):
    echo "<li id='".$brand->getId()."'>".$brand->getBrandName().
        (($delete_permission)?"<a class='del' id='".$brand->getId()."' href='#'>".image_tag('del.png')."</a>":"").
        "</li>";
endforeach;
?>
</ul>
<form id="brand-form"><input id="brand_name" type="text" size="14" /><input type="submit" value="+" /></form>
</div>
<div id='series' class="box1"><h3>Series:</h3><ul class="series"></ul>
<form id="series-form"><input id="series_name" type="text" size="14" /><input type="submit" value="+" /></form>
</div>
<div id='models' class="box1"><h3>Models:</h3><ul class="model"></ul>
<form id="model-form"><input id="model_name" type="text" size="14" /><input type="submit" value="+" /></form>
</div>
<div id='configs' class="box2"><h3>Configs:</h3><ul class="config"></ul>
</div>

<div style="clear: both"></div>
<form id="editor-form">
<div id="config-editor" class="box3">
    
</div>
<input type="submit" value="Save" />
<input type="reset" value="Clear" />
</form>

</div>
<script type="text/javascript">
    ////////////// CLICK EVENTS \\\\\\\\\\\\\\\
    $('#brands li').click(function(){
        var bid = $(this).attr('id');
        $('#brands li').removeClass('sel');
        $(this).addClass('sel');
        $('#series ul').html('<?php echo image_tag('ajax-loader-kit.gif', array('class'=>'gif-loader')) ?>');
        $('#models ul').html('');
        $('#configs ul').html('');
        $('#config-editor').html('');
        $.ajax({
            url: "<?php echo url_for('configg/getSeries') ?>",
            dataType: "html",
            data: {
                brand_id: bid
            },
            success: function(response) {
                $('#series ul').html(response);
            }
        });
    });
    
    $('#lists').delegate('#series li', 'click', function(){
        var sid = $(this).attr('id');
        $('#series li').removeClass('sel');
        $(this).addClass('sel');
        $('#models ul').html('<?php echo image_tag('ajax-loader-kit.gif', array('class'=>'gif-loader')) ?>');
        $('#configs ul').html('');
        $('#config-editor').html('');
        $.ajax({
            url: "<?php echo url_for('configg/getModels') ?>",
            dataType: "html",
            data: {
                series_id: sid
            },
            success: function(response) {
                $('#models ul').html(response);
            }
        });
    });

    $('#lists').delegate('#models li', 'click', function(){
        var mid = $(this).attr('id');
        $('#models li').removeClass('sel');
        $(this).addClass('sel');
        $('#configs ul').html('<?php echo image_tag('ajax-loader-kit.gif', array('class'=>'gif-loader')) ?>');
        $('#config-editor').html('');
        $.ajax({
            url: "<?php echo url_for('configg/getConfigs') ?>",
            dataType: "html",
            data: {
                model_id: mid
            },
            async: false,
            success: function(response) {
                $('#configs ul').html(response);
            }
        });        
    });
    
    $('#lists').delegate('#configs li', 'click', function(){
        var cid = $(this).attr('id');
        $('#configs li').removeClass('sel');
        $(this).addClass('sel');
        $('#config-editor').html('<?php echo image_tag('ajax-loader-kit.gif', array('class'=>'gif-loader')) ?>');
        $.ajax({
            url: "<?php echo url_for('configg/getConfigEditor') ?>",
            dataType: "html",
            data: {
                config_id: cid
            },
            success: function(response) {
                $('#config-editor').html(response);
            }
        });        
    });
    
    /////////////// ADD FORMS \\\\\\\\\\\\\
    $('#brand-form').submit(function(event){
        event.preventDefault();
        if($('#brand_name').val()==""){
            alert("Insert a name for the new brand.");
            return;
        }
        $.ajax({
            url: "<?php echo url_for('configg/addBrand') ?>",
            dataType: "html",
            data: {
                brand_name: $('#brand_name').val()
            },
            async: false,
            success: function(response) {
                //alert(response);
                location.reload();
            }
        });
    });
    
    $('#series-form').submit(function(event){
        event.preventDefault();
         if($('#series_name').val()==""){
            alert("Insert a name for the new series.");
            return;
        }
        $.ajax({
            url: "<?php echo url_for('configg/addSeries') ?>",
            dataType: "html",
            data: {
                series_name: $('#series_name').val(),
                brand_id:    $('#brands .sel').first().attr('id')
            },
            success: function(response) {
                //alert(response);
                $('#brands .sel').first().click();
                $('#series_name').val('');
            }
        });
   });

    $('#model-form').submit(function(event){
        event.preventDefault();
        if($('#model_name').val()==""){
            alert("Insert a name for the new model.");
            return;
        }
        $.ajax({
            url: "<?php echo url_for('configg/addModel') ?>",
            dataType: "html",
            data: {
                model_name: $('#model_name').val(),
                series_id:  $('#series .sel').first().attr('id')
            },
            success: function(response) {
                //alert(response);
                $('#series .sel').first().click();
                $('#model_name').val('');
            }
        });
    });

    ///////////// Config Editor Form \\\\\\\\\\\\\\\\\
    $('#editor-form').submit(function(event){
        event.preventDefault();
        var cid = $("#configs .sel").first().attr('id');
        var inputs = $('#editor-form :input[type=text]');
        var dataStr = "cid="+cid+"&";
        dataStr += "mid="+$("#models .sel").first().attr('id')+"&";
        $(inputs).each(function(event){
           dataStr += $(this).attr('id')+"="+$(this).val()+"&";
        });
        //alert(dataStr);
        $.ajax({
            url: "<?php echo url_for('configg/processConfigForm') ?>",
            dataType: "html",
            data: dataStr,
            success: function(response) {
                $('#models .sel').first().click();
                $('#configs li[id='+response+']').first().click();
                //alert(response);
            }
        });
    });
    
    ///////////// Delete Buttons \\\\\\\\\\\\\\\\\
    $('#lists').delegate('.del', 'click', function(event){
        event.preventDefault();
        var id1 = $(this).attr('id');
        var type1 = $(this).parents("ul").first().attr('class');
        if(confirm("Are you sure?")){
            $.ajax({    
                url: "<?php echo url_for('configg/delete') ?>",
                dataType: "html",
                async: false,
                data: {type: type1, id: id1 },
                success: function(response) {
                    if(response!="OK") alert(response);
                    else{
                        if(type1=='brand') location.reload();
                        if(type1=='series') $('#brands .sel').first().click();
                        if(type1=='model') $('#series .sel').first().click();
                        if(type1=='config') $('#models .sel').first().click();                        
                    }
                }
            });

        }
    });
    
    ///////////// Auto Complete \\\\\\\\\\\\\\\\\\
    $("#lists").delegate("#config-editor",'click',function(){
        $(this).find(":input[type=text]").each( function(){
        var field = $(this);
        $(this).autocomplete({
        source: function( request, response ) {
                $.ajax({
                    url: "<?php echo url_for('configg/getFieldValues') ?>",
                        dataType: "json",
                        data: {
                            field_id:   $(field).attr('id'),
                            query:      $(field).val()
                        },
                        success: function( data ) {
                            response( $.map( data.values, function( item ) {
                                return {
                                    label: item.value,
                                    value: item.value,
                                    id: item.id
                                }
                             }));
                        }
                });
        },
        minLength: 0,
        select: function( event, ui ) {
                //loadModelImages(ui.item.id);
        },
        open: function() {

        },
        close: function() {

        },
        change: function(event, ui)
        {

        }
        });
    });
  });
</script>
