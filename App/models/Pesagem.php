<?php
  require_once('Database.php');

  class Pesagem {
    private $data;
    private $peso;

    public function __construct($dados) {
      $this->data = $dados['ps_data'];
      $this->peso = $dados['ps_peso'];
    }

    // DB
    // insere no banco a partir de nova instância
    public function criarPesagem($dbh) {
      try {
        // cria string de query
        $sth = $dbh->prepare("INSERT INTO pesagem(ps_data, ps_peso) VALUES(:data, :peso)");
        // amarra os parametros (prevenção de sql injection)
        $sth->bindParam(":data", $this->data, PDO::PARAM_STR);
        $sth->bindParam(":peso", $this->peso, PDO::PARAM_STR);
        // retorna a execução da query
        return $sth->execute();

      } catch (PDOException $e) {
        $e->getMessage();

      }
    }

    // busca pesagem pela data
    public static function buscarPesagem($dbh, $data) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT ps_data, ps_peso FROM pesagem WHERE ps_data = :data");
        // amarra parametros
        $sth->bindParam(":data", $data, PDO::PARAM_STR);
        // executa query
        $sth->execute();
        // extrai resultados
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;

      } catch(PDOException $e) {
        $e->getMessage();
      }
    }

    // retorna todas as pesagens
    public static function retornaPesagens($dbh) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT ps_data, ps_peso FROM pesagem");
        // executa query
        $sth->execute();
        // extrai resultados
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;

      } catch(PDOException $e) {
        $e->getMessage();
      }
    }


  }
?>
