<?php
require_once ('Cadastro.php');
require_once ('Telefones.php');
require_once ('dados.php');
if(isset($_POST['gravou'])):
  
    $telefones=array();
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);// vai pegar os dados de um post por isso filter_input
    $dados= new dados(); // inicia
    $cpf = $_POST ['cpf'];
    if(empty($nome) && empty($cpf)) echo "<h3><u>ERRO: Necessário identificação!</u><h3>"; // Se cpf e nome forem vazios, não mostra na tabela

    else{
        // checagem dos telefones
        if(!empty($_POST['t1'])){
          $t1 = new Telefones($_POST['t1'], $_POST['d1']);
          $telefones[]=$t1->toString();
        } 
        if(!empty($_POST['t2'])){
          $t2 = new Telefones($_POST['t2'], $_POST['d2']);
          $telefones[]=$t2->toString();
        }
        if(!empty($_POST['t3'])){
          $t3 = new Telefones($_POST['t3'], $_POST['d3']);
          $telefones[]=$t3->toString();
        }  
        if(!empty($_POST['t4'])){
          $t4 = new Telefones($_POST['t4'], $_POST['d4']);
          $telefones[]=$t4->toString();
        } 
        if(!empty($_POST['t5'])){
          $t5 = new Telefones($_POST['t5'], $_POST['d5']);
          $telefones[]=$t5->toString();
        } 
        $pessoa = new Cadastro($nome, $cpf, $telefones);
        $dados->criaArquivo($pessoa);
    }
        $usuario= $dados->LeArquivo();
        
endif;
?>

<html>
<head>
  <meta charset="utf-8">
</head>
<body>
    <div style="display: block">
        <h1>Cadastro de Pessoa</h1>
    </div>
    <div>
        <form action= "" method= "POST" style="display: flex;flex-direction: row"> <!-- informações são enviadas pro script (dados.php) de forma invisivel, todos esses dados serão incorporados e passados pro dados.php -->
            <div>
                Nome: <input type = "text" name= "nome" placeholder="Nome Completo"> <br>
                CPF: <input type = "text" name= "cpf" placeholder= "CPF com pontuacao"> <br>
                
            </div>
            <div>

                <table border="1px">
                    <thead>
                        <tr>
                            <th>
                                Telefone
                            </th>
                            <th>
                                Descrição do Telefone
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Telefone 1: <input type = "text" name= "t1" placeholder= "Insira DDD e numeros"> <br>
                            </td>
                            <td>
                               <input type = "text" name= "d1" placeholder= "Ex: Cel. Claro, Cel. TIM"> <br>
                           </td>
                       </tr>
                       <tr>
                        <td>
                            Telefone 2: <input type = "text" name= "t2" placeholder= "Insira DDD e numeros"> <br>
                        </td>
                        <td>
                           <input type = "text" name= "d2" placeholder= "Ex: Cel. Claro, Cel. TIM"> <br>
                       </td>
                   </tr>
                   <tr>
                    <td>
                        Telefone 3: <input type = "text" name= "t3" placeholder= "Insira DDD e numeros"> <br>
                    </td>
                    <td>
                       <input type = "text" name= "d3" placeholder= "Ex: Cel. Claro, Cel. TIM"> <br>
                   </td>
               </tr>
               <tr>
                <td>
                    Telefone 4: <input type = "text" name= "t4" placeholder= "Insira DDD e numeros" > <br>
                </td>
                <td>
                   <input type = "text" name= "d4" placeholder= "Ex: Cel. Claro, Cel. TIM"> <br>
               </td>
           </tr>
           <tr>
            <td>
                Telefone 5: <input type = "text" name= "t5" placeholder= "Insira DDD e numeros"> <br>
            </td>
            <td>
                <input type = "text" name= "d5" placeholder= "Ex: Cel. Claro, Cel. TIM"> <br>
            </td>
        </tr>
    </tbody>
</table>

<br>
<br>
<button type="submit" name = "gravou">Gravar </button>

</div>

</form>
</div>
<hr>

<?php if(!empty($usuario)){ ?> <!-- so printa a tabela se tiver alguem guardado em usuario -->
<table border>

  <thead>
    <h2> Dados Gravados </h2>
      <tr> 
          <th> Nome </th>
          <th> CPF </th>
       <th> Telefone - Descrição </th> 
      </tr>
      
      <?php foreach($usuario as $novo){ ?>
        <tr>
            <td><?php echo $novo->getNome(); ?> </td>
            <td><?php  echo $novo->getCPF(); ?> </td>
            <td>
        <?php foreach($novo->getTelefones() as $cels) echo  $cels ."<br>"; ?>
        </td>
        </tr>
        
      <?php } ?>
    
      </thead>
    </table>
    <?php } ?> 
</body>
</html>