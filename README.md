# PROJETO 12 - OFICINA DE PROJETOS CLOUD TREINAMENTOS

Este projeto foi implementado durante a oficina de projetos na Cloud Treinamentos.

Instagram Cloud Treinamentos: https://www.instagram.com/comunidadecloud/

Tivemos como objetivo no projeto implementar um serviço de streaming utilizando a nuvem da AWS, para isso utilizamos o STREAMA.

O projeto original do STREAMA está disponível no seguinte GitHub: https://github.com/streamaserver/streama

Abaixo iremos apresentar como subir o ambiente que implementamos e os participantes do projeto:

|               Nome	            |                          Linkedin                                    |
|-----------------------------------|----------------------------------------------------------------------|
| Ailton Euclides Garcia Filho	    |  https://www.linkedin.com/in/ailton-euclides-garcia-filho-991a3a135/ |
| André Caliari	                    |  https://www.linkedin.com/in/acaliari/                               |
| Arlindo Ferreira da Silva Ramos   |  https://www.linkedin.com/in/arlindo-ramos/                          |
| Everton Minoru Nakatani	        |  https://www.linkedin.com/in/minorunakatani                          |
| Gilberto Soares Domingues     	|  https://www.linkedin.com/in/gilberto-domingues/                     |
| Giselly Rebouças	                |  https://www.linkedin.com/in/giselly-reboucas-b29b42b2/              |
| Herisson Silva	                |  https://br.linkedin.com/in/herisson-silva-7275a0187                 |
| Lucas dos Santos Moraes	        |  https://www.linkedin.com/in/lucaspanik/                             |
| Marcio Peduzzi	                |  https://www.linkedin.com/in/marcio-peduzzi                          |
| Mark Pessoa	                    |  https://www.linkedin.com/in/markpessoa                              |
| Nicolas Matos	                    |  https://www.linkedin.com/in/nicolasmatos-dev/                       |
| Peterson Luiz de Souza Silva	    |  https://www.linkedin.com/in/peterson-ti                             |
| Robson Ferraz do Amaral	        |  https://www.linkedin.com/in/robson-cloud-aws/                       |

---------------

Nesse projeto, conforme informado anteriormente, utilizamos o STREAMA como serviço de streaming, junto ao STREAMA implementamos autenticação com OPENLDAP e criamos uma página de cadastro, onde caso o usuário já tenha login ele tem a opção de ir para a página de login

Para o projeto funcionar, você precisará de uma instância para servir como servidor e as seguintes portas precisarão estarem liberadas:

 - 80: Para acesso web externo à página de cadastro
 - 8080: Para acesso web ao Streama
 - 8096: Para acesso ao phpLDAPadmin e gerenciar cadastro do OPENLDAP
 - 389: Porta utilizada pelo OPENLDAP
 - 636: Porta utilizada pelo OPENLDAP

Você precisará ter um banco de dados MARIADB criado.

A seguir o passo a passo para subir o ambiente que está nesse Git Hub

1. Faça o clone desse repositório com o comando git clone https://github.com/HerissonS/projeto-streama.git

2. Abra a pasta do repositório que foi clonado

3. Acesse a pasta STREAMA, edite o arquivo application.yml e substitua os seguintes campos:
    - colocar_seu_link_db = Coloque o link do seu banco de dados
    - nome_db = Coloque o nome do seu banco de dados já criado (Basta o banco de dados criado, não precisa conter tabelas)

4. Volte a pasta principal do repositório criado, dê permissão de execução para o arquivo streama.sh e depois execute ele.
    - Comando para dar permissão de execução: sudo chmod +x streama.sh
    - Comando para executar o script: ./streama.sh

5. Após todo o ambiente subir, acesse o phpLDAPadmin com IP da sua instância e porta 8096 através do navegador.
    - Credenciais de acesso:
        - Login DN: cn=admin,dc=g2cloud,dc=com
        - Password: admin

6. Após logar no phpLDAPadmin, vá até a opção de import e importe o arquivo usuario.ldif que está no diretório LDAP desse repositório.

7. Após importar o arquivo e todo ambiente já estar operacional, você pode acessar o link principal com o IP de sua instância, onde você poderá criar um usuário que tem permissão somente de visualização no Streama, ou ir para a página de login do Streama e acessar com usuário e senha de administrador: admin

8. Para saber como personalizar o Streama, acesse o repositório do projeto:  https://github.com/streamaserver/streama