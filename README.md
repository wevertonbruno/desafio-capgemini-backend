### Desafio Capgemini Backend

Neste repositório contém o código do backend da API REST que expõe serviços de uma conta corrente para o cliente. A API foi dividida em camadas para facilitar manutenção e testes de software. 

#### End-points

-GET / transactions : Lista de todas as transações realizada na conta
-GET / transactions/ammount : Saldo da conta
-POST / transactions/transfer : Endpoint responsável por simular um saque / transferência da conta. O parametro 'ammount' deve ser passado via post;
-POST / transactons/receive : Endpoint responsável por simular um deposito da conta. O parametro 'ammount' deve ser passado via post;

