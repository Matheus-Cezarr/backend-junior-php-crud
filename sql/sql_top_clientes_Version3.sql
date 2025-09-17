-- Query para os 5 clientes que mais gastaram nos últimos 3 meses
SELECT id_cliente, SUM(valor_total) AS total_gasto
FROM pedidos
WHERE data_compra >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
GROUP BY id_cliente
ORDER BY total_gasto DESC
LIMIT 5;