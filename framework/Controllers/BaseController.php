<?php

namespace Framework\Controllers;

use Framework\View\Template;

class BaseController
{

    protected static function render(string $pathTeplate, array $params = []): string
    {
        $template = new Template(__DIR__.'/../../views');
        return $template->render($pathTeplate, $params);
    }

	protected static function renderJson(array $params = [], int $responseCode = 200): string
	{
		header('Content-Type: application/json; charset=utf-8');
		header('Aceept: application/json;');
		http_response_code($responseCode);
		return json_encode($params);
	}
}
