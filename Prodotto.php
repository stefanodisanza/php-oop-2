<?php
class Prodotto
{
    use NameDesc;
    public $prezzo;
    public $quantita;
    public $immagine;
    public $categoria;

    function __construct(string $nome, string $descrizione, float $prezzo, string $immagine, int $quantita, Categoria $categoria)
    {
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->immagine = $immagine;
        $this->quantita = $quantita;
        $this->categoria = $categoria;


        if ($prezzo >= 0) {
            $this->prezzo = $prezzo;
        } else {
            throw new Exception('Non é possibile inserire un prezzo negativo');
        }
    }
}
