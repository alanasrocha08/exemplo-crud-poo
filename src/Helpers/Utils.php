<?php
namespace ExemploCrud\Helpers;

use Throwable;

final class Utils {
    /*Usando construtor privado e vazio bloqueamos a criação de objeto */
    private function __construct(){ }

    public static function dump($dados):void {
        echo "<pre>";
        var_dump($dados);
        "</pre>";
    }

    public static function formatarPreco(float $valor):string {
    return "R$ ".number_format($valor, 2, ",", "." );
}
}