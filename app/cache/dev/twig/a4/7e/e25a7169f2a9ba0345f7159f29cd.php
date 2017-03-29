<?php

/* FOSUserBundle:ChangePassword:changePassword.html.twig */
class __TwigTemplate_a47ee25a7169f2a9ba0345f7159f29cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SofidCommercantBundle::dashboard.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'titre' => array($this, 'block_titre'),
            'content' => array($this, 'block_content'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SofidCommercantBundle::dashboard.html.twig";
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
                      <li class=\"limenu\"><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dashboard"), "html", null, true);
        echo "\"><span class=\"ico gray shadow home\" ></span><b>Dashboard</b></a></li>
                      <li class=\"limenu\"><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_fideles"), "html", null, true);
        echo "\"><span class=\"ico gray shadow group\" ></span><b>Liste des Fid&egrave;les</b></a></li>
\t\t\t\t\t  <li class=\"limenu\" ><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_paliers"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow pyramid\"></span><b>Paliers</b></a></li>
\t\t\t\t\t  <li class=\"limenu\" ><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_offres"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow star\"></span><b>Offres</b></a></li>
\t\t\t\t\t  <li class=\"limenu\" ><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow administrator\"></span><b>Profil</b></a></li>
                      <li class=\"limenu select\" ><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_change_password"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow lock\"></span><b>Mot de passe</b></a></li>
                      <li class=\"limenu\" ><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sms"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow mail\"></span><b>SMS</b></a></li>
                    </ul>
              </div>          
\t\t\t  ";
    }

    // line 17
    public function block_titre($context, array $blocks = array())
    {
        echo "Changer le mot de passe";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "
\t";
        // line 21
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 26
        echo "
";
    }

    // line 21
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 22
        echo "\t
\t\t";
        // line 23
        $this->env->loadTemplate("SofidUserBundle:ChangePassword:changePassword_content.html.twig")->display($context);
        // line 24
        echo "\t
\t";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:ChangePassword:changePassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 24,  95 => 23,  92 => 22,  89 => 21,  84 => 26,  82 => 21,  79 => 20,  76 => 19,  70 => 17,  62 => 12,  58 => 11,  54 => 10,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  31 => 3,);
    }
}
