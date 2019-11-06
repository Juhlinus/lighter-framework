<?php

namespace App\Http\Controller;

use Twig_Environment;
use Symfony\Component\HttpFoundation\Request;

class RegularPhpFileController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(Request $request)
    {
        if (file_exists($request->server->get('DOCUMENT_ROOT') . $request->server->get('PHP_SELF'))) {
            require_once $request->server->get('DOCUMENT_ROOT') . $request->server->get('PHP_SELF');
            die();
        } else {
            return $response = new \Symfony\Component\HttpFoundation\Response(
                'Not found',
                404
            );
        }
    }
}
