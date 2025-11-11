  <?php
  class Rotas {
  public function rota()
        {
        
            $url_components = parse_url($_SERVER['REQUEST_URI']);
            $path = trim($url_components['path'] ?? '/', '/');
            if ($path == '') {
                $main_route = 'home';
            } else {
                $partes = explode('/', $path);
                $main_route = $partes[0];
            }
            $parametros = [];
            if (isset($url_components['query'])) {
                parse_str($url_components['query'], $parametros);
            }
            return [
                'url' => $main_route,
                'parametros' => $parametros
            ];
        }
       public  function navegar()
        {
            $rota = $this->rota();
            if (!empty($rota['parametros'])) {
                extract($rota['parametros'], EXTR_SKIP);
            }
            switch ($rota['url']) {
                case 'home':
                    require 'pages/home.php';
                    break;
                case 'produtos':
                    require 'pages/produtos.php';
                    break;
                default:
                    http_response_code(404);
                    require 'pages/404.php';
                    break;
            }
        }
    }
?>