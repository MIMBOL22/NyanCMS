<?php 
if($config['system']['debug']){
    echo("<script>console.log('DEBUG-MODE{');</script>");
    foreach($debug as $k => $v){
        if(is_array($v)){
            echo("<script>console.log('".$k."',".json_encode($v).");</script>");
        }else{
            echo("<script>console.log('".$k."','".$v."');</script>");
        }

        
    }
    echo("<script>console.log('}');</script>");
}
?>
</body>