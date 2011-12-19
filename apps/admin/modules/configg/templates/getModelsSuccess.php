<?php
$delete_permission = true;
foreach($models as $m):
    echo "<li id='".$m->getId()."'>".$m->getModelName().
        (($delete_permission)?"<a class='del' id='".$m->getId()."' href='#'>".image_tag('del.png')."</a>":"").
        "</li>";
endforeach;
?>
