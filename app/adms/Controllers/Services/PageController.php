<?php

namespace App\adms\Controllers\Services;

use App\adms\Helpers\ClearUrl;
use App\adms\Helpers\SlugController;

class PageController
{
    /** @var string Recebe a URL de .htaccess */
    private string $url;

    /** @var array $urlArray Converte a URL para um array */
    private array $urlArray;

    /** @var string  Recebe a controller dentro da URL*/
    private string $urlcontroller = '';

    /** @var string  $urlMethod Recebe o parametro na URL */
    private string $urlParameter = '';

    public function __construct()
    {

        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            //Chamar a classe helper que limpa a URL
            $this->url = ClearUrl::clearUrl($this->url);

            // Converte a string da URL em um array
            $this->urlArray = explode('/', $this->url);

            // Verificar se existe a Controller na URL
            if (isset($this->urlArray[0])) {
                $this->urlcontroller = SlugController::slugController($this->urlArray[0]);
            } else {
                $this->urlcontroller = SlugController::slugController("Login");
            }

            // Verificar se existe o parametro na URL
            if (isset($this->urlArray[1])) {
                $this->urlParameter = $this->urlArray[1];
            }

            var_dump($this->urlcontroller);
            var_dump($this->urlParameter);
        } else {
            $this->urlcontroller = SlugController::slugController("Login");
        }
    }

    /**
     * Carregar a pagina/controller 
     * 
     * Instainciar a classe foi substituido pelo método estático
     *
     * @return void
     */

     public function loadPage()
     {
        // Instanciar a classe para validar e carregar a página/controller
        $loadPageAdm = new LoadPageAdm();


        // Chamar o método e enviar como parametro a controller e o parametro da URL 
        $loadPageAdm->loadPageAdm($this->urlcontroller, $this->urlParameter);
     }
}
