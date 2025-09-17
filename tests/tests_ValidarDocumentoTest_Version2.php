<?php
require_once __DIR__ . '/../src/validarDocumento.php';

function testValidarDocumento() {
    assert(validarDocumento("ABC123") === true);
    assert(validarDocumento("ABCDEFG") === false);
    assert(validarDocumento("123456789012345678901") === false);
    assert(validarDocumento("A1B2") === true);
    assert(validarDocumento("A") === false);
    echo "Todos os testes passaram!\n";
}

testValidarDocumento();