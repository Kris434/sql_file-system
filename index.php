<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pliki - PHP</title>

    <style>
        a {
            color: red;
            text-decoration: none;
            transition: 0.2s;
        }
        a:hover {
            color: darkred;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="index.php?id=1">Utwórz katalog</a></li>
        <li><a href="index.php?id=2">Sprawdź, czy katalog istnieje</a></li>
        <li><a href="index.php?id=3">Pliki i katalogi z określonej lokalizacji</a></li>
        <li><a href="index.php?id=4">Czy istnieje plik tekst.txt</a></li>
        <li><a href="index.php?id=5">Usuń trzy pliki z katalogu</a></li>
        <li><a href="index.php?id=6">Zmień nazwę katalogu</a></li>
        <li><a href="index.php?id=7">Usuń katalog</a></li>
    </ul>
    <?php
        $katalog = './katalog';

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            switch ($id) {
                case 1:
                    if(!file_exists($katalog))
                    {
                        mkdir('katalog');
                        echo 'Katalog stworzony pomyślnie.';
                    }
                    break;

                case 2:
                    if(!file_exists($katalog))
                    {
                        echo 'Katalog nie istnieje.';
                    }
                    else 
                    {
                        echo 'Katalog już istnieje.';
                    }
                    break;

                case 7:
                    if(file_exists($katalog))
                    {
                        rmdir($katalog);
                        echo 'Katalog usunięty pomyślnie.';
                    }
                    else
                    {
                        echo 'Podany katalog nie istnieje.';
                    }
                    break;
                default:
                    echo 'Wartość z poza zakresu ¬_¬';
                    break;
            }
        }
    ?>
</body>
</html>