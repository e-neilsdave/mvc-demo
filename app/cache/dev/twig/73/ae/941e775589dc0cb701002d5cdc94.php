<?php

/* SofidFideleBundle:Profile:show.html.twig */
class __TwigTemplate_73ae941e775589dc0cb701002d5cdc94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SofidFideleBundle::dashboard.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'titre' => array($this, 'block_titre'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SofidFideleBundle::dashboard.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_menu($context, array $blocks = array())
    {
        echo "   
              <div id=\"left_menu\">
                    <ul id=\"main_menu\" class=\"main_menu\">
                      <li class=\"limenu select\"><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("home_fidele"), "html", null, true);
        echo "\"><span class=\"ico gray shadow home\" ></span><b>Accueil</b></a></li>
\t\t\t\t\t  <li class=\"limenu\" ><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edit_fidele"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow administrator\"></span><b>Profil</b></a></li>
\t\t\t\t\t  <li class=\"limenu\" ><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customeroptin_fidele"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow communication\"></span><b>Communications</b></a></li>
\t\t\t\t  </ul>
              </div>          
";
    }

    // line 13
    public function block_titre($context, array $blocks = array())
    {
        echo "Accueil";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "
\t\t";
        // line 17
        $this->env->loadTemplate("SofidFideleBundle:Profile:show_content.html.twig")->display($context);
        // line 18
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "SofidFideleBundle:Profile:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 18,  65 => 17,  62 => 16,  59 => 15,  53 => 13,  45 => 8,  41 => 7,  37 => 6,  30 => 3,);
    }
}
