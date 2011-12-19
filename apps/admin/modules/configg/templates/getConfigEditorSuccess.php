<?php
//print_r($values, FALSE);
foreach($cats as $c):
    $fields = $c->getFields();
    echo "<table><tr><th colspan='2'>".$c->getName()."</th></tr>";
    foreach ($fields as $f)
        echo "<tr><td>".$f->getName()."</td>".
                "<td><input type='text' id='".$f->getId()."' value='".$values[$f->getId()]."' /> ".
                $f->getHtmlComment()."</td></tr>";
    echo "</table>";
endforeach;
?>
