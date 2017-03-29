<?php

/* SofidFideleBundle:Security:login.html.twig */
class __TwigTemplate_aeabcb276c0b37be99c61852a3da1813 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SofidFideleBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SofidFideleBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"alertMessage\"></div>
<div id=\"successLogin\"></div>
<div class=\"text_success\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/loadder/loader_green.gif"), "html", null, true);
        echo "\"  alt=\"SoFID\" /><span>Veuillez patienter</span></div>

<div id=\"login\">
  <div class=\"inner\">
  <div class=\"logo\" ><img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/logo/logo.png"), "html", null, true);
        echo "\" alt=\"SoFID\" /></div>
  
  ";
        // line 13
        if ($this->getContext($context, "error")) {
            // line 14
            echo "    <div align=\"center\">Email ou Mot de passe incorrect!</div>
  ";
        }
        // line 16
        echo "  ";
        if (array_key_exists("sms", $context)) {
            // line 17
            echo "    <div align=\"center\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "sms"), "html", null, true);
            echo "</div>
  ";
        }
        // line 19
        echo "
      <div class=\"formLogin\">

          <form action=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("authenticate_fidele"), "html", null, true);
        echo "\" method=\"post\" name=\"formLogin\" id=\"formLogin\">

              ";
        // line 25
        echo "              <div class=\"tip\">
                  <input type=\"text\" id=\"username_id\" name=\"login\" required=\"required\" title=\"Email\"/>
              </div>
              ";
        // line 29
        echo "              <div class=\"tip\">
                  <input type=\"password\" id=\"password\" name=\"pass\" required=\"required\" title=\"Mot de Passe\"/>
              </div>

              <div class=\"loginButton\">
                  <div style=\"float:left; margin-left:-9px;\">
                      <input type=\"checkbox\" id=\"on_off\" name=\"_remember_me\" class=\"on_off_checkbox\" value=\"1\"/>
                  </div>
                  <div style=\"float:right; padding:3px 0; margin-right:-12px;\">
                      <div>
                          <ul class=\"uibutton-group\">
                              <li><input type=\"submit\" id=\"_submit\" name=\"_submit\"
                                         value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\"/></li>
                              ";
        // line 43
        echo "
                          </ul>
                      </div>
                  </div>
                  <div class=\"clear\"></div>
                  <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("forgotten_fidele"), "html", null, true);
        echo "\">J'ai oubli&eacute; mon mot de passe</a>
              </div>

          </form>
      </div>
  </div>
    <div class=\"clear\"></div>
    <div class=\"shadow\"></div>
</div>

<div class=\"clear\"></div>
<div class=\"shadow\"></div>

    <!--Login div-->
<div class=\"clear\"></div>

";
    }

    public function getTemplateName()
    {
        return "SofidFideleBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 48,  96 => 43,  92 => 41,  78 => 29,  73 => 25,  68 => 22,  63 => 19,  57 => 17,  54 => 16,  50 => 14,  48 => 13,  43 => 11,  36 => 7,  31 => 4,  28 => 3,);
    }
}
