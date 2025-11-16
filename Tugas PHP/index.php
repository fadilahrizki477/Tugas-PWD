<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tabel Perkalian Matrik</h2>
        <div class="output">
            <table>
                <tr>
                    <td class="bilangan-col">bilangan</td>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo '<td class="header">' . $i . '</td>';
                    }
                    ?>
                </tr>
                <?php
                for ($baris = 1; $baris <= 10; $baris++) {
                    echo '<tr>';
                    echo '<td class="bilangan-col">' . $baris . '</td>';
                    
                    for ($kolom = 1; $kolom <= 10; $kolom++) {
                        $hasil = $baris * $kolom;
                        if ($hasil % 2 == 0) {
                            $class = 'genap';
                        } else {
                            $class = 'ganjil';
                        }
                        
                        echo '<td class="' . $class . '">' . $hasil . '</td>';
                    }
                    
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>

</body>
</html>