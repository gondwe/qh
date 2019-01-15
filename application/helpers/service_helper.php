<?php 
function serve($view, $data=[]){$ci = &get_instance();
  $ci->load->view("section/header", $data);
  $ci->load->view($view,$data);
  $ci->load->view("section/footer");}
function beefSecurity(){ redirect("auth/logout"); }function pf($i){ echo "<pre>"; print_r($i); echo "</pre>"; }function notify($message){}

function this(){ return $CI = & get_instance(); }

function rxx($i){ return ucwords(strtolower(str_replace("_"," ",$i))); }

function get($sql){
    $raw = this()->db->query($sql)->result();
    
    $res = current($raw);
    $fields =  array_keys( (array) $res);
    
    if(count($fields) == 2){
        $first = current($fields);
        $last = end($fields);
        return (Object) array_combine(array_column($raw,$first),array_column($raw,$last));
    }
    
    return $raw;
    
}

function process($sql){ $db = this()->db; return $db->query($sql);  }  

function ajaxload($url,$mod)
{
    echo "
    <script>
    $(document).ready(function(){
        $.get('".base_url($url)."', function(response){
            // $('head').append('<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">');
            $('#".$mod."').html(response)
        })
    });
    </script>
    ";
}


function openDataTables(){
    echo '<link rel="stylesheet" href="'.base_url('assets/css/jquery-ui.css').'">';
    echo '<link rel="stylesheet" href="'.base_url('assets/css/dataTables.jqueryui.min.css').'">';
}

function closeDataTables($disp, $limit=25){
    ?>
        <script src="<?=base_url('assets/js/jquery.dataTables.min.js')?>"></script>
        <script>
        var disp = "<?=$disp?>"
        $(document).ready(function() { $("#example").DataTable({ 
            pageLength:<?=$limit?>,
            searching:disp == 0 ? false:true,
            paging:disp == 0 ? false:true,
            ordering:disp == 0 ? false:true,
        }); } ); 
        function dltr(url,id){ swaldel(url,id); }
        </script>
    <?php
}

function dataTableModals(){}


function linkTo($disp,$url){
  echo '<a class="btn btn-success btn-sm m-1" href="'.base_url($url).'" role="button">'.$disp.'</a>';
}


function printButton($div, $url, $view){
  echo '<p  data-div="'.$div.'" data-url="'.$url.'" data-view="'.$view.'" class="printer hide-print pull-right btn btn-info btn-sm" style="margin:3px">PRINT</p>';
}


function table(Array $tbody, $class=''){
  openDataTables();
  $th = array_shift($tbody);
    ?>
    <table class="<?=$class?>" style='width:98%; margin:5px  '>
      <thead style="background:#dcdcdc">
          <tr>
            <?php foreach ($th as $title):
                  echo "<th style='padding-left:3px'>{$title}</th>";
            endforeach;?>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($tbody as $tr):
                  echo "<tr>";
              foreach ($tr as $td) {
                  echo "<td style='padding-left:5px'>{$td}</td>";
              }
              echo "</tr>";
          endforeach;?>
      </tbody>
    </table>
<?php closeDataTables(0); }



function ucase($i){ return strtoupper($i); }

function activeModules($active, $modules, $base='config')
{
  ?>
    <div class="row">
    <?php foreach($modules as $mod){ ?>
        <a class="btn mt-2 mx-2 btn-sm <?=$mod == $active ? 'btn-primary' : 'btn-info' ?>"  href="<?=base_url($base.'/'.strtolower($mod)) ?>"><?=ucwords($mod)?></a>
    <?php } ?>
    </div>
  <?php 
}









function savefiles($t, $r){
    if(!empty($_FILES)){
        foreach($_FILES as $i=>$j){
            $p = save_pic($t,$i);
            if($p !== ""){
                $sql = "update $t set `$i` = '$p' where id = $r";
                process($sql); 
            }
        }
    }
}



function save_pic($table, $fldname, $type=1){

    $uploads = 'assets/img';
    $trailer = "";
    $files=$_FILES;

    $time = microtime(1)*10000;
    $name =$files[$fldname]['name'];
    if($name !== ''){
    
    $esx = explode(".",$name);
    $esx = end($esx);
    $extension = strtolower($esx);		
    $allowed = $type == 1 ? ['jpg','jpeg','png',] : ['jpg','jpeg','png','txt','doc','docx','ppt','pptx','xls','xlsx','accdb','mdb','pdf'];
    if(in_array($extension,$allowed)){		
    $location =$uploads."/".$table."/";
    if (!mkdir($location, 0777)) {$dh = opendir($location);closedir($dh);}		
    if(move_uploaded_file($files[$fldname]['tmp_name'],$location.$name))
    {   $trailer = $time.".".$extension;rename($location.$name, $location.$trailer);	}
    else{echo("Upload Fail! : ".$location.$name);}
    }else{ echo("Incorrect file format :.".$extension); }}
    return $trailer;
    
}

function rx($i){
    return ucwords(strtolower($i));
}

function swalify($msg,$action){
    $_SESSION['swal'] = [$msg,$action];
}


function swal($msg, $action){
    // <script src="/assets/js/jquery-3.3.1.min.js"></script>
    echo "
    <link rel='stylesheet' href='".base_url('assets/css/sweetalert.css')."'>
    <script src='".base_url('assets/js/jquery-3.3.1.min.js')."'></script>
    <script>$(document).ready(function(){ swal('".$action."', '".$msg."', '".$action."' ); }) </script> 
    <script src='".base_url('assets/js/sweetalert.js')."'></script>
    
    
    ";
}


function df($i){
    return date_format(new DateTime($i),"dS M Y");
}

function image($url,$tbl=null){
    $tbl = is_null($tbl)? null : $tbl."/";
    echo base_url("assets/img/$tbl".$url);
}

function publicProps($obj){

  $props = [];
  $reflection = new ReflectionObject($obj);
  $allProps = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
    foreach($allProps as $p){
      $props[] = $p->getName();
    }
  
  return $props;

}


function dashCard($title,$url,$count='-',$icon='user',$bg='aqua', $more="More Info",$moreicon='arrow-circle-right'){
  ?>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-<?=$bg?>">
        <div class="inner">
            <h3 style="opacity:.20;" ><?=$count?></h3>
            <a href="<?=base_url($url)?>" style="color: white">  <p> <?=$title?></p></a>
        </div>
        <div class="icon">
            <i class="fa fa-<?=$icon?>"></i>
        </div>
        <a href="<?=base_url($url)?>" class="small-box-footer"><?=$more?> <i class="fa fa-<?=$moreicon?>"></i></a>
    </div>
</div>
  <?php
}
