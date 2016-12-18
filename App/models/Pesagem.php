<?php
  require_once('Database.php');

  class Pesagem {
    private $id;
    private $peso;
    private $data;

    public function __construct($dados) {
      $this.peso = $dados['peso'];
      $this.data = $dados['data'];
    }

    // DB

    public function createPesagem($dbh) {
      try {
        // cria string de query
        $sth = $dbh->prepare("INSERT INTO Pesagem(ps_peso, ps_data) VALUES(:peso, :data)");
        // amarra os parametros (prevenção de sql injection)

      } catch (PDOException $e) {
        echo $e->getMessage();

      }

    }

    // Acessores

    public getPeso() { return $this.peso; }
    public setPeso($peso) { $this.peso = $peso; }

    public getData() { return $this.data; }
    public setData($data) { $this.data = $data; }

  }
?>
