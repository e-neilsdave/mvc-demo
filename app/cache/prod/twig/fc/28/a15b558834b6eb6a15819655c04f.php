<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_fc28a15b558834b6eb6a15819655c04f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"alertMessage\"></div>
<div id=\"successLogin\"></div>
<div class=\"text_success\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/loadder/loader_green.gif"), "html", null, true);
        echo "\"  alt=\"SoFID\" /><span>Veuillez patienter</span></div>

<div id=\"login\" >
";
        // line 11
        echo "  <div class=\"inner\">
  <div class=\"logo\" ><img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/logo/logo.png"), "html", null, true);
        echo "\" alt=\"SoFID\" /></div>
  
";
        // line 14
        if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
        if ($_error_) {
            // line 15
            echo "    <div align=\"center\">";
            if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($_error_, array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
";
        }
        // line 17
        echo "  
  <div class=\"formLogin\">
  
  <form action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\" name=\"formLogin\"  id=\"formLogin\">
    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 21
        if (isset($context["csrf_token"])) { $_csrf_token_ = $context["csrf_token"]; } else { $_csrf_token_ = null; }
        echo twig_escape_filter($this->env, $_csrf_token_, "html", null, true);
        echo "\" />

";
        // line 24
        echo "    <div class=\"tip\">
    \t<input type=\"text\" id=\"username_id\" name=\"_username\" required=\"required\" title=\"Username\"  />
\t</div>
";
        // line 28
        echo "    <div class=\"tip\">
    \t<input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" title=\"Password\" />
    </div>

    <div class=\"loginButton\">
        <div style=\"float:left; margin-left:-9px;\">
\t\t   <input type=\"checkbox\" id=\"on_off\" name=\"_remember_me\" class=\"on_off_checkbox\"  value=\"1\" />
\t\t   <span class=\"f_help\">";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
\t    </div>
\t\t<div style=\"float:right; padding:3px 0; margin-right:-12px;\">
            <div> 
                <ul class=\"uibutton-group\">
                   <li><input type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" /></li>
";
        // line 42
        echo "
               </ul>
            </div>
\t\t\t  
        </div>
\t\t\t<div class=\"clear\"></div>
\t</div>
  </form>
  </div>
</div>
  <div class=\"clear\"></div>
  <div class=\"shadow\"></div>
</div>

<!--Login div-->
<div class=\"clear\"></div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 42,  97 => 40,  89 => 35,  80 => 28,  75 => 24,  69 => 21,  65 => 20,  60 => 17,  53 => 15,  50 => 14,  45 => 12,  42 => 11,  36 => 7,  31 => 4,  28 => 3,);
    }
}
