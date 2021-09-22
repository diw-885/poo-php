<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire en POO</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            require_once 'Form.php';
            // On crée un formulaire
            $form = new Form();
            // On configure le formulaire
            $form
                ->input('email')
                ->select('subject', ['Devis', 'Contact', 'Candidature'])
                ->input('telephone')
                ->textarea('message')
                ->select('status', ['Particulier', 'Professionnel'])
                ->button('Envoyer')
            ;

            echo $form;

            if ($form->isSubmit()) { // Vérifier si le formulaire est soumis
                var_dump($form->getData()); // Récupérer les données du formulaire
            }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
