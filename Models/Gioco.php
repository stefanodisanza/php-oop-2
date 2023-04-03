<?php
class Gioco extends Prodotto
{
    public $materiale;

    function __construct(string $nome, string $descrizione, float $prezzo, string $immagine, int $quantita, Categoria $categoria, string $materiale)
    {
        parent::__construct(
            $nome,
            $descrizione,
            $prezzo,
            $immagine,
            $quantita,
            $categoria
        );
        $this->materiale = $materiale;
    }
}
