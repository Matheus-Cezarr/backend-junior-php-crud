<?php
/**
 * Valida um documento conforme regras da prova técnica.
 * - Aceita até 20 caracteres
 * - Deve conter pelo menos 2 números
 * - Retorna false caso não cumpra os requisitos
 */

function validarDocumento($doc) {
    if (strlen($doc) > 20) return false;
    $qtdNumeros = preg_match_all('/\d/', $doc);
    if ($qtdNumeros < 2) return false;
    return true;
}

// Exemplos de uso:
// var_dump(validarDocumento("ABC123")); // true
// var_dump(validarDocumento("ABCDEFG")); // false
// var_dump(validarDocumento("123456789012345678901")); // false