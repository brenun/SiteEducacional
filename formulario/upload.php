<?php
// Verifica se o formulário foi enviado
if(isset($_POST['submit'])) {
  // Verifica se o arquivo foi selecionado
  if(isset($_FILES['file'])) {
    // Define o diretório de destino dos arquivos
    $target_dir = "meus_arquivos/";

    // Cria a pasta se ela não existir
    if (!file_exists($target_dir)) {
      mkdir($target_dir, 0777, true);
    }

    // Define o nome do arquivo no servidor
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    // Move o arquivo temporário para o diretório de destino
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      echo "O arquivo ". basename( $_FILES["file"]["name"]). " foi enviado com sucesso.";
    } else {
      echo "Ocorreu um erro ao enviar o arquivo.";
    }
  } else {
    echo "Nenhum arquivo foi selecionado.";
  }
}
?>
<?php
// Exibe a lista de arquivos disponíveis para download
echo '<h3>Arquivos disponíveis para download:</h3>';
echo '<ul>';
// Obtém os nomes dos arquivos no diretório de uploads
$files = scandir('meus_arquivos/');
// Percorre os arquivos e cria um link para cada um
foreach($files as $file) {
  if($file != '.' && $file != '..') {
    echo '<li><a href="meus_arquivos/'.$file.'" download="'.$file.'">'.$file.'</a></li>';
  }
}
echo '</ul>';
?>
