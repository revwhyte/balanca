<?php
  require_once('Database.php');

  class Pesagem {
    private $peso;
    private $data;

    public function __construct($dados) {
      $this.peso = $dados['peso'];
      $this.data = $dados['data'];
    }

    // DB
    // insere no banco quando instancia uma nova pesagem
    public function criarPesagem($dbh) {
      try {
        // cria string de query
        $sth = $dbh->prepare("INSERT INTO pesagem(ps_peso, ps_data) VALUES(:peso, :data)");
        // amarra os parametros (prevenção de sql injection)
        $sth->bindParam(":peso", $this->getPeso(), PDO::PARAM_STR);
        $sth->bindParam(":data", $this->getData(), PDO::PARAM_STR);
        // retorna a execução da query
        return $sth->execute();

      } catch (PDOException $e) {
        $e->getMessage();

      }
    }

    public static function buscarPesagem($dbh, $data) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT ps_peso, ps_data FROM pesagem WHERE ps_data = :data");
        // amarra parametros
        $sth->bindParam(":data", $data, PDO::PARAM_STR);
        // executa query
        $sth->execute();
        // extrai resultados
        $result = sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;

      } catch(PDOException $e) {
        $e->getMessage();
      }
    }

    // Acessores

    public getPeso() { return $this.peso; }
    public setPeso($peso) { $this.peso = $peso; }

    public getData() { return $this.data; }
    public setData($data) { $this.data = $data; }

  }
?>
