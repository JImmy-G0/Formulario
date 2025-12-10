Este projeto é um sistema simples de cadastro, edição, listagem e exclusão de alunos, desenvolvido em PHP, utilizando MySQL para armazenamento de dados e Bootstrap 5 na interface.

Tecnologias Utilizadas:
-PHP                      
-MySQL                                   
-Bootstrap 5

Estrutura e explicação dos arquivos do projeto:
-Conexao.php:
Este arquivo é responsável por criar a conexão com o banco de dados MySQL. Nele são definidos os parâmetros de acesso (host, usuário, senha e nome do banco) e gerada a variável $conexao, utilizada por todo o sistema para a execução das consultas SQL.

-Cadastro.php:
O arquivo cadastro.php recebe os dados enviados pelo formulário de registro de usuários e processa a criação de um novo cadastro. Ele valida as informações recebidas, insere o novo usuário no banco de dados e salva mensagens de retorno utilizando $_SESSION para informar ao usuário se o processo foi concluído com sucesso ou se ocorreu algum problema.

-Editar.php:
O arquivo editar.php é encarregado de atualizar as informações de um aluno já existente no banco. Ele recebe o ID do aluno e os novos dados enviados pelo formulário de edição, realiza o comando SQL de atualização e define mensagens de sucesso ou erro por meio da sessão antes de redirecionar o usuário de volta à página de listagem.

-Exibir.php:
Este arquivo consulta todos os alunos cadastrados no banco de dados e exibe as informações em formato de tabela. Além de listar os dados, ele também apresenta botões que permitem editar ou remover cada aluno, funcionando como o painel principal de gerenciamento dentro do sistema.

-Remover.php:
O arquivo remover.php é responsável por excluir um aluno do banco de dados. Ele recebe o ID pela URL, executa o comando SQL de remoção e armazena uma mensagem de retorno na sessão para informar o resultado da operação, redirecionando o usuário novamente à página de listagem.

-Login.php:
Este arquivo processa o login dos usuários, recebendo as credenciais enviadas pelo formulário. Ele verifica no banco de dados se o email existe e se a senha informada está correta. Caso a autenticação seja bem-sucedida, a sessão é iniciada e o acesso às páginas internas é liberado.

-Logout.php:
O logout.php encerra a sessão do usuário atual, removendo seus dados de autenticação e redirecionando-o para a página de login, garantindo que as áreas internas permaneçam protegidas após o logout

-Nav.php:
O arquivo nav.php contém a estrutura da barra de navegação do sistema. Ele é incluído em várias páginas por meio de include() para manter a interface consistente e facilitar o acesso às principais funções do sistema.

Paginas explicadas e arquivos de cada pagina:

Pagina de Login (index.php): Pagina inicial de login, com campos de email e senha necessarios para entrar com uma conta na pagina principal. 
<img width="1919" height="880" alt="Screenshot 2025-12-09 at 14-09-54 Bootstrap 5 Login Page" src="https://github.com/user-attachments/assets/7d0d8d83-e9ad-4cb6-8794-d37f42f38d61" />

Pagina de cadastro (telacadastro.php): Pagina para o cadastro de usuarios, onde se cadastra o email e senha necessarios para entrar na pagina principal pela pagina do login.
<img width="1920" height="881" alt="Screenshot 2025-12-09 at 14-10-27 Bootstrap 5 Login Page" src="https://github.com/user-attachments/assets/37164f49-d934-4b25-acdd-5945c7108b77" />

Pagina do painel (painel.php): Pagina onde é exibido em formato de graficos e cards as informações gerais dos alunos cadastrados na pagina de cadastro de alunos.
<img width="1920" height="881" alt="Screenshot 2025-12-09 at 14-10-41 Painel de Alunos" src="https://github.com/user-attachments/assets/59b94e79-2794-4386-9047-7470c5e9777f" />

Pagina de cadastro de alunos (cadastro_aluno.php): Pagina onde é possivel cadastrar alunos de uma instituição com campos de informações pessoais, de responsavel e da instituição.
<img width="1920" height="881" alt="Screenshot 2025-12-09 at 14-10-49 Cadastro" src="https://github.com/user-attachments/assets/7f1c84bc-c7e4-4bce-95d2-70142fff0052" />

Pagina de ixibir em lista os alunos (exibir.php): Pagina onde é exibido em lista os alunos e suas informações em ordem alfabetica, tendo uma barra de pesquisa por nome dos alunos e botões de "editar" onde é possivel editar as informações dos alunos, e "excluir" onde exclui um aluno e suas informações do banco e formulario.
<img width="1920" height="881" alt="Screenshot 2025-12-09 at 14-11-14 Listagem de Alunos" src="https://github.com/user-attachments/assets/f9eb827a-e266-4ef2-b2e0-a16593e40ad7" />

Pagina de Editar as informações dos alunos (tela_editar.php): Pagina onde é possivel editar as informações de um aluno escolhido na pagina da lista.
<img width="1920" height="881" alt="Screenshot 2025-12-09 at 14-11-30 Editar Aluno" src="https://github.com/user-attachments/assets/6dfa9a04-b86d-427a-b70e-9d13092c63e8" />
