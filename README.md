# Prova Técnica – Desenvolvedor(a) Backend Júnior (PHP/MySQL/Git)

## Como rodar o projeto localmente

1. Clone o repositório:
   ```bash
   git clone https://github.com/Matheus-Cezarr/backend-junior-php-crud.git
   ```
2. Crie o banco de dados MySQL:
   - Exemplo:
     ```sql
     CREATE DATABASE backend_junior;
     ```
   - Execute o script `sql/create_clientes.sql` para criar a tabela.
3. Configure os dados de acesso ao MySQL em `src/db.php`.
4. Execute localmente com PHP embutido:
   ```bash
   php -S localhost:8080 -t public/
   ```
5. Acesse [http://localhost:8080](http://localhost:8080) para usar o CRUD.

---

## Exercícios Rápidos

### 1. PHP – Função de Validação de Documento

Veja em `src/validarDocumento.php`:

```php
function validarDocumento($doc) {
    if (strlen($doc) > 20) return false;
    $qtdNumeros = preg_match_all('/\d/', $doc);
    if ($qtdNumeros < 2) return false;
    return true;
}
```
Exemplos:
- `validarDocumento("ABC123"); // true`
- `validarDocumento("ABCDEFG"); // false`
- `validarDocumento("123456789012345678901"); // false`

### 2. MySQL – Query de Análise

Veja em `sql/top_clientes.sql`:

```sql
SELECT id_cliente, SUM(valor_total) AS total_gasto
FROM pedidos
WHERE data_compra >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
GROUP BY id_cliente
ORDER BY total_gasto DESC
LIMIT 5;
```

### 3. Git – Controle de Versão

**Como criar uma branch chamada feature/ajuste-bug a partir da branch develop?**
```bash
git checkout develop
git checkout -b feature/ajuste-bug
```

**Como desfazer o último commit sem perder o código?**
```bash
git reset --soft HEAD~1
```

**Como fazer rollback caso já tenha feito git push origin main de um commit errado?**
1. Volte localmente para o commit correto:
   ```bash
   git log  # copie o hash do commit desejado
   git reset --hard <hash-do-commit-correto>
   ```
2. Force o push para o remoto:
   ```bash
   git push origin main --force
   ```

---

## Mini Projeto – CRUD de Clientes

CRUD completo usando PHP puro e MySQL.

- Listar, adicionar, editar e excluir clientes.
- Interface simples em HTML.
- Uso de PDO e prepared statements.
- Código organizado por responsabilidade.

- Iniciar o servidor PHP do mini projeto

   ```bash
   php -S localhost:8000 -t public
   ```
---

## Como rodar os testes

Testes unitários para a função de validação em `tests/ValidarDocumentoTest.php`:
```bash
php tests/ValidarDocumentoTest.php
```

---

## Extras/diferenciais

- Código limpo e organizado.
- Uso de PDO (prepared statements).
- Teste unitário da função de validação.
- Scripts SQL inclusos.
- Respostas dos exercícios no README.

---

## Estrutura de Pastas

```
public/
    index.php
src/
    Cliente.php
    db.php
    validarDocumento.php
sql/
    create_clientes.sql
    top_clientes.sql
tests/
    ValidarDocumentoTest.php
README.md
```
