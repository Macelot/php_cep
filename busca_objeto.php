<?php
$arquivo =  fopen('ceps.txt','r');
if(isset($_POST['cep_'])){
    $cep = $_POST['cep_'];
    while(! feof($arquivo)){
        $linha = fgets($arquivo);
        $dados = explode("\t",$linha);
        if($dados[0] == $cep ){
            // 98290000
            if(count($dados)>=4){
                $cid_est = explode("/",$dados[1]);
                $cidade=$cid_est[0];
                $estado=$cid_est[1];
                $bairro=$dados[2];
                $rua=$dados[3];
                $resp = array(
                    "status"=>"ok",
                    "Cidade"=>$cidade,
                    "Estado"=>$estado,       
                    "Bairro"=>$bairro,       
                    "Rua"=>$rua,
                    "Ibge"=>""    
                );
                echo json_encode($resp);
            }
            exit();
        }
    }
    $resp = array(
        "status"=>"0",
        "Cidade"=>"",
        "Estado"=>"",       
        "Bairro"=>"",       
        "Rua"=>"",
        "Ibge"=>""    
    );
    echo json_encode($resp);
}else{
    $resp = array(
        "status"=>"0",
        "Cidade"=>"",
        "Estado"=>"",       
        "Bairro"=>"",       
        "Rua"=>"",
        "Ibge"=>""    
    );
    echo json_encode($resp);
}

?>