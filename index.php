<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pliki - PHP</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php?id=1">Utwórz katalog</a></li>
            <li><a href="index.php?id=2">Sprawdź, czy katalog istnieje</a></li>
            <li><a href="index.php?id=3">Pliki i katalogi z określonej lokalizacji</a></li>
            <li><a href="index.php?id=4">Czy istnieje plik tekst.txt</a></li>
            <li><a href="index.php?id=5">Usuń trzy pliki z katalogu</a></li>
            <li><a href="index.php?id=6">Zmień nazwę katalogu</a></li>
            <li><a href="index.php?id=7">Usuń katalog</a></li>
        </ul>
    </header>
    <section>
    <?php
        $katalog = './katalog';
        $katalog_new = './katalog2';

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            switch ($id) {
                case 1:
                    if(!file_exists($katalog))
                    {
                        mkdir($katalog, 0777);
                        echo 'Katalog stworzony pomyślnie.';
                    }
                    else
                    {
                        echo 'Katalog o takiej nazwie już istnieje.';
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

                case 3:
                    if(file_exists($katalog))
                    {
                        $pliki = array_diff(scandir($katalog), array('..', '.'));

                        if(!empty($pliki))
                        {
                            echo 'W katalogu znajdują się pliki: ';
                            foreach($pliki as $plik)
                            {
                                echo "<p>$plik</p>";
                            }
                        }
                        else
                        {
                            echo 'Katalog jest pusty.';
                        }
                    }
                    break;

                case 4:
                    $dir = './katalog/tekst.txt';
                    
                    if(file_exists($dir))
                    {
                        echo 'Plik <i>tekst.txt</i> istnieje.';
                    }
                    else
                    {
                        echo 'Plik <i>tekst.txt</i> nie istnieje.';
                    }
                    break;

                case 5:
                    if(file_exists($katalog))
                    {
                        $pliki = array_diff(scandir($katalog), array('..', '.'));

                        foreach($pliki as $plik)
                        {
                            unlink($katalog . '/' . $plik);
                        }

                        echo 'Pliki usunięte pomyślnie.';
                    }
                    else
                    {
                        echo 'Katalog jest pusty.';
                    }
                    break;

                case 6:
                    if(file_exists($katalog))
                    {
                        if(file_exists($katalog_new))
                        {
                            echo 'Katalog o takiej nazwie już istnieje.';
                        }
                        else
                        {
                            rename($katalog, $katalog_new);
                            echo 'Nazwa zmieniona pomyślnie.';
                        }
                    }
                    break;

                case 7:
                    if(file_exists($katalog))
                    {
                        if(empty(array_diff(scandir($katalog), array('..', '.'))))
                        {
                            rmdir($katalog);
                            echo '<p>Katalog ' . $katalog . ' usunięty pomyślnie.</p>';
                        }
                        else
                        {
                            echo '<p>Katalog ' . $katalog . ' nie jest pusty.</p>';
                        }
                    }

                    if(file_exists($katalog_new))
                        {
                            if(empty(array_diff(scandir($katalog_new), array('..', '.'))))
                            {
                                rmdir($katalog_new);
                                echo 'Katalog ' . $katalog_new . ' usunięty pomyślnie.';
                            }
                            else
                            {
                                echo 'Katalog ' . $katalog_new . ' nie jest pusty.';
                            }
                        }
                    break;
                
                default:
                    echo 'Wartość spoza zakresu ¬_¬';
                    break;
            }
        }
    ?>
    </section>
    <footer>
        <p>Autor: Krzysztof Bicz 4E2</p>
        <p>Proszę o <i>bardzo</i> dobrą ocenę <img src="nice.png"></p>
    </footer>
</body>
</html>