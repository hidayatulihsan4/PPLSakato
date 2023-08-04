<?php 
$key = '';
foreach($data as $d){
  if($d->Key == "PRI"){
    $key = $d->Field;
  }
}

echo "<pre>
&#60;div class=\"card\"&#62;
  &#60;div class=\"card-header\"&#62;
    &#60;h5 class=\"card-title\"&#62;Edit Data ".ucwords(str_replace('_',' ',$table_name))."&#60;/h5&#62;
  &#60;/div&#62;
  &#60;div class=\"card-body\"&#62;
    &#60;a href=\"&#60;?= base_url('$table_name');?&#62;\" class=\"btn btn-info\"&#62;
      &#60;i class=\"fa fa-arrow-left\"&#62;&#60;/i&#62;&nbsp;&nbsp;Kembali
    &#60;/a&#62;
    &#60;form method=\"post\" action=\"&#60;?= base_url().'$table_name/do_update/'.&#36data-&#62;$key; ?&#62;\"&#62;
      &#60;div class=\"row\"&#62;
      ";

      foreach($data as $d){
        if($d->Extra != "auto_increment"){
          if($d->Key == "MUL"){
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;select data-opt=\"&#60?= &#36data-&#62$d->Field;?&#62;\"class=\"form-control\" name=\"$d->Field\" id=\"$d->Field\"&#62;
              &#60;?php foreach(&#36;opt_$d->Field as &#36;o){?&#62;
                &#60;option value=\"&#60;?= &#36;o-&#62;$d->Field; ?&#62;\" &#62;&#60;?= &#36;o-&#62;$d->Field; ?&#62;&#60;/option&#62;
              &#60;?php } ?&#62;
            &#60;/select&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }else if($d->Type == "Text"){
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;textarea name=\"$d->Field\" id=\"$d->Field\" rows=\"4\" cols=\"50\" class=\"form-control\" placeholder=\"$d->Field\" &#62;&#60;/textarea&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }else if($d->Type == "int(10)"){
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;input value=\"&#60;?= &#36;data-&#62;$d->Field;?&#62;\" name=\"$d->Field\" id=\"$d->Field\" type=\"number\" class=\"form-control\" placeholder=\"$d->Field\"&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }else if($d->Type == "date"){
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;input value=\"&#60;?= &#36;data-&#62;$d->Field;?&#62;\" name=\"$d->Field\" id=\"$d->Field\" type=\"date\" class=\"form-control\" placeholder=\"$d->Field\"&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }else if(substr($d->Field,0,4) == "telp"){
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;input value=\"&#60;?= &#36;data-&#62;$d->Field;?&#62;\" name=\"$d->Field\" id=\"$d->Field\" type=\"tel\" class=\"form-control\" placeholder=\"$d->Field\"&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }else if($d->Type == "enum('L','P')"){
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;select data-opt=\"&#60?= &#36data-&#62$d->Field;?&#62;\"class=\"form-control\" name=\"$d->Field\" id=\"$d->Field\"&#62;
              &#60;option value=\"L\" &#62;L&#60;/option&#62;
              &#60;option value=\"P\" &#62;P&#60;/option&#62;
            &#60;/select&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }else{
            echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;label&#62;".ucwords(str_replace('_',' ',$d->Field))."&#60;/label&#62;
            &#60;input value=\"&#60;?= &#36;data-&#62;$d->Field;?&#62;\" name=\"$d->Field\" id=\"$d->Field\" type=\"text\" class=\"form-control\" placeholder=\"$d->Field\"&#62;
          &#60;/div&#62;
        &#60;/div&#62;
        ";
          }
        }
      }
echo "
        &#60;div class=\"col-md-12\"&#62;
          &#60;div class=\"form-group\"&#62;
            &#60;button type=\"submit\" class=\"btn btn-info\"&#62;Update&#60;/button&#62;
            &#60;button type=\"reset\" class=\"btn btn-danger\"&#62;Reset&#60;/button&#62;
          &#60;/div&#62;
        &#60;/div&#62;

      &#60;/div&#62;
    &#60;/form&#62;
  &#60;/div&#62;
&#60;/div&#62;
</pre>";


?>