<?php
require_once 'config/autoload.php';
require_once 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image']; // Informations de l'image qui vient d'être uploadée
    // Pourquoi pas créer une class Upload ?
    // $upload = new Upload($image);
    // $upload->handle(__DIR__.'/upload');

    // Pas d'erreur sur l'upload
    if ($image['error'] === 0) {
        var_dump($image);
        // On récupère l'emplacement temporaire de l'image
        $tmp_name = $image['tmp_name'];
        // On crée un dossier upload s'il n'est pas présent
        if (!is_dir(__DIR__.'/upload')) {
            mkdir(__DIR__.'/upload');
        }

        // On génére un nom pour l'image
        // On doit transfomer 'aaaaa.jpg' en '123_aaaaa.jpg';
        // pathinfo($image['name'])['filename'] => 'aaaaa'
        // pathinfo($image['name'])['extension'] => '.jpg'
        $file_name = uniqid().'_'.$image['name'];

        // on déplace le fichier temporaire dans l'emplacement voulu
        move_uploaded_file($tmp_name, __DIR__.'/upload/'.$file_name);
    }
}

?>

<div class="container mt-5">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <button class="btn btn-primary">Upload</button>
    </form>
</div>

<?php require_once 'partials/footer.php'; ?>
