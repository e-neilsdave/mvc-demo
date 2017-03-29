<?php

/* SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig */
class __TwigTemplate_395de30704e46b5aa9b3af8ca2541751 extends Twig_Template
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
        // line 11
        echo "

";
        // line 18
        echo "
";
        // line 20
        echo "
";
        // line 21
        $context["associationadmin"] = $this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin");
        // line 22
        echo "
<!-- edit many association -->

<script type=\"text/javascript\">

    ";
        // line 32
        echo "    var field_dialog_form_list_link_";
        echo $this->getContext($context, "id");
        echo " = function(event) {
        initialize_popup_";
        // line 33
        echo $this->getContext($context, "id");
        echo "();

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 38
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list_link] handle link click in a list');

        var element = jQuery(this).parents('#field_dialog_";
        // line 40
        echo $this->getContext($context, "id");
        echo " .sonata-ba-list-field');

        // the user does click on a row column
        if (element.length == 0) {
            // make a recursive call (ie: reset the filter)
            jQuery.ajax({
                type: 'GET',
                url: jQuery(this).attr('href'),
                success: function(html) {
                    Admin.log('[";
        // line 49
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list_link] callback success, attach valid js event');

                    field_dialog_";
        // line 51
        echo $this->getContext($context, "id");
        echo ".html(html);
                    field_dialog_form_list_handle_action_";
        // line 52
        echo $this->getContext($context, "id");
        echo "();
                }
            });

            return;
        }

        jQuery('#";
        // line 59
        echo $this->getContext($context, "id");
        echo "').val(element.attr('objectId'));
        jQuery('#";
        // line 60
        echo $this->getContext($context, "id");
        echo "').trigger('change');

        field_dialog_";
        // line 62
        echo $this->getContext($context, "id");
        echo ".dialog('close');
    }

    // this function handle action on the modal list when inside a selected list
    var field_dialog_form_list_handle_action_";
        // line 66
        echo $this->getContext($context, "id");
        echo "  =  function() {

        Admin.log('[";
        // line 68
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list_handle_action] attaching valid js event');

        Admin.add_filters(field_dialog_";
        // line 70
        echo $this->getContext($context, "id");
        echo ");

        // capture the submit event to make an ajax call, ie : POST data to the
        // related create admin
        jQuery('a', field_dialog_";
        // line 74
        echo $this->getContext($context, "id");
        echo ").on('click', field_dialog_form_list_link_";
        echo $this->getContext($context, "id");
        echo ");
        jQuery('form', field_dialog_";
        // line 75
        echo $this->getContext($context, "id");
        echo ").on('submit', function(event) {
            event.preventDefault();

            var form = jQuery(this);

            Admin.log('[";
        // line 80
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list_handle_action] catching submit event, sending ajax request');

            jQuery(form).ajaxSubmit({
                type: form.attr('method'),
                url: form.attr('action'),
                dataType: 'html',
                data: {_xml_http_request: true},
                success: function(html) {

                    Admin.log('[";
        // line 89
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list_handle_action] form submit success, restoring event');

                    field_dialog_";
        // line 91
        echo $this->getContext($context, "id");
        echo ".html(html);
                    field_dialog_form_list_handle_action_";
        // line 92
        echo $this->getContext($context, "id");
        echo "();
                }
            });
        });
    }

    // handle the add link
    var field_dialog_form_list_";
        // line 99
        echo $this->getContext($context, "id");
        echo " = function(event) {

        initialize_popup_";
        // line 101
        echo $this->getContext($context, "id");
        echo "();

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 106
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list] open the list modal');

        var a = jQuery(this);

        field_dialog_";
        // line 110
        echo $this->getContext($context, "id");
        echo ".html('');

        // retrieve the form element from the related admin generator
        jQuery.ajax({
            url: a.attr('href'),
            dataType: 'html',
            success: function(html) {

                Admin.log('[";
        // line 118
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list] retrieving the list content');

                // populate the popup container
                field_dialog_";
        // line 121
        echo $this->getContext($context, "id");
        echo ".html(html);

                Admin.add_filters(field_dialog_";
        // line 123
        echo $this->getContext($context, "id");
        echo ");

                field_dialog_form_list_handle_action_";
        // line 125
        echo $this->getContext($context, "id");
        echo "();

                // open the dialog in modal mode
                field_dialog_";
        // line 128
        echo $this->getContext($context, "id");
        echo ".dialog({
                    height: 'auto',
                    width: 980,
                    modal: true,
                    resizable: true,
                    title: '";
        // line 133
        echo $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "associationadmin"), "label"), array(), $this->getAttribute($this->getContext($context, "associationadmin"), "translationdomain"));
        echo "',
                    close: function(event, ui) {
                        Admin.log('[";
        // line 135
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_list] close callback, removing js event');

                        // make sure we have a clean state
                        jQuery('a', field_dialog_";
        // line 138
        echo $this->getContext($context, "id");
        echo ").off('click');
                        jQuery('form', field_dialog_";
        // line 139
        echo $this->getContext($context, "id");
        echo ").off('submit');
                    },
                    zIndex: 9998
                });
            }
        });
    };

    // handle the add link
    var field_dialog_form_add_";
        // line 148
        echo $this->getContext($context, "id");
        echo " = function(event) {
        initialize_popup_";
        // line 149
        echo $this->getContext($context, "id");
        echo "();

        event.preventDefault();
        event.stopPropagation();

        var a = jQuery(this);

        field_dialog_";
        // line 156
        echo $this->getContext($context, "id");
        echo ".html('');

        Admin.log('[";
        // line 158
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_add] add link action');

        // retrieve the form element from the related admin generator
        jQuery.ajax({
            url: a.attr('href'),
            dataType: 'html',
            success: function(html) {

                Admin.log('[";
        // line 166
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_add] ajax success', field_dialog_";
        echo $this->getContext($context, "id");
        echo ");

                // populate the popup container
                field_dialog_";
        // line 169
        echo $this->getContext($context, "id");
        echo ".html(html);

                // capture the submit event to make an ajax call, ie : POST data to the
                // related create admin
                jQuery('a', field_dialog_";
        // line 173
        echo $this->getContext($context, "id");
        echo ").on('click', field_dialog_form_action_";
        echo $this->getContext($context, "id");
        echo ");
                jQuery('form', field_dialog_";
        // line 174
        echo $this->getContext($context, "id");
        echo ").on('submit', field_dialog_form_action_";
        echo $this->getContext($context, "id");
        echo ");

                // open the dialog in modal mode
                field_dialog_";
        // line 177
        echo $this->getContext($context, "id");
        echo ".dialog({
                    height: 'auto',
                    width: 850,
                    modal: true,
                    autoOpen: true,
                    resizable: true,
                    title: '";
        // line 183
        echo $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "associationadmin"), "label"), array(), $this->getAttribute($this->getContext($context, "associationadmin"), "translationdomain"));
        echo "',
                    close: function(event, ui) {
                        Admin.log('[";
        // line 185
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_add] dialog closed - removing  events');
                        // make sure we have a clean state
                        jQuery('a', field_dialog_";
        // line 187
        echo $this->getContext($context, "id");
        echo ").off('click');
                        jQuery('form', field_dialog_";
        // line 188
        echo $this->getContext($context, "id");
        echo ").off('submit');
                    },
                    zIndex: 9998
                });
            }
        });
    };

    // handle the post data
    var field_dialog_form_action_";
        // line 197
        echo $this->getContext($context, "id");
        echo " = function(event) {

        var element = jQuery(this);

        // return if the link is an anchor inside the same page
        if (this.nodeName == 'A' && (element.attr('href').length == 0 || element.attr('href')[0] == '#')) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 209
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_action] action catch', this);

        initialize_popup_";
        // line 211
        echo $this->getContext($context, "id");
        echo "();

        if (this.nodeName == 'FORM') {
            var url  = element.attr('action');
            var type = element.attr('method');
        } else if (this.nodeName == 'A') {
            var url  = element.attr('href');
            var type = 'GET';
        } else {
            alert('unexpected element : @' + this.nodeName + '@');
            return;
        }

        if (element.hasClass('sonata-ba-action')) {
            Admin.log('[";
        // line 225
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_action] reserved action stop catch all events');
            return;
        }

        var data = {
            _xml_http_request: true
        }

        var form = jQuery(this);

        Admin.log('[";
        // line 235
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_action] execute ajax call');

        // the ajax post
        jQuery(form).ajaxSubmit({
            url: url,
            type: type,
            data: data,
            success: function(data) {

                Admin.log('[";
        // line 244
        echo $this->getContext($context, "id");
        echo "|field_dialog_form_action] ajax success');

                if (typeof data == 'string') {
                    field_dialog_";
        // line 247
        echo $this->getContext($context, "id");
        echo ".html(data);
                    return;
                };

                // if the crud action return ok, then the element has been added
                // so the widget container must be refresh with the last option available
                if (data.result == 'ok') {
                    field_dialog_";
        // line 254
        echo $this->getContext($context, "id");
        echo ".dialog('close');

                    ";
        // line 256
        if (($this->getAttribute($this->getContext($context, "sonata_admin"), "edit") == "list")) {
            // line 257
            echo "                        ";
            // line 261
            echo "                        jQuery('#";
            echo $this->getContext($context, "id");
            echo "').val(data.objectId);
                        jQuery('#";
            // line 262
            echo $this->getContext($context, "id");
            echo "').change();

                    ";
        } else {
            // line 265
            echo "
                        // reload the form element
                        jQuery('#field_widget_";
            // line 267
            echo $this->getContext($context, "id");
            echo "').closest('form').ajaxSubmit({
                            url: '";
            // line 268
            echo $this->env->getExtension('routing')->getUrl("sonata_admin_retrieve_form_element", array("elementId" => $this->getContext($context, "id"), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "subject")), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "uniqid"), "code" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "code")));
            // line 273
            echo "',
                            data: {_xml_http_request: true },
                            type: 'POST',
                            success: function(html) {
                                jQuery('#field_container_";
            // line 277
            echo $this->getContext($context, "id");
            echo "').replaceWith(html);
                                var newElement = jQuery('#";
            // line 278
            echo $this->getContext($context, "id");
            echo " [value=\"' + data.objectId + '\"]');
                                if (newElement.is(\"input\")) {
                                    newElement.attr('checked', 'checked');
                                } else {
                                    newElement.attr('selected', 'selected');
                                }

                                jQuery('#field_container_";
            // line 285
            echo $this->getContext($context, "id");
            echo "').trigger('sonata-admin-append-form-element');
                            }
                        });

                    ";
        }
        // line 290
        echo "
                    return;
                }

                // otherwise, display form error
                field_dialog_";
        // line 295
        echo $this->getContext($context, "id");
        echo ".html(html);

                Admin.add_pretty_errors(field_dialog_";
        // line 297
        echo $this->getContext($context, "id");
        echo ");

                // reattach the event
                jQuery('form', field_dialog_";
        // line 300
        echo $this->getContext($context, "id");
        echo ").submit(field_dialog_form_action_";
        echo $this->getContext($context, "id");
        echo ");
            }
        });

        return false;
    }

    var field_dialog_";
        // line 307
        echo $this->getContext($context, "id");
        echo " = false;

    function initialize_popup_";
        // line 309
        echo $this->getContext($context, "id");
        echo "() {
        // initialize component
        if (!field_dialog_";
        // line 311
        echo $this->getContext($context, "id");
        echo ") {
            field_dialog_";
        // line 312
        echo $this->getContext($context, "id");
        echo " = jQuery(\"#field_dialog_";
        echo $this->getContext($context, "id");
        echo "\");

            // move the dialog as a child of the root element, nested form breaks html ...
            jQuery(document.body).append(field_dialog_";
        // line 315
        echo $this->getContext($context, "id");
        echo ");

            Admin.log('[";
        // line 317
        echo $this->getContext($context, "id");
        echo "|field_dialog] move dialog container as a document child');
        }
    }

    ";
        // line 324
        echo "    // this function initialize the popup
    // this can be only done this way has popup can be cascaded
    function start_field_dialog_form_add_";
        // line 326
        echo $this->getContext($context, "id");
        echo "(link) {

        // remove the html event
        link.onclick = null;

        initialize_popup_";
        // line 331
        echo $this->getContext($context, "id");
        echo "();

        // add the jQuery event to the a element
        jQuery(link)
            .click(field_dialog_form_add_";
        // line 335
        echo $this->getContext($context, "id");
        echo ")
            .trigger('click')
        ;

        return false;
    }

    Admin.add_pretty_errors(field_dialog_";
        // line 342
        echo $this->getContext($context, "id");
        echo ");


    ";
        // line 345
        if (($this->getAttribute($this->getContext($context, "sonata_admin"), "edit") == "list")) {
            // line 346
            echo "        ";
            // line 349
            echo "        // this function initialize the popup
        // this can be only done this way has popup can be cascaded
        function start_field_dialog_form_list_";
            // line 351
            echo $this->getContext($context, "id");
            echo "(link) {

            link.onclick = null;

            initialize_popup_";
            // line 355
            echo $this->getContext($context, "id");
            echo "();

            // add the jQuery event to the a element
            jQuery(link)
                .click(field_dialog_form_list_";
            // line 359
            echo $this->getContext($context, "id");
            echo ")
                .trigger('click')
            ;

            return false;
        }

        function remove_selected_element_";
            // line 366
            echo $this->getContext($context, "id");
            echo "(link) {

            link.onclick = null;

            jQuery(link)
                .click(field_remove_element_";
            // line 371
            echo $this->getContext($context, "id");
            echo ")
                .trigger('click')
            ;

            return false;
        }

        function field_remove_element_";
            // line 378
            echo $this->getContext($context, "id");
            echo "(event) {
            event.preventDefault();

            if (jQuery('#";
            // line 381
            echo $this->getContext($context, "id");
            echo " option').get(0)) {
                jQuery('#";
            // line 382
            echo $this->getContext($context, "id");
            echo "').attr('selectedIndex', '-1').children(\"option:selected\").attr(\"selected\", false);
            }

            jQuery('#";
            // line 385
            echo $this->getContext($context, "id");
            echo "').val('');
            jQuery('#";
            // line 386
            echo $this->getContext($context, "id");
            echo "').trigger('change');

            return false;
        }
        ";
            // line 393
            echo "
        // update the label
        jQuery('#";
            // line 395
            echo $this->getContext($context, "id");
            echo "').on('change', function(event) {

            Admin.log('[";
            // line 397
            echo $this->getContext($context, "id");
            echo "] update the label');

            jQuery('#field_widget_";
            // line 399
            echo $this->getContext($context, "id");
            echo "').html(\"<span><img src=\\\"";
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/ajax-loader.gif");
            echo "\\\" style=\\\"vertical-align: middle; margin-right: 10px\\\"/>";
            echo $this->env->getExtension('translator')->trans("loading_information", array(), "SonataAdminBundle");
            echo "</span>\");
            jQuery.ajax({
                type: 'GET',
                url: '";
            // line 402
            echo $this->env->getExtension('routing')->getUrl("sonata_admin_short_object_information", array("objectId" => "OBJECT_ID", "uniqid" => $this->getAttribute($this->getContext($context, "associationadmin"), "uniqid"), "code" => $this->getAttribute($this->getContext($context, "associationadmin"), "code")));
            // line 406
            echo "'.replace('OBJECT_ID', jQuery(this).val()),
                success: function(html) {
                    jQuery('#field_widget_";
            // line 408
            echo $this->getContext($context, "id");
            echo "').html(html);
                }
            });
        });

    ";
        }
        // line 414
        echo "

</script>
<!-- / edit many association -->

";
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  698 => 414,  689 => 408,  685 => 406,  683 => 402,  673 => 399,  668 => 397,  663 => 395,  652 => 386,  648 => 385,  638 => 381,  632 => 378,  622 => 371,  614 => 366,  604 => 359,  597 => 355,  586 => 349,  584 => 346,  582 => 345,  576 => 342,  559 => 331,  551 => 326,  547 => 324,  540 => 317,  535 => 315,  527 => 312,  523 => 311,  518 => 309,  513 => 307,  501 => 300,  490 => 295,  483 => 290,  465 => 278,  461 => 277,  455 => 273,  449 => 267,  445 => 265,  439 => 262,  434 => 261,  430 => 256,  425 => 254,  415 => 247,  409 => 244,  397 => 235,  384 => 225,  367 => 211,  326 => 185,  253 => 148,  231 => 135,  226 => 133,  212 => 125,  165 => 99,  134 => 80,  126 => 75,  108 => 68,  103 => 66,  96 => 62,  31 => 22,  48 => 40,  399 => 158,  396 => 157,  394 => 156,  387 => 152,  383 => 150,  362 => 209,  357 => 139,  352 => 138,  348 => 136,  345 => 135,  342 => 133,  325 => 125,  308 => 118,  276 => 102,  273 => 101,  270 => 100,  267 => 156,  245 => 88,  237 => 138,  234 => 84,  232 => 83,  218 => 128,  214 => 75,  202 => 121,  196 => 118,  193 => 70,  182 => 64,  177 => 63,  170 => 101,  162 => 57,  155 => 92,  148 => 53,  142 => 50,  130 => 46,  127 => 45,  125 => 44,  119 => 42,  117 => 41,  106 => 40,  102 => 39,  99 => 38,  73 => 51,  36 => 16,  26 => 20,  21 => 12,  19 => 11,  686 => 206,  680 => 203,  677 => 202,  675 => 201,  669 => 198,  659 => 393,  654 => 195,  642 => 382,  639 => 192,  636 => 191,  627 => 185,  624 => 184,  607 => 182,  590 => 351,  585 => 179,  581 => 178,  578 => 177,  575 => 176,  572 => 175,  566 => 335,  562 => 169,  560 => 168,  555 => 167,  538 => 165,  521 => 164,  517 => 163,  512 => 162,  509 => 161,  506 => 160,  503 => 159,  500 => 158,  498 => 157,  495 => 297,  486 => 151,  482 => 149,  480 => 148,  477 => 147,  475 => 285,  472 => 145,  468 => 125,  462 => 123,  456 => 121,  453 => 268,  450 => 119,  443 => 140,  437 => 138,  435 => 137,  432 => 257,  426 => 133,  423 => 132,  421 => 131,  416 => 129,  405 => 127,  402 => 126,  400 => 119,  391 => 118,  386 => 115,  380 => 112,  377 => 147,  375 => 110,  371 => 144,  366 => 142,  359 => 140,  356 => 105,  353 => 104,  343 => 98,  340 => 97,  337 => 96,  331 => 187,  329 => 126,  324 => 92,  321 => 183,  318 => 90,  312 => 177,  298 => 173,  289 => 109,  286 => 80,  282 => 79,  274 => 77,  272 => 158,  269 => 75,  263 => 71,  250 => 67,  243 => 65,  238 => 64,  236 => 63,  228 => 59,  208 => 74,  203 => 56,  197 => 54,  191 => 69,  184 => 47,  175 => 43,  157 => 41,  152 => 38,  146 => 89,  139 => 49,  118 => 28,  107 => 24,  101 => 71,  95 => 37,  90 => 34,  87 => 59,  84 => 62,  81 => 15,  76 => 13,  64 => 26,  57 => 145,  52 => 21,  47 => 19,  44 => 74,  42 => 62,  39 => 17,  34 => 26,  303 => 139,  297 => 137,  294 => 111,  291 => 169,  259 => 123,  256 => 122,  251 => 120,  247 => 66,  239 => 86,  233 => 62,  227 => 80,  221 => 78,  215 => 99,  210 => 97,  207 => 123,  205 => 95,  200 => 55,  194 => 89,  183 => 84,  178 => 106,  173 => 62,  167 => 60,  161 => 75,  156 => 73,  151 => 91,  149 => 36,  144 => 33,  141 => 67,  138 => 61,  136 => 48,  132 => 59,  123 => 30,  120 => 74,  112 => 26,  110 => 25,  104 => 23,  98 => 21,  92 => 67,  86 => 43,  78 => 30,  75 => 39,  72 => 191,  70 => 33,  67 => 51,  62 => 156,  59 => 155,  54 => 144,  51 => 38,  38 => 32,  347 => 197,  344 => 91,  339 => 89,  335 => 188,  330 => 87,  327 => 86,  320 => 84,  315 => 83,  313 => 82,  310 => 87,  304 => 174,  302 => 86,  296 => 76,  293 => 75,  287 => 72,  283 => 166,  280 => 69,  277 => 78,  271 => 127,  265 => 125,  262 => 63,  260 => 94,  257 => 149,  254 => 91,  249 => 89,  246 => 54,  241 => 139,  223 => 58,  216 => 25,  209 => 24,  192 => 23,  188 => 68,  185 => 110,  180 => 96,  176 => 82,  174 => 60,  169 => 58,  166 => 57,  164 => 54,  160 => 52,  143 => 48,  137 => 47,  131 => 45,  128 => 58,  124 => 43,  121 => 29,  115 => 27,  113 => 70,  100 => 36,  83 => 35,  79 => 14,  68 => 49,  65 => 15,  60 => 25,  56 => 40,  40 => 6,  37 => 54,  35 => 16,  32 => 13,  29 => 21,  23 => 18,  94 => 36,  91 => 60,  85 => 31,  80 => 41,  77 => 52,  74 => 19,  71 => 25,  69 => 190,  66 => 23,  63 => 50,  55 => 45,  49 => 20,  46 => 35,  43 => 33,  12 => 33,);
    }
}
