# Aula 1 - Formulário de Cadastro Simples

Um simples formulário HTML que envia as informações para o PHP, onde encontramos uma conecção com o banco de dados MySQL e a inserção de um usuário.

## Formulário HTML

Construiremos um simples formulário de cadastro em HTML. O formulário de cadastro por si só não é capaz de cadastrar o usuário, apenas fornece o espaço de preenchimento e interação. Você poderá ver o formulário completo no arquivo [form.php](form.php).

Ao criar um formulário precisamos definir o destino das informações nele contidade, o que fazemos através do parâmetro `action`. Outro ponto importante é definir o método de envio de informações. Temos disponível os métodos **GET** e **POST**. No **GET** as informações são passadas abertamente através da URL, o que permite o envio de informações diretamente através do _link_, mas em contra partida permite a visualização de todo o conteúdo. No caso o **POST**, a informação é escondida, garantindo mais segurança a dados sensíveis, porém não permite o envio de informações através do _link_. Como se trata de um formulário com informações sensíveis, optamos pelo **POST**.

```php
<form action="cadastro.php" method="post">

</form>
```

O próximo passo é adicionar os campos contidos no formulário: nome, email e senha. Por fim, adicionamos um botão do tipo _submit_, que quando acionado envia os demais campos para o destino especificado no parâmetro `action`.

```php
<body>
<form action="cadastro.php" method="post">
    <p>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
    </p>
</form>
```

## Tabela no MySQL

Utilizaremos uma tabela simples de usuário, contendo apenas id, nome, email e senha. O _script_ de criação está disponível no arquivo [script.sql](script.sql).

```sql
CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(100)
);
```
## Inserindo os dados com PHP

Construiremos passo a passo o código que insere os dados no banco de dados, disponível no arquivo [cadastro.php](cadastro.php).

Antes de inserir, vamos primeiro conferir se após clicar no botão _submit_, a página é redirecionada para o arquivo correto.

```php
<?php
    echo "Hello World!";
?>
```

Sabendo que o formulário envia os dados para o arquivo correto, vamos receber as informações enviadas através do **POST** e exibí-las.

```php
<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    echo "$nome<br/>";
    echo "$email<br/>";
    echo "$senha<br/>";
?>
```

O próximo passo é estabelecer uma coneção com o MySQL. Para isso utilizamos a função `mysqli_connect`, cujos parâmetros são:
 - endereço do servidor (`localhost` caso o MySQL esteja no mesmo servidor que o PHP)
 - login do MySQL (padrão `root`)
 -  senha do MySQL (padrão vazio)
 - nome do banco de dados (utilizamos `cadastro`)
Após conectar, vamos conferir se a coneção foi bem sucedida do contrário o cadastro será interrompido e uma mensagem de erro apresentada. Sempre que abrimos uma conecção, é importante fechá-la, o que é feito pela função `ysqli_close`.

```php
<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    echo "$nome<br/>";
    echo "$email<br/>";
    echo "$senha<br/>";

    $connection = mysqli_connect("localhost", "root", "", "cadastro");
 
    // Check connection
    if($connection === false){
        die("Deu ruim na conexão!" . mysqli_connect_error());
    }

    mysqli_close($connection);
?>
```

Nosso próximo passo é montar a string SQL que insere os dados.

```php
$sql = "INSERT INTO usuario (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";
```

Por fim, utilizamos a função `mysqli_query`, que recebe uma coneção (`$connection`) e uma string (`$sql`), executa a operação e retorna verdadeiro caso a operação seja bem sucedida e falso caso contrário.

```php
$sql = "INSERT INTO usuario (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";
if(mysqli_query($connection, $sql)){
    echo "Cadastro Concluído";
} else{
    echo "Deu ruim no cadastro! $sql. " . mysqli_error($connection);
}
```


## Referências

 - https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php