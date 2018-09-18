<?php

    namespace Framework\Routes;

    use Symfony\Component\Config\FileLocator;
	use Symfony\Component\Routing\Exception\MethodNotAllowedException;
	use Symfony\Component\Routing\Exception\ResourceNotFoundException;
	use Symfony\Component\Routing\Loader\YamlFileLoader;
    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Matcher\UrlMatcher;
    use Framework\View\Template;

    class Router
    {

        public static function run()
        {

			$fileLocator = new FileLocator(array(__DIR__.'/../../routes'));
		    $loader = new YamlFileLoader($fileLocator);
		    $routes = $loader->load(__DIR__ . '/../../routes/app.yml');

            try {
                $context = new RequestContext();
                $context->fromRequest(Request::createFromGlobals());
                $matcher = new UrlMatcher($routes, $context);
				$params = $matcher->match(strtok($_SERVER['REQUEST_URI'], '?'));

				echo call_user_func_array($params['_controller'], self::getMethodParams($params));

            } catch (ResourceNotFoundException | MethodNotAllowedException $e) {
                $template = new Template(__DIR__.'/../../views');
                echo $template->render('http-errors/error_404.html');
            }
        }

        private function getMethodParams($params)
        {
            return array_filter($params, function($key){
                return $key != "_controller" && $key != "_route";
            }, ARRAY_FILTER_USE_KEY);
        }
    }
