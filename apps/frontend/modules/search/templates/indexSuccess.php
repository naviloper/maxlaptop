<script>
    
$('document').ready(function(){
    $(function() {
            $( "#tabs" ).tabs();
    });


    $("#search-btn").click(function(){
        var queryString = $("#search-form").serialize();
        
        $.ajax({
          type: "POST",
          url: "<?php echo url_for('search/dosearch') ?>",
          data: queryString,
          success: function(data) {
            
          }
        });
    });
});	
        
</script>


<div id="search-tabs">
    <form id="search-form">
    <div id="tabs">
	<ul>
		<?php foreach($tabs as $key=>$tab): ?>
                    <li><a href="<?php echo '#tabs-'.$key ?>"><?php echo $tab['title'] ?></a></li>
                <?php endforeach; ?>
	</ul>
        <?php foreach($tabs as $key=>$tab): ?>
            <div id="<?php echo 'tabs-'.$key ?>">
                <p><?php echo html_entity_decode($tab['content']) ?></p>
            </div>
        <?php endforeach; ?>
		
    </div>
        
        <input type="button" value="جستجو" id="search-btn"></input>
        
    </form>  
    
    
</div>

<div id="search-results">
    
</div>