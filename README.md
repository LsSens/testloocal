Rotas da API
Autenticação
Autenticar Usuário
GET /authenticate
Esta rota permite autenticar o usuário para acessar recursos protegidos da API.
Lógica de Negócio
Verificar Palíndromo
POST /api/check-palindrome
Esta rota recebe uma string e verifica se é um palíndromo.
Processar Array
POST /api/process-array
Esta rota recebe um array de números e executa uma operação específica.
Integração com GitHub
Repositórios Populares de Usuário
GET /api/github/{user}/popular-repos
Retorna os repositórios mais populares de um usuário do GitHub.
Repositório Mais Extenso de Usuário
GET /api/github/{user}/largest-repo
Retorna o repositório mais extenso (em termos de tamanho) de um usuário do GitHub.
Gerenciamento de Usuários
Listar Usuários
GET /api/users
Retorna uma lista de todos os usuários cadastrados.
Criar Usuário
POST /api/users
Cria um novo usuário com os dados fornecidos.
Detalhes do Usuário
GET /api/users/{id}
Retorna os detalhes de um usuário específico pelo seu ID.
Atualizar Usuário
PUT /api/users/{id}
Atualiza os dados de um usuário específico identificado pelo seu ID.
Excluir Usuário
DELETE /api/users/{id}
Remove um usuário específico do sistema com base no seu ID.
Gerenciamento de Produtos
Listar Produtos
GET /api/products
Retorna uma lista de todos os produtos cadastrados.
Criar Produto
POST /api/products
Cria um novo produto com os dados fornecidos.
Detalhes do Produto
GET /api/products/{id}
Retorna os detalhes de um produto específico pelo seu ID.
Atualizar Produto
PUT /api/products/{id}
Atualiza os dados de um produto específico identificado pelo seu ID.
Excluir Produto
DELETE /api/products/{id}
Remove um produto específico do sistema com base no seu ID.