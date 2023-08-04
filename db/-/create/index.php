<?php
$key = "";

  echo "<pre>
          &#60;div class=\"card\"&#62;
            &#60;div class=\"card-header\"&#62;
              &#60;h5 class=\"card-title\"&#62;Data ".ucwords(str_replace('_',' ',$table_name))."&#60;/h5&#62;
            &#60;/div&#62;
            &#60;div class=\"card-body\"&#62;
              &#60;a href=\"&#60;?= base_url('$table_name/add_data');?&#62;\" class=\"btn btn-info\"&#62;
                &#60;i class=\"fa fa-plus-circle\"&#62;&#60;/i&#62;&nbsp;&nbsp;Tambah Data
              &#60;/a&#62;
              &#60;div class=\"table-responsive\"&#62;
                &#60;table class=\"table\" id=\"x-data-tables\" style=\"width:100%\"&#62;
                  &#60;thead class=\"text-info\"&#62;";
                    
                  foreach($data as $d){
                    echo "
                    &#60;th&#62;".
                    ucwords(str_replace('_',' ',$d->Field)).
                    "&#60;/th&#62;";
                  }
                  
                  echo "
                    &#60;th class=\"text-right\"&#62;Action&#60;/th&#62
                  &#60;/thead&#62;
                  ";
                  
                  echo "
                  &#60;tbody&#62;
                    &#60;?php foreach(&#36;data as &#36;d){ ?&#62;
                      &#60;tr&#62;";

                      foreach($data as $d){
                        if($d->Key == "PRI"){
                          $key = $d->Field;
                        }
                        echo "
                        &#60;td&#62;&#60;?= &#36;d-&#62;".
                        $d->Field.
                        ";?&#62;&#60;/td&#62;";
                      }

                  echo "
                        &#60;td&#62;
                          &#60;a class=\"btn btn-info\" href=\"&#60;?= base_url(\"$table_name/update_data/&#36;d-&#62;$key\");?&#62;\"&#62;
                            &#60;i class=\"fa fa-edit\"&#62;&#60;/i&#62;
                          &#60;/a&#62;
                          &#60;a class=\"btn btn-danger\" href=\"&#60;?= base_url(\"$table_name/do_delete/&#36;d-&#62;$key\");?&#62;\"&#62;
                            &#60;i class=\"fa fa-trash\"&#62;&#60;/i&#62;
                          &#60;/a&#62;
                        &#60;/td&#62;
                      &#60;/tr&#62;
                    &#60;?php }?&#62;
                  &#60;/tbody&#62;
                &#60;/table&#62;
              &#60;/div&#62;
            &#60;/div&#62;
          &#60;/div&#62;
                  </pre>";

?>