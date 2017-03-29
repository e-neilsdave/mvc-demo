<?php

/* PoolBundle:Default:edit.html.twig */
class __TwigTemplate_8436681f7d860b8bb0bb86ae4d416990 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SofidCommercantBundle::dashboard.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'titre' => array($this, 'block_titre'),
            'content' => array($this, 'block_content'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData")), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        \$(function () {
            \$('input').tipsy({fade: true, gravity: 'w'});
            \$('#add').on('click', function(){

            });

            \$(\"#submit\").click(function() {

                loading('Checking');
                \$('#preloader').html('Envoi...');

                var question_title = \$(\"#question_title\").val();
                var question_id = \$(\"#question_id\").val();
                var completion_point = \$(\"#completion_point\").val();
                var comment_point = \$(\"#comment_point\").val();
                var delay = \$(\"#delay\").val();
                var divided_value = \$(\"#divided_value\").val();
                var delayed_customer_message = \$(\"#delayed_customer_message\").val();
                var delayed_thanks_message = \$(\"#delayed_thanks_message\").val();
                var option_title = \$('input[name=\"option_title[]\"]').map(function () {
                    return \$(this).val();
                }).get();

                if(\$('input[name=\"is_active\"]:checked').length > 0) {
                    var is_active = 1;
                } else {
                    var is_active = 0;
                }

                \$.ajax({
                    url: Routing.generate('pool_edit'),
                    type: 'POST',
                    data: { question_title: question_title, option_title: option_title,
                            comment_point: comment_point, completion_point: completion_point,
                            delay: delay, divided_value: divided_value, delayed_customer_message: delayed_customer_message,
                            delayed_thanks_message: delayed_thanks_message, question_id: question_id, is_active: is_active},

                    success: function(data, textStatus, xhr) {
                        if (data.error)
                        {
                            if (data.error == \"2\")
                            {
                                showError('Aucun fid&egrave;le',5000);
                            }else
                            {
                                showError('Echec',5000);
                            }
                            unloading();
                        }else {
                            showSuccess('Succ&egrave;s',5000);
                            unloading();
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        unloading();
                    }
                });
            });

        });
    </script>
";
    }

    // line 71
    public function block_titre($context, array $blocks = array())
    {
        echo "Satisfaction";
    }

    // line 73
    public function block_content($context, array $blocks = array())
    {
        // line 74
        echo "
    <form action=\"\" method=\"POST\" id=\"validation_demo\">

        <!-- Third / Half column-->
        <div class=\"widgets\">
            <div class=\"oneThree\">
            </div>

            <div class=\"twoOne\">

                <div class=\"section \">
                    <input type=\"hidden\" name=\"question_id\" id=\"question_id\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "id"), "html", null, true);
        echo "\" />

                    <label>Phrase d’introduction</label>
                    <div class=\"controls\"><input name=\"question_title\" id=\"question_title\" type=\"text\" value=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "title"), "html", null, true);
        echo "\" title=\"Hint: Quelle est votre opinion au sujet de:\" /></div>

                    <label>Nombre de points gagnés pour la soumission</label>
                    <div class=\"controls\"><input name=\"completion_point\" id=\"completion_point\" type=\"text\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "completionPoint"), "html", null, true);
        echo "\" title=\"Hint: 5\" /></div>

                    <label>Points gagnés par commentaire laissé</label>
                    <div class=\"controls\"><input name=\"comment_point\" id=\"comment_point\" type=\"text\" value=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "commentPoint"), "html", null, true);
        echo "\" title=\"Hint: 2\" /></div>

                    ";
        // line 96
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "question"), "option"));
        foreach ($context['_seq'] as $context["key"] => $context["option"]) {
            // line 97
            echo "                    <label>Elément évalué no. ";
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "</label>
                    <div class=\"controls\">
                        <input name=\"option_title[]\" id=\"option_title_";
            // line 99
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "\" type=\"text\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "option"), "title"), "html", null, true);
            echo "\" title=\"Hint: L’accueil\" />
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                </div>
                <div class=\"section\">
                    <label>Delai de re-soumission</label>
                    <div class=\"controls\"><input name=\"delay\" id=\"delay\" value=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "delay"), "html", null, true);
        echo "\" type=\"text\" title=\"Hint: 10 days\" /></div>

                    <label>Dénominateur de re-soumission</label>
                    <div class=\"controls\"><input name=\"divided_value\" id=\"divided_value\" type=\"text\" value=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "dividedValue"), "html", null, true);
        echo "\" title=\"Hint: 5\" /></div>

                    <label>Message d’information de re-soumission</label>
                    <div class=\"controls\"><input name=\"delayed_customer_message\" id=\"delayed_customer_message\" type=\"text\" value=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "delayedCustomerMessage"), "html", null, true);
        echo "\" title=\"Hint: are you want to pool?\" /></div>

                    <label>Message en cas de re-soumission</label>
                    <div class=\"controls\"><input name=\"delayed_thanks_message\" id=\"delayed_thanks_message\" type=\"text\" value=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "question"), "delayedThanksMessage"), "html", null, true);
        echo "\" title=\"Hint: are you want to pool?\" /></div>
                </div>

                <div class=\"section last\">
                    <input type=\"checkbox\" name=\"is_active\" id=\"is_active\" ";
        // line 118
        if (($this->getAttribute($this->getContext($context, "question"), "isActive") == 1)) {
            echo " checked ";
        }
        echo " /> <b>Actif</b>
                </div>

                <div class=\"section last\">
                    <input type=\"button\" value=\"confirmer\" class=\"uibutton submit_form\" id=\"submit\" />
                </div>

            </div><!-- End Third / Half column-->
        </div>
    </form>

";
    }

    public function getTemplateName()
    {
        return "PoolBundle:Default:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 118,  199 => 114,  193 => 111,  187 => 108,  181 => 105,  176 => 102,  165 => 99,  159 => 97,  155 => 96,  150 => 94,  144 => 91,  138 => 88,  132 => 85,  119 => 74,  116 => 73,  110 => 71,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
