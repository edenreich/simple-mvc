<?php

/* home/index.php */
class __TwigTemplate_67ed5ea37b40a25754035899bebe1f2f99d579facf56a9b748d6c809cbb0f3e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <title>Simple MVC</title>
        <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["ASSET_ROOT"]) ? $context["ASSET_ROOT"] : null), "html", null, true);
        echo "/css/global.css\">
        <!--[if lt IE 9]>
            <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
    </head>
    <body>
        <div class=\"content\">
            <header class=\"main\">
                <h1>Welcome to the home/index view</h1>
            </header>

            <p>Below is the result of the parameters passed into the URL. You can pass in the controller and model name too. Try it...</p>

            <code>/home/index/[name]/[mood]</code>

            <p>";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo " is ";
        echo twig_escape_filter($this->env, (isset($context["mood"]) ? $context["mood"] : null), "html", null, true);
        echo "</p>
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "home/index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 21,  26 => 6,  19 => 1,);
    }
}
