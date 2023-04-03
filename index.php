<?php
require_once __DIR__ . '/Models/Prodotto.php';
require_once __DIR__ . '/Models/Categoria.php';
require_once __DIR__ . '/Models/Cibo.php';
require_once __DIR__ . '/Models/Gioco.php';

trait PrezzoScontato
{
    public function calcolaPrezzoScontato($sconto)
    {
        return $this->prezzo - ($this->prezzo * $sconto / 100);
    }
}

class ProdottoNonTrovatoException extends Exception
{
}

$categoriaCani = new Categoria(
    'Cani',
    '<i class="fa-solid fa-dog"></i>'
);
$categoriaGatti = new Categoria(
    'Gatti',
    '<i class="fa-solid fa-cat"></i>'
);

$prodotti = [];
try {
    $prodotti[] = new Prodotto(
        'Prodotto 1',
        'Descrizione prodotto 1',
        9.99,
        'https://picsum.photos/200',
        5,
        $categoriaCani
    );

    $prodotti[] = new Prodotto(
        'Prodotto 2',
        'Descrizione prodotto 2',
        9.99,
        'https://picsum.photos/200',
        5,
        $categoriaGatti
    );

    $prodotti[] = new Cibo(
        'Cibo 1',
        'Descrizione cibo 1',
        20.99,
        'https://picsum.photos/200',
        5,
        $categoriaCani,
        '07/03/2023'
    );

    $prodotti[] = new Gioco(
        'Gioco 1',
        'Descrizione gioco 1',
        12.99,
        'https://picsum.photos/200',
        5,
        $categoriaGatti,
        'Gomma'
    );
} catch (Exception $e) {
    echo 'Errore: ' . $e->getMessage();
}

if (empty($prodotti)) {
    throw new ProdottoNonTrovatoException('Nessun prodotto trovato');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title> PHP OOP 2 </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>

    </header>
    <main class="sfondo">
        <div class="container">
            <h1>Cose per Cani e Gatti</h1>
            <div class="row">
                <?php
                foreach ($prodotti as $index => $prodotto) {
                ?>
                    <div class="col-3">
                        <div class="card">
                            <img src="<?php echo $prodotto->immagine ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $prodotto->nome; ?></h5>
                                <p class="card-text"><?php echo $prodotto->descrizione; ?></p>
                                <p>Prezzo: <?php echo $prodotto->prezzo; ?> €</p>
                                <p>Quantità: <?php echo $prodotto->quantita; ?></p>
                                <p>Categoria: <?php echo $prodotto->categoria->nome; ?> <?php echo $prodotto->categoria->icona; ?></p>
                                <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i> Aggiungi al carrello</button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>