<?php
require 'api/conexao.php';
$con = Conexao::getConexao();
$mensagem_erro = '';
$mensagem_sucesso = '';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.3.4/af-2.7.1/b-3.2.5/b-colvis-3.2.5/b-html5-3.2.5/b-print-3.2.5/cr-2.1.2/cc-1.1.1/date-1.6.1/fc-5.0.5/fh-4.0.4/kt-2.12.1/r-3.0.7/rg-1.6.0/rr-1.5.0/sc-2.4.3/sb-1.8.4/sp-2.3.5/sl-3.1.3/sr-1.4.3/datatables.min.css" rel="stylesheet" integrity="sha384-UEUkrDVeENwm/Xg54FTnOMJ0lE9tQHxU2A+W7z5UjKzi/naxqt3MxLjWSfaRwL8I" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.3.4/af-2.7.1/b-3.2.5/b-colvis-3.2.5/b-html5-3.2.5/b-print-3.2.5/cr-2.1.2/cc-1.1.1/date-1.6.1/fc-5.0.5/fh-4.0.4/kt-2.12.1/r-3.0.7/rg-1.6.0/rr-1.5.0/sc-2.4.3/sb-1.8.4/sp-2.3.5/sl-3.1.3/sr-1.4.3/datatables.min.js" integrity="sha384-vd2Tm3UQXVKKDdkiXRcToCAIOwi7Yoayngx6tQhnZ7Cc6haK1Gaw1gIXyDUrrgvz" crossorigin="anonymous"></script>
    <!-- Datatabels -->
    <!-- Cahrts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.min.js" integrity="sha512-n/G+dROKbKL3GVngGWmWfwK0yPctjZQM752diVYnXZtD/48agpUKLIn0xDQL9ydZ91x6BiOmTIFwWjjFi2kEFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="container">
        <h4>Estou no index</h4>
        <?php
        //var_dump($_SERVER['REQUEST_URI']);
        function partes($str)
        {
            if (strpos($str, "&") !== false) {
                $str = explode("&", $str);
            }
            return $str;
        }
        function parametros(...$str)
        {
            $arr = array();
            foreach ($str as $v) {
                if (strpos($v, "=") !== false) {
                    $param = explode("=", $v);
                    $arr[$param[0]] = $param[1];
                }                
            }
            return $arr;
        }

        $url = $_SERVER['REQUEST_URI'];
        $end = explode("/", $url);
        array_shift($end); //remover a primeira posiçao vazia
        if (strpos($end[0], "?") !== false) {
            $partes = explode("?", $end[0]);
            $end[0] = $partes[0];
        }

        $partes = partes($partes[1]);
        $parametros = parametros(...$partes);
        var_dump($parametros);


        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>