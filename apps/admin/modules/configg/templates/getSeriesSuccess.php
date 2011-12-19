<?php
$delete_permission = true;
foreach($series as $s):
    echo "<li id='".$s->getId()."'>".$s->getSeriesName().
        (($delete_permission)?"<a class='del' id='".$s->getId()."' href='#'>".image_tag('del.png')."</a>":"").
        "</li>";
endforeach;
?>
