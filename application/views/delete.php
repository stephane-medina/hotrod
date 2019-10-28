<html>
    <head>
        <title>Formulaire de suppression</title>
    </head>
    <body>
        <form action="" method="GET">
            <input type="text" name="pro_libelle" value="<?= $produits->pro_libelle; ?>"><br>
            <input type="text" name="pro_ref" value="<?= $produits->pro_ref; ?>"><br>
            <input type="hidden" name="pro_id" value="<?= $produits->pro_id?>"><br>
            <input type="submit" value="Supprimer" onclick="return confirm('Etes vous sûr de vouloir supprimer cet item ?')"><br>
        </form>
    </body>
</html>