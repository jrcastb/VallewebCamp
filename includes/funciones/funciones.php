<?php 
//pasar por referencia con & 
function productos_json(&$boletos, &$camisas = 0 , &$etiquetas = 0){
    //array con llaves creada para combinarla con el array de $boletos recibido
    $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');

    $total_boletos = array_combine($dias, $boletos);
    //transformar a formato json
    $json = array();

    foreach ($total_boletos as $key => $boletos): 
        if ((int) $boletos > 0) {
            $json[$key] = (int) $boletos;
        }
    endforeach;
    $camisas = (int) $camisas;
    if ($camisas > 0) {
        $json['camisas'] = $camisas;
    }
    $etiquetas = (int) $etiquetas;
    if ($etiquetas > 0) {
        $json['etiquetas'] = $etiquetas;
    }
    return json_encode($json);
}

function eventos_json(&$eventos){
    $eventos_json = array();
    foreach ($eventos as $evento) {
        $eventos_json['eventos'][] = $evento;//los corchetes vacios para que imprima el resto de información
    }

    return json_encode($eventos_json);
}

?>