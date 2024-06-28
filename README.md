# API usando cache para manipular dados

Essa API foi desenvolvida para uma plataforma de estudos online, facilitando a gestão de aulas, cursos e módulos. Para garantir um desempenho eficiente e uma experiência de usuário de alta qualidade, foi adotada uma arquitetura robusta utilizando o cache como estratégia para evitar multiplas querys.

### Funcionalidades Principais:
 - Gerenciamento de Aulas: Criação, atualização, listagem e remoção de aulas, com dados cacheados para acessos rápidos e eficientes.
 - Gerenciamento de Cursos: Operações CRUD completas para cursos, integrando módulos e aulas, com suporte a cache para minimizar acessos ao banco de dados.
 - Gerenciamento de Módulos: Organização e manipulação de módulos dentro dos cursos, com cache inteligente para melhorar a velocidade de resposta.
 - Cache Inteligente: Utilização do Redis para armazenamento temporário de dados frequentemente acessados, reduzindo a carga no MySQL e acelerando as respostas da API.
 - Integração Contínua e Entrega Contínua (CI/CD): Pipeline automatizado no Github para testes e deploys contínuos, garantindo a qualidade e a estabilidade da aplicação.
 - Contêinerização com Docker: Toda a aplicação é contêinerizada, facilitando a escalabilidade e a replicação do ambiente de desenvolvimento para produção.
   
### Tecnologias Utilizadas:
 - Docker: Para contêinerização e fácil implantação. 
 - Laravel: Framework PHP utilizado para construir a API. <br>
 - Github CI/CD: Para automação de testes e deploys. <br>
 - Redis: Sistema de cache para otimização de acesso a dados. <br>
 - MySQL: Banco de dados relacional para armazenamento persistente. <br>

### Endpoints:
 - Cursos
```markdown
    GET /courses - Retorna todos os cursos. 
    GET /courses/{uuidCourse} - Retorna um curso específico.
    POST /courses - Cria um novo curso.
    PUT /courses/{uuidCourse} - Atualiza um curso específico.
    DELETE /courses/{uuidCourse} - Remove um curso específico.
```
 - Módulos
```markdown
    GET /courses/{uuidCourse}/modules - Retorna todos os módulos de um curso específico.
    GET /courses/c/modules/{uuidModule} - Retorna os detalhes de um módulo específico.
    POST /courses/{uuidCourse}/modules - Cria um novo módulo dentro de um curso específico.
    PUT /courses/c/modules/{uuidModule} - Atualiza um módulo específico.
    DELETE /courses/c/modules/{uuidModule} - Remove um módulo específico.
```
 - Aulas
```markdown
    GET /modules/{uuidModule}/lessons - Retorna todas as aulas de um módulo específico.
    GET /modules/c/lessons/{uuidLesson} - Retorna os detalhes de uma aula específica.
    POST /modules/{uuidModule}/lessons - Cria uma nova aula dentro de um módulo específico.
    PUT /modules/c/lessons/{uuidLesson} - Atualiza uma aula específica.
    DELETE /modules/c/lessons/{uuidLesson} - Remove uma aula específica.
```
