    <?php
    require '../../banco.php';

    session_start();
if($_SESSION['id']==null){
header("Location: ../../index.html");}

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../CS/consultaadm.css">
        <title>Saúde pet</title>
    	
    	
    	
    	
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
              function minhalista(){

                var x= document.getElementById("minhaescolha").value;

                document.getElementById("demo").innerHTML = $id;
              }

  // Passando data do banco "AAAA-MM-DD" para "DD/MM/AAAA"   

            function mostraData ($data) {   

            if ($data!='') {   
               return (substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4));   

            }   

           else { return ''; }   

           }   
          </script>
    </head>

    <body>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
          <h2><b>Saúde Pet</b></h2>
         </div>
         <div class="col-sm-6">
          <a href="../../pagina/menu/menuusu.php" class="btn btn-success" data-toggle="modal"> <span>Voltar</span></a>
         <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons add_comment">&#xe266;</i> <span>Adicionar consulta</span></a>
            -->
         </div>
                    </div>
                </div>
                <table id="minhaTabela" class="table table-striped table-hover">
                    <thead>
                        <tr>
         <!-- <th>
           <span class="custom-checkbox">
            <input type="checkbox" id="selectAll">
            <label for="selectAll"></label>
           </span>
          </th>-->
                            <th width="50"> </th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th> </th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                     <tbody>
                            <?php
                            $dsn ='mysql:dbname=tabelapet;host=127.0.0.1';
    $user ='root';
    $password='';

    try{
        $dbh= new PDO($dsn, $user, $password);
    }
    catch(PDOException $e){
        echo 'Connection failed'. $e->getMessage();
    }


     $sql='SELECT * FROM atendimento WHERE id_atendimento_pet IS NULL ORDER BY data asc,horario asc';
      foreach($dbh->query($sql)as $row)
      {
      echo '<tr>';
      echo '<td width=50></td>';
      echo '<td>'. $row['data'] . '</td>';
    	echo '<td>'. $row['horario'] . '</td>';
      echo' <td></td>';
      echo '<td width=200>';
      
      
      echo '<a href="agendaupdateusuario.php?id_atendimento=
      '.$row['id_atendimento'].'
      &data='.$row['data'].'
      &horario='.$row['horario'].'
      
       "class="edit" data-toggle="modal">
      <i class="material-icons add_comment" title="Agendar Horário">&#xe266;
      </i></a>';
                                echo ' ';
                               

                                echo '</td>';
                                echo '</tr>';
                                
                            }
                            
                            ?>
                       </tbody>
                </table>
              
       
            </div>
        </div>
    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </body>
  </html>
