<div id='pleft'>
<?php
  echo "<img src='".$mainf['image']."' border='0' align='left'/>\n";
  echo "<h2>".$mainf['name']."</h2>\n";
  echo "<p>".$mainf['shortdesc'] . "<br/>\n";
  echo anchor('welcome/product/'.$mainf['id'],'see details') . "<br/>\n";
  echo anchor('welcome/cart/'.$mainf['id'],'add to cart') . "</p>\n";
?>
</div>

<div id='pright'>
<?php
  foreach ($sidef as $key => $list){
    echo "<img src='".$list['thumbnail']."' border='0' class='thumbnail'/>\n";
    echo "<h4>".$list['name']."</h4>\n";
    echo anchor('welcome/product/'.$list['id'],'see details') . "<br/>\n";
    echo anchor('welcome/cart/'.$list['id'],'add to cart') . "\n";
  }
?>
</div>