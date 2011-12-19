<?php
$delete_permission = true;
foreach($configs as $c):
    echo "<li id='".$c->getId()."'>".$c->makeConfigName().
       (($delete_permission)?"<a class='del' id='".$c->getId()."' href='#'>".image_tag('del.png')."</a>":"").
       "</li>";
endforeach;
?>
<li id="-1">New Config:</li>