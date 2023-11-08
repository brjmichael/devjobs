
![Logo](https://raw.githubusercontent.com/brjmichael/devjobs/061fddbf2fa4dec8f67eb55ca59ffbfd67b96b6b/assets/img/logo_blue.svg)


## O que é o DevJobs

DevJobs é um projeto pessoal de vagas de emprego para programadores desenvolvido com HTML, CSS, JavaScript e PHP.
## Requisitos

- `PHP 7+`
- `Apache 2.4+`


## Instalando em localhost

Para instalar este projeto em sua máquina, basta configurar um servidor local usando o XAMPP ou WAMPP.

Com o ambiente configurado, abra o arquivo `config.php` e modifique as variáveis que representam as credenciais de acesso ao seu banco de dados local.

Exemplo:

```php
$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'devjobs';
```

Feita as alterações, abra o arquivo `index.php` em seu navegador. Atente-se à estrutura de pastas na qual o seu projeto está incluso!

O caminho padrão é parecido com isso: `localhost/devjobs/index.php`.

No primeiro acesso, será exibida uma página de boas vindas na qual será necessário clicar no botão Iniciar para que o banco de dados seja configurado. Certifique-se de ter inserido suas credenciais corretamente no arquivo `config.php` conforme mencionado na etapa anterior.

![App Screenshot](https://i.ibb.co/Bzw0njB/235337.png)

Se estiver tudo certo, será exibida a seguinte mensagem: 

"Sua instância está configurada!"

Caso contrário, verifique as informações inseridas no arquivo `config.php`, além de checar se o seu servidor está rodando conforme o esperado.
## Usando o sistema

Após a inicialização, você será um usuário **Administrador** conectado à plataforma. Sendo administrador, você poderá:
- Cadastrar vagas de emprego
- Excluir vagas cadastradas
- Editar detalhes das vagas cadastradas

No banco de dados, mais especificamente na tabela `usuarios`, seu cadastro de Administrador possui as seguintes credenciais de acesso para usar posteriormente:

- Login: `admin@admin.com`
- Senha: `admin`

Essas credenciais serão usadas para fazer login no painel após a sua sessão expirar ou você decidir sair.

## Painel de Controle
Acessando a página `painel.php`, você terá acesso ao formulário de cadastro de vagas, além da possibilidade de visualizar a listagem e editar cada vaga no mesmo ambiente.

![App Screenshot](https://i.ibb.co/99GDKGr/001216.png)


## Listagem de vagas

A lista de vagas será atualizada automaticamente após uma nova inserção ou edição.

![App Screenshot](https://i.ibb.co/nQqPDgy/001310.png)

#### Editando vaga

Para editar uma vaga existente, basta clicar sobre o ícone de lápis localizado no canto superior direito de cada card de vaga.

Após escolher a vaga que deseja editar, um modal será aberto, permitindo-lhe realizar as alterações necessárias. Para confirmar as alterações, é necessário clicar em **Salvar Edição**.

![App Screenshot](https://i.ibb.co/XkpKJbG/001615.png)

#### Deletando vaga
Para deletar uma vaga, é necessário confirmar o ato de exclusão antes de concluir a operação. Isso foi implementado para evitar que a ação ocorra por acidente. Ao clicar em **Deletar vaga**, será exibido um modal com a opção de confirmar ou desistir da exclusão.


**Usuários comuns (não administrador) não tem acesso aos botões de Editar e Deletar vaga.**
## Logout - Saindo do sistema

Para se desconectar da sessão, basta clicar no botão **SAIR** localizado no canto direito do cabeçalho. Ao clicar no botão, também é necessário confirmar esta ação para que de fato a sessão atual seja limpa do seu navegador.

## Login - Entrando do sistema

Para entrar novamente no sistema e ter permissões de administrador, é necessário fazer login. Para isso, acesse a página `login.php` diretamente na URL ou através do cabeçalho. Informe as credenciais de acesso e clique em **Entrar**. E pronto! De volta ao controle total :)
