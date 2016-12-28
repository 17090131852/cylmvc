<?php

/* layout.html */
class __TwigTemplate_3ef485337c13b756660db02877102170ad1b30c9d8ab7539d0f34a8e7f41a174 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<body>
<header>header</header>
    <content>
        ";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 7
        echo "    </content>
<footer>footer</footer>
</body>
</html>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "        ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  28 => 7,  26 => 5,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.html", "G:\\mvc\\app\\views\\layout.html");
    }
}
