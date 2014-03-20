<?php

/* MopaBootstrapBundle:Form:fields.html.twig */
class __TwigTemplate_2d150a3bd3a7e02ad88ab822316c6c9fc9fb8c79434f350736dcdaec9fe6237f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'button_attributes' => array($this, 'block_button_attributes'),
            'button_widget' => array($this, 'block_button_widget'),
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'form_widget_compound' => array($this, 'block_form_widget_compound'),
            'form_tabs' => array($this, 'block_form_tabs'),
            'tabs_widget' => array($this, 'block_tabs_widget'),
            'form_tab' => array($this, 'block_form_tab'),
            'collection_widget' => array($this, 'block_collection_widget'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'date_widget' => array($this, 'block_date_widget'),
            'time_widget' => array($this, 'block_time_widget'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'percent_widget' => array($this, 'block_percent_widget'),
            'money_widget' => array($this, 'block_money_widget'),
            'file_widget' => array($this, 'block_file_widget'),
            'form_legend' => array($this, 'block_form_legend'),
            'form_label' => array($this, 'block_form_label'),
            'help_label' => array($this, 'block_help_label'),
            'help_label_tooltip' => array($this, 'block_help_label_tooltip'),
            'help_label_popover' => array($this, 'block_help_label_popover'),
            'form_rows_visible' => array($this, 'block_form_rows_visible'),
            'form_row' => array($this, 'block_form_row'),
            'form_message' => array($this, 'block_form_message'),
            'form_help' => array($this, 'block_form_help'),
            'form_widget_add_btn' => array($this, 'block_form_widget_add_btn'),
            'form_widget_remove_btn' => array($this, 'block_form_widget_remove_btn'),
            'collection_button' => array($this, 'block_collection_button'),
            'label_asterisk' => array($this, 'block_label_asterisk'),
            'widget_addon' => array($this, 'block_widget_addon'),
            'form_errors' => array($this, 'block_form_errors'),
            'error_type' => array($this, 'block_error_type'),
            'widget_form_group_start' => array($this, 'block_widget_form_group_start'),
            'help_widget_popover' => array($this, 'block_help_widget_popover'),
            'widget_form_group_end' => array($this, 'block_widget_form_group_end'),
            'form_widget' => array($this, 'block_form_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_button_attributes($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ("btn " . (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : ("")))));
        // line 6
        echo "    ";
        $this->displayParentBlock("button_attributes", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_button_widget($context, array $blocks = array())
    {
        // line 10
        ob_start();
        // line 11
        echo "    ";
        if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
            // line 12
            echo "        ";
            $context["label"] = call_user_func_array($this->env->getFilter('humanize')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))));
            // line 13
            echo "    ";
        }
        // line 14
        echo "    <button type=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "button")) : ("button")), "html", null, true);
        echo "\" ";
        $this->displayBlock("button_attributes", $context, $blocks);
        echo ">
    ";
        // line 15
        if ((!twig_test_empty((isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon"))))) {
            echo " <span class=\"glyphicon glyphicon-";
            echo twig_escape_filter($this->env, (isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")), "html", null, true);
            echo "\"";
            if ((!twig_test_empty((isset($context["icon_color"]) ? $context["icon_color"] : $this->getContext($context, "icon_color"))))) {
                echo " style=\"color: ";
                echo twig_escape_filter($this->env, (isset($context["icon_color"]) ? $context["icon_color"] : $this->getContext($context, "icon_color")), "html", null, true);
                echo ";\" ";
            }
            echo " ></span> ";
        }
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "</button>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 21
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : ("")) . " form-control")));
        // line 23
        echo "    ";
        if (((!(isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline"))) && (isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")))) {
            // line 24
            echo "        ";
            if ((!(isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render")))) {
                // line 25
                echo "        ";
                $context["horizontal_input_wrapper_class"] = (((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")) . " ") . (isset($context["horizontal_label_offset_class"]) ? $context["horizontal_label_offset_class"] : $this->getContext($context, "horizontal_label_offset_class")));
                // line 26
                echo "        ";
            }
            // line 27
            echo "        <div class=\"";
            echo twig_escape_filter($this->env, (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "html", null, true);
            echo "\">
    ";
        }
        // line 29
        echo "    ";
        $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
        echo "
    ";
        // line 30
        if (((!(isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline"))) && (isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")))) {
            // line 31
            echo "            ";
            $this->displayBlock("form_message", $context, $blocks);
            echo "
        </div>
    ";
        }
    }

    // line 36
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 37
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : ("")) . " form-control")));
        // line 38
        echo "    ";
        if (((!(isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline"))) && (isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")))) {
            // line 39
            echo "    ";
            if ((!(isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render")))) {
                // line 40
                echo "    ";
                $context["horizontal_input_wrapper_class"] = (((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")) . " ") . (isset($context["horizontal_label_offset_class"]) ? $context["horizontal_label_offset_class"] : $this->getContext($context, "horizontal_label_offset_class")));
                // line 41
                echo "    ";
            }
            // line 42
            echo "    <div class=\"";
            echo twig_escape_filter($this->env, (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "html", null, true);
            echo "\">
    ";
        }
        // line 44
        echo "    ";
        $this->displayParentBlock("textarea_widget", $context, $blocks);
        echo "
    ";
        // line 45
        if (((!(isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline"))) && (isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")))) {
            // line 46
            echo "            ";
            $this->displayBlock("form_message", $context, $blocks);
            echo "
    </div>
    ";
        }
    }

    // line 51
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 52
        ob_start();
        // line 53
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "text")) : ("text"));
        // line 54
        echo "    ";
        if (((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") && (!(isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")))) && (isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")))) {
            // line 55
            echo "    <div class=\"";
            echo twig_escape_filter($this->env, (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "html", null, true);
            echo "\">
    ";
        }
        // line 57
        echo "    ";
        if ((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") && ((!(null === ((array_key_exists("widget_addon_prepend", $context)) ? (_twig_default_filter((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")), null)) : (null)))) || (!(null === ((array_key_exists("widget_addon_append", $context)) ? (_twig_default_filter((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append")), null)) : (null))))))) {
            // line 58
            echo "    <div class=\"input-group\">
        ";
            // line 59
            if ((!(null === ((array_key_exists("widget_addon_prepend", $context)) ? (_twig_default_filter((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")), null)) : (null))))) {
                // line 60
                echo "            ";
                $context["widget_addon"] = (isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend"));
                // line 61
                echo "            ";
                $this->displayBlock("widget_addon", $context, $blocks);
                echo "
        ";
            }
            // line 63
            echo "    ";
        }
        // line 64
        echo "    ";
        if ((!((array_key_exists("widget_remove_btn", $context)) ? (_twig_default_filter((isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn")), null)) : (null)))) {
            // line 65
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : ("")) . " not-removable")));
            // line 66
            echo "    ";
        }
        // line 67
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : ("")) . " form-control")));
        // line 68
        echo "    ";
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
        echo "
    ";
        // line 69
        if ((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") && ((!(null === ((array_key_exists("widget_addon_prepend", $context)) ? (_twig_default_filter((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")), null)) : (null)))) || (!(null === ((array_key_exists("widget_addon_append", $context)) ? (_twig_default_filter((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append")), null)) : (null))))))) {
            // line 70
            echo "        ";
            if ((!(null === ((array_key_exists("widget_addon_append", $context)) ? (_twig_default_filter((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append")), null)) : (null))))) {
                // line 71
                echo "        ";
                $context["widget_addon"] = (isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append"));
                // line 72
                echo "        ";
                $this->displayBlock("widget_addon", $context, $blocks);
                echo "
        ";
            }
            // line 74
            echo "    </div>
    ";
        }
        // line 76
        echo "    ";
        if (((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") && (!(isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")))) && (isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")))) {
            // line 77
            echo "        ";
            $this->displayBlock("form_message", $context, $blocks);
            echo "
    </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 83
    public function block_form_widget_compound($context, array $blocks = array())
    {
        // line 84
        ob_start();
        // line 85
        echo "    ";
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") == null)) {
            // line 86
            echo "        ";
            if ((isset($context["render_fieldset"]) ? $context["render_fieldset"] : $this->getContext($context, "render_fieldset"))) {
                echo "<fieldset>";
            }
            // line 87
            echo "        ";
            if ((isset($context["show_legend"]) ? $context["show_legend"] : $this->getContext($context, "show_legend"))) {
                $this->displayBlock("form_legend", $context, $blocks);
            }
            // line 88
            echo "    ";
        }
        // line 89
        echo "
    ";
        // line 90
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "tabbed")) {
            // line 91
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'tabs');
            echo "
        <div class=\"tab-content\">
    ";
        }
        // line 94
        echo "
    ";
        // line 95
        $this->displayBlock("form_rows_visible", $context, $blocks);
        echo "

    ";
        // line 97
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "tabbed")) {
            // line 98
            echo "        </div>
    ";
        }
        // line 100
        echo "
    ";
        // line 101
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

    ";
        // line 103
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") == null)) {
            // line 104
            echo "        ";
            if ((isset($context["render_fieldset"]) ? $context["render_fieldset"] : $this->getContext($context, "render_fieldset"))) {
                echo "</fieldset>";
            }
            // line 105
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 109
    public function block_form_tabs($context, array $blocks = array())
    {
        // line 110
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "tabsView", array(), "any", true, true)) {
            // line 111
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "tabsView"), 'widget');
            echo "
";
        }
    }

    // line 115
    public function block_tabs_widget($context, array $blocks = array())
    {
        // line 116
        ob_start();
        // line 117
        echo "<ul class=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "attr"), "class"), "html", null, true);
        echo "\">
    ";
        // line 118
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "tabs"));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 119
            echo "        <li";
            if ($this->getAttribute((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")), "active")) {
                echo " class=\"active\"";
            }
            echo ">
            <a data-toggle=\"tab\" href=\"#";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")), "id"), "html", null, true);
            echo "\">
                ";
            // line 121
            if ($this->getAttribute((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")), "icon")) {
                echo "<span class=\"glyphicon glyphicon-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")), "icon"), "html", null, true);
                echo "\"></span>";
            }
            // line 122
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")), "label"), "html", null, true);
            echo "
            </a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "</ul>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 130
    public function block_form_tab($context, array $blocks = array())
    {
        // line 131
        echo "<div class=\"tab-pane";
        echo (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "tab_active")) ? (" active") : (""));
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\">
    ";
        // line 132
        $this->displayBlock("form_widget", $context, $blocks);
        echo "
</div>
";
    }

    // line 136
    public function block_collection_widget($context, array $blocks = array())
    {
        // line 137
        ob_start();
        // line 138
        echo "    <div class=\"collection-items col-lg-9\">
    ";
        // line 139
        $this->displayBlock("form_widget", $context, $blocks);
        echo "
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 144
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 145
        ob_start();
        // line 146
        echo "    ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => (($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class"), "")) : (""))));
        // line 147
        echo "    ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => (($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), "class") . " ") . ((((isset($context["widget_type"]) ? $context["widget_type"] : $this->getContext($context, "widget_type")) != "")) ? ((((((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) ? ("checkbox") : ("radio")) . "-") . (isset($context["widget_type"]) ? $context["widget_type"] : $this->getContext($context, "widget_type")))) : ("")))));
        // line 148
        echo "    ";
        if ((isset($context["expanded"]) ? $context["expanded"] : $this->getContext($context, "expanded"))) {
            // line 149
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")))) : ((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class"))))));
            // line 150
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
    ";
        }
        // line 152
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 153
            echo "        ";
            if (((isset($context["widget_type"]) ? $context["widget_type"] : $this->getContext($context, "widget_type")) != "inline")) {
                // line 154
                echo "        <div class=\"";
                echo (((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) ? ("checkbox") : ("radio"));
                echo "\">
        ";
            }
            // line 156
            echo "            <label";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : $this->getContext($context, "attrname")), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : $this->getContext($context, "attrvalue")), "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
                ";
            // line 157
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'widget', array("horizontal_label_class" => (isset($context["horizontal_label_class"]) ? $context["horizontal_label_class"] : $this->getContext($context, "horizontal_label_class")), "horizontal_input_wrapper_class" => (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "attr" => array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class"), "")) : ("")))));
            echo "
                ";
            // line 158
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), "vars"), "label"), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "
            </label>
        ";
            // line 160
            if (((isset($context["widget_type"]) ? $context["widget_type"] : $this->getContext($context, "widget_type")) != "inline")) {
                // line 161
                echo "        </div>
        ";
            }
            // line 163
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "    ";
        $this->displayBlock("form_message", $context, $blocks);
        echo "
    ";
        // line 165
        if ((isset($context["expanded"]) ? $context["expanded"] : $this->getContext($context, "expanded"))) {
            // line 166
            echo "        </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 171
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 172
        ob_start();
        // line 173
        if (((!((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) && twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label"))))) {
            // line 174
            echo "    ";
            $context["label"] = call_user_func_array($this->env->getFilter('humanize')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))));
        }
        // line 176
        if ((($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") != null) && !twig_in_filter("choice", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent"), "vars"), "block_prefixes")))) {
            // line 177
            echo "<div class=\"";
            echo twig_escape_filter($this->env, (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "html", null, true);
            echo "\">
    <div class=\"checkbox\">
";
        }
        // line 180
        echo "
";
        // line 181
        if (((($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") != null) && !twig_in_filter("choice", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent"), "vars"), "block_prefixes"))) && (isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render")))) {
            // line 182
            echo "    <label class=\"";
            if ((array_key_exists("inline", $context) && (isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")))) {
                echo "checkbox-inline";
            }
            echo "\">
";
        }
        // line 184
        echo "        <input type=\"checkbox\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\"";
        }
        if ((isset($context["checked"]) ? $context["checked"] : $this->getContext($context, "checked"))) {
            echo " checked=\"checked\"";
        }
        echo "/>
";
        // line 185
        if ((($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") != null) && !twig_in_filter("choice", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent"), "vars"), "block_prefixes")))) {
            // line 186
            echo "    ";
            if (((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render")) && twig_in_filter((isset($context["widget_checkbox_label"]) ? $context["widget_checkbox_label"] : $this->getContext($context, "widget_checkbox_label")), array(0 => "both", 1 => "widget")))) {
                // line 187
                echo "        ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                echo "
    </label>
    ";
            }
        }
        // line 191
        if ((($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") != null) && !twig_in_filter("choice", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent"), "vars"), "block_prefixes")))) {
            // line 192
            echo "    </div>
    ";
            // line 193
            $this->displayBlock("form_message", $context, $blocks);
            echo "
</div>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 199
    public function block_date_widget($context, array $blocks = array())
    {
        // line 200
        ob_start();
        // line 201
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 202
            echo "    ";
            if (array_key_exists("datepicker", $context)) {
                // line 203
                echo "        <div class=\"input-group date col-lg-9\">
            ";
                // line 204
                if ((!(null === ((array_key_exists("widget_addon_prepend", $context)) ? (_twig_default_filter((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")), null)) : (null))))) {
                    // line 205
                    echo "                ";
                    $context["widget_addon"] = (isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend"));
                    // line 206
                    echo "                ";
                    $this->displayBlock("widget_addon", $context, $blocks);
                    echo "
            ";
                }
                // line 208
                echo "            ";
                $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : ("")) . " not-removable grd-white form-control")));
                // line 209
                echo "            <input type=\"text\" ";
                $this->displayBlock("widget_attributes", $context, $blocks);
                echo " value=\"";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "\"  data-form=\"datepicker\" data-date-format=\"";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format"))), "html", null, true);
                echo "\"/>
            ";
                // line 210
                if ((!(null === ((array_key_exists("widget_addon_append", $context)) ? (_twig_default_filter((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append")), null)) : (null))))) {
                    // line 211
                    echo "                ";
                    $context["widget_addon"] = (isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append"));
                    // line 212
                    echo "                ";
                    $this->displayBlock("widget_addon", $context, $blocks);
                    echo "
            ";
                }
                // line 214
                echo "\t    <script type=\"text/javascript\">
\t\t\$(document).ready(function () {
\t\t    \$(";
                // line 216
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ").datepicker();
                    \$(";
                // line 217
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ").keydown(function(e) {
                        if(e.which == 27) {
                            \$(";
                // line 219
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ").datepicker('hide');
                                return false;
                            }
                        });
                });
            </script>
        </div>
    ";
            } else {
                // line 227
                echo "        ";
                $this->displayBlock("form_widget_simple", $context, $blocks);
                echo "
    ";
            }
            // line 229
            echo "    ";
            $this->displayBlock("form_message", $context, $blocks);
            echo "
";
        } else {
            // line 231
            echo "    ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "inline")) : ("inline"))));
            // line 232
            echo "        ";
            echo strtr((isset($context["date_pattern"]) ? $context["date_pattern"] : $this->getContext($context, "date_pattern")), array("{{ year }}" =>             // line 233
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "year"), 'widget', array("attr" => array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class"), "")) : ("")) . "")), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-3")) : ("col-lg-3")))), "{{ month }}" =>             // line 234
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "month"), 'widget', array("attr" => array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class"), "")) : ("")) . "")), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-3")) : ("col-lg-3")))), "{{ day }}" =>             // line 235
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "day"), 'widget', array("attr" => array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class"), "")) : ("")) . "")), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-3")) : ("col-lg-3"))))));
            // line 236
            echo "
    ";
            // line 237
            $this->displayBlock("form_message", $context, $blocks);
            echo "
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 242
    public function block_time_widget($context, array $blocks = array())
    {
        // line 243
        ob_start();
        // line 244
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 245
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 247
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : (""))));
            // line 248
            echo "        ";
            ob_start();
            // line 249
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "hour"), 'widget', array("attr" => array("size" => "1"), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-2")) : ("col-lg-2"))));
            echo "
        ";
            // line 250
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "minute"), 'widget', array("attr" => array("size" => "1"), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-2")) : ("col-lg-2"))));
            echo "
        ";
            // line 251
            if ((isset($context["with_seconds"]) ? $context["with_seconds"] : $this->getContext($context, "with_seconds"))) {
                // line 252
                echo "            :";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "second"), 'widget', array("attr" => array("size" => "1")));
                echo "
        ";
            }
            // line 254
            echo "        ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 255
            echo "        ";
            $this->displayBlock("form_message", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 260
    public function block_datetime_widget($context, array $blocks = array())
    {
        // line 261
        ob_start();
        // line 262
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 263
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 265
            echo "            ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class"), "")) : (""))));
            // line 266
            echo "            <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
                ";
            // line 267
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date"), 'errors');
            echo "
                ";
            // line 268
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time"), 'errors');
            echo "
                ";
            // line 269
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date"), 'widget', array("attr" => array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class"), "")) : (""))), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-3")) : ("col-lg-3"))));
            echo "
                ";
            // line 270
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time"), 'widget', array("attr" => array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class"), "")) : (""))), "horizontal_input_wrapper_class" => ((array_key_exists("horizontal_input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "col-lg-2")) : ("col-lg-2"))));
            echo "
                ";
            // line 271
            $this->displayBlock("form_message", $context, $blocks);
            echo "
            </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 277
    public function block_percent_widget($context, array $blocks = array())
    {
        // line 278
        ob_start();
        // line 279
        echo "    ";
        $context["widget_addon_append"] = twig_array_merge((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append")), array("text" => (($this->getAttribute((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : null), "text"), "%")) : ("%"))));
        // line 280
        echo "    ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 284
    public function block_money_widget($context, array $blocks = array())
    {
        // line 285
        ob_start();
        // line 286
        echo "    ";
        $context["widget_addon_prepend"] = ((((((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")) != false) || ((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")) == null)) && ((isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")) != "{{ widget }}"))) ? (array("text" => strtr((isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")), array("{{ widget }}" => "")))) : (((array_key_exists("widget_addon_prepend", $context)) ? (_twig_default_filter((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")), null)) : (null))));
        // line 287
        echo "    ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 291
    public function block_file_widget($context, array $blocks = array())
    {
        // line 292
        ob_start();
        // line 293
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "file")) : ("file"));
        // line 294
        echo "<div class=\"";
        echo twig_escape_filter($this->env, (isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")), "html", null, true);
        echo "\">
    ";
        // line 295
        if ((!(null === ((array_key_exists("widget_addon_prepend", $context)) ? (_twig_default_filter((isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend")), null)) : (null))))) {
            // line 296
            echo "        ";
            $context["widget_addon"] = (isset($context["widget_addon_prepend"]) ? $context["widget_addon_prepend"] : $this->getContext($context, "widget_addon_prepend"));
            // line 297
            echo "        ";
            $this->displayBlock("widget_addon", $context, $blocks);
            echo "
    ";
        }
        // line 299
        echo "<input type=\"";
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo "/>
";
        // line 300
        if ((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") && (!(null === (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "type", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "type"), null)) : (null)))))) {
            // line 301
            echo "    ";
            if ((!(null === ((array_key_exists("widget_addon_append", $context)) ? (_twig_default_filter((isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append")), null)) : (null))))) {
                // line 302
                echo "        ";
                $context["widget_addon"] = (isset($context["widget_addon_append"]) ? $context["widget_addon_append"] : $this->getContext($context, "widget_addon_append"));
                // line 303
                echo "        ";
                $this->displayBlock("widget_addon", $context, $blocks);
                echo "
    ";
            }
        }
        // line 306
        echo "</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 312
    public function block_form_legend($context, array $blocks = array())
    {
        // line 313
        ob_start();
        // line 314
        echo "    ";
        if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
            // line 315
            echo "        ";
            $context["label"] = call_user_func_array($this->env->getFilter('humanize')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))));
            // line 316
            echo "    ";
        }
        // line 317
        echo "    <legend>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "</legend>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 321
    public function block_form_label($context, array $blocks = array())
    {
        // line 322
        if ((!twig_in_filter("checkbox", (isset($context["block_prefixes"]) ? $context["block_prefixes"] : $this->getContext($context, "block_prefixes"))) || twig_in_filter((isset($context["widget_checkbox_label"]) ? $context["widget_checkbox_label"] : $this->getContext($context, "widget_checkbox_label")), array(0 => "label", 1 => "both")))) {
            // line 323
            ob_start();
            // line 324
            echo "    ";
            if ((!((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false))) {
                // line 325
                echo "        ";
                if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
                    // line 326
                    echo "            ";
                    $context["label"] = call_user_func_array($this->env->getFilter('humanize')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))));
                    // line 327
                    echo "        ";
                }
                // line 328
                echo "        ";
                if ((!(isset($context["compound"]) ? $context["compound"] : $this->getContext($context, "compound")))) {
                    // line 329
                    echo "            ";
                    $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("for" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))));
                    // line 330
                    echo "        ";
                }
                // line 331
                echo "        ";
                $context["label_attr_class"] = " control-label ";
                // line 332
                echo "        ";
                if ((isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal"))) {
                    // line 333
                    echo "            ";
                    $context["label_attr_class"] = ((isset($context["label_attr_class"]) ? $context["label_attr_class"] : $this->getContext($context, "label_attr_class")) . (isset($context["horizontal_label_class"]) ? $context["horizontal_label_class"] : $this->getContext($context, "horizontal_label_class")));
                    // line 334
                    echo "        ";
                }
                // line 335
                echo "        ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => (((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class"), "")) : ("")) . (isset($context["label_attr_class"]) ? $context["label_attr_class"] : $this->getContext($context, "label_attr_class"))) . (((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) ? (" required") : (" optional")))));
                // line 336
                echo "        <label";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : $this->getContext($context, "attrname")), "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : $this->getContext($context, "attrvalue")), "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
        ";
                // line 337
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                // line 338
                $this->displayBlock("label_asterisk", $context, $blocks);
                echo "
        ";
                // line 339
                if ((twig_in_filter("collection", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "block_prefixes")) && ((array_key_exists("widget_add_btn", $context)) ? (_twig_default_filter((isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn")), null)) : (null)))) {
                    // line 340
                    echo "            ";
                    $this->displayBlock("form_widget_add_btn", $context, $blocks);
                    echo "
        ";
                }
                // line 342
                echo "        ";
                if ((isset($context["help_label"]) ? $context["help_label"] : $this->getContext($context, "help_label"))) {
                    // line 343
                    echo "            ";
                    $this->displayBlock("help_label", $context, $blocks);
                    echo "
        ";
                }
                // line 345
                echo "        ";
                if ($this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "title")) {
                    // line 346
                    echo "            ";
                    $this->displayBlock("help_label_tooltip", $context, $blocks);
                    echo "
        ";
                }
                // line 348
                echo "        ";
                if ($this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "title")) {
                    // line 349
                    echo "            ";
                    $this->displayBlock("help_label_popover", $context, $blocks);
                    echo "
        ";
                }
                // line 351
                echo "        </label>
    ";
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    // line 357
    public function block_help_label($context, array $blocks = array())
    {
        // line 358
        echo "    <span class=\"help-block\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["help_label"]) ? $context["help_label"] : $this->getContext($context, "help_label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "</span>
";
    }

    // line 361
    public function block_help_label_tooltip($context, array $blocks = array())
    {
        // line 362
        echo "    <span class=\"help-block\">
        <a href=\"#\" data-toggle=\"tooltip\" data-placement=\"";
        // line 363
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "placement"), "html", null, true);
        echo "\" data-title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "title"), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "\">
            ";
        // line 364
        if ((!($this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "icon") === false))) {
            // line 365
            echo "            <span class=\"glyphicon glyphicon-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "icon"), "html", null, true);
            echo "\"></span>
            ";
        }
        // line 367
        echo "            ";
        if ((!($this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "text") === null))) {
            // line 368
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help_label_tooltip"]) ? $context["help_label_tooltip"] : $this->getContext($context, "help_label_tooltip")), "text"), "html", null, true);
            echo "
            ";
        }
        // line 370
        echo "        </a>
    </span>
";
    }

    // line 374
    public function block_help_label_popover($context, array $blocks = array())
    {
        // line 375
        echo "    <span class=\"help-block\">
        <a href=\"#\" data-toggle=\"popover\" data-trigger=\"hover\" data-placement=\"";
        // line 376
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "placement"), "html", null, true);
        echo "\" data-title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "title"), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "\" data-content=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "content"), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "\" >
            ";
        // line 377
        if ((!($this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "icon") === false))) {
            // line 378
            echo "            <span class=\"glyphicon glyphicon-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "icon"), "html", null, true);
            echo "\"></span>
            ";
        }
        // line 380
        echo "            ";
        if ((!($this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "text") === null))) {
            // line 381
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help_label_popover"]) ? $context["help_label_popover"] : $this->getContext($context, "help_label_popover")), "text"), "html", null, true);
            echo "
            ";
        }
        // line 383
        echo "        </a>
    </span>
";
    }

    // line 391
    public function block_form_rows_visible($context, array $blocks = array())
    {
        // line 392
        ob_start();
        // line 393
        echo "    ";
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors')) {
            // line 394
            echo "        <div class=\"symfony-form-errors\">
            ";
            // line 395
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
        </div>
    ";
        }
        // line 398
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 399
            echo "        ";
            if (!twig_in_filter("hidden", $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), "vars"), "block_prefixes"))) {
                echo " ";
                // line 400
                echo "            ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'row');
                echo "
        ";
            }
            // line 402
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 406
    public function block_form_row($context, array $blocks = array())
    {
        // line 407
        ob_start();
        // line 408
        echo "    ";
        if (twig_in_filter("tab", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "block_prefixes"))) {
            // line 409
            echo "        ";
            $this->displayBlock("form_tab", $context, $blocks);
            echo "
    ";
        } else {
            // line 411
            echo "        ";
            $this->displayBlock("widget_form_group_start", $context, $blocks);
            echo "
        ";
            // line 412
            echo $this->env->getExtension('translator')->trans((isset($context["widget_prefix"]) ? $context["widget_prefix"] : $this->getContext($context, "widget_prefix")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
            echo " ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget', $context);
            echo " ";
            echo $this->env->getExtension('translator')->trans((isset($context["widget_suffix"]) ? $context["widget_suffix"] : $this->getContext($context, "widget_suffix")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
            echo "
        ";
            // line 413
            if ((twig_in_filter("collection", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent"), "vars"), "block_prefixes")) && ((array_key_exists("widget_remove_btn", $context)) ? (_twig_default_filter((isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn")), null)) : (null)))) {
                // line 414
                echo "            ";
                $this->displayBlock("form_widget_remove_btn", $context, $blocks);
                echo "
        ";
            }
            // line 416
            $this->displayBlock("widget_form_group_end", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 423
    public function block_form_message($context, array $blocks = array())
    {
        // line 424
        ob_start();
        // line 425
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    ";
        // line 426
        $this->displayBlock("form_help", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 432
    public function block_form_help($context, array $blocks = array())
    {
        // line 433
        ob_start();
        // line 434
        if ((isset($context["help_block"]) ? $context["help_block"] : $this->getContext($context, "help_block"))) {
            echo "<p class=\"help-block\">";
            echo $this->env->getExtension('translator')->trans((isset($context["help_block"]) ? $context["help_block"] : $this->getContext($context, "help_block")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
            echo "</p>";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 438
    public function block_form_widget_add_btn($context, array $blocks = array())
    {
        // line 439
        ob_start();
        // line 440
        echo "    ";
        if (((array_key_exists("widget_add_btn", $context)) ? (_twig_default_filter((isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn")), null)) : (null))) {
            // line 441
            echo "        ";
            $context["button_type"] = "add";
            // line 442
            echo "        ";
            $context["button_values"] = (isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn"));
            // line 443
            echo "        ";
            $this->displayBlock("collection_button", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 448
    public function block_form_widget_remove_btn($context, array $blocks = array())
    {
        // line 449
        ob_start();
        // line 450
        echo "    ";
        if (((array_key_exists("widget_remove_btn", $context)) ? (_twig_default_filter((isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn")), null)) : (null))) {
            // line 451
            echo "    ";
            $context["button_type"] = "remove";
            // line 452
            echo "    ";
            $context["button_values"] = (isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn"));
            // line 453
            echo "    ";
            $this->displayBlock("collection_button", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 458
    public function block_collection_button($context, array $blocks = array())
    {
        // line 459
        echo "<a ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "attr"));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : $this->getContext($context, "attrname")), "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : $this->getContext($context, "attrvalue")), "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " data-collection-";
        echo twig_escape_filter($this->env, (isset($context["button_type"]) ? $context["button_type"] : $this->getContext($context, "button_type")), "html", null, true);
        echo "-btn=\".";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "id", array(), "array"), "html", null, true);
        echo "_form_group\">
";
        // line 460
        if (($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "icon") != "")) {
            // line 461
            echo "<span class=\"glyphicon glyphicon-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "icon"), "html", null, true);
            echo " ";
            if ((!(null === $this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "icon_color")))) {
                echo "icon-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "icon_color"), "html", null, true);
            }
            echo "\"></span>
";
        }
        // line 463
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "label"), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "
</a>

";
    }

    // line 468
    public function block_label_asterisk($context, array $blocks = array())
    {
        // line 469
        if ((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) {
            // line 470
            if ((isset($context["render_required_asterisk"]) ? $context["render_required_asterisk"] : $this->getContext($context, "render_required_asterisk"))) {
                echo " <span class=\"asterisk\">*</span>";
            }
        } else {
            // line 472
            if ((isset($context["render_optional_text"]) ? $context["render_optional_text"] : $this->getContext($context, "render_optional_text"))) {
                echo " <span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("(optional)", array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                echo "</span>";
            }
        }
    }

    // line 476
    public function block_widget_addon($context, array $blocks = array())
    {
        // line 477
        ob_start();
        // line 478
        $context["widget_addon_icon"] = (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "icon", array(), "any", true, true)) ? ($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "icon")) : (null));
        // line 479
        echo "    <span class=\"input-group-addon\">";
        echo (((($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "text"), false)) : (false))) ? ($this->env->getExtension('translator')->trans($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "text"), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")))) : ($this->env->getExtension('mopa_bootstrap_icon')->renderIcon((isset($context["widget_addon_icon"]) ? $context["widget_addon_icon"] : $this->getContext($context, "widget_addon_icon")))));
        echo "</span>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 485
    public function block_form_errors($context, array $blocks = array())
    {
        // line 486
        ob_start();
        // line 487
        if ((isset($context["error_delay"]) ? $context["error_delay"] : $this->getContext($context, "error_delay"))) {
            // line 488
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 489
                echo "        ";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") == 1)) {
                    // line 490
                    echo "            ";
                    if ($this->getAttribute((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), "set", array(0 => "errors", 1 => (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))), "method")) {
                    }
                    // line 491
                    echo "        ";
                }
                // line 492
                echo "    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 494
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                // line 495
                echo "        ";
                if (($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") == null)) {
                    // line 496
                    echo "            ";
                    $context["__internal_997d0125cc42093f30eea8e00cb8717c764041a67531abb01ebaa06571d64fa6"] = $this->env->loadTemplate("MopaBootstrapBundle::flash.html.twig");
                    // line 497
                    echo "            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 498
                        echo "                ";
                        echo $context["__internal_997d0125cc42093f30eea8e00cb8717c764041a67531abb01ebaa06571d64fa6"]->getflash("danger", (((null === $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messagePluralization"))) ? ($this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageTemplate"), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageParameters"), "validators")) : ($this->env->getExtension('translator')->transchoice($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageTemplate"), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messagePluralization"), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageParameters"), "validators"))));
                        // line 503
                        echo "
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 505
                    echo "        ";
                } else {
                    // line 506
                    echo "            <span class=\"help-";
                    $this->displayBlock("error_type", $context, $blocks);
                    echo "\">
            ";
                    // line 507
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 508
                        echo "                ";
                        echo twig_escape_filter($this->env, (((null === $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messagePluralization"))) ? ($this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageTemplate"), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageParameters"), "validators")) : ($this->env->getExtension('translator')->transchoice($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageTemplate"), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messagePluralization"), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageParameters"), "validators"))), "html", null, true);
                        // line 512
                        echo " <br>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 514
                    echo "            </span>
        ";
                }
                // line 516
                echo "    ";
            }
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 523
    public function block_error_type($context, array $blocks = array())
    {
        // line 524
        ob_start();
        // line 525
        if ((isset($context["error_type"]) ? $context["error_type"] : $this->getContext($context, "error_type"))) {
            // line 526
            echo "    ";
            echo twig_escape_filter($this->env, (isset($context["error_type"]) ? $context["error_type"] : $this->getContext($context, "error_type")), "html", null, true);
            echo "
";
        } elseif (($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") == null)) {
            // line 528
            echo "    ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "error_type", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "error_type"), "inline")) : ("inline")), "html", null, true);
            echo "
";
        } else {
            // line 530
            echo "    block
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 537
    public function block_widget_form_group_start($context, array $blocks = array())
    {
        // line 538
        if ((((array_key_exists("widget_form_group", $context)) ? (_twig_default_filter((isset($context["widget_form_group"]) ? $context["widget_form_group"] : $this->getContext($context, "widget_form_group")), false)) : (false)) || ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") == null))) {
            // line 539
            echo "    ";
            if (twig_in_filter("collection", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent"), "vars"), "block_prefixes"))) {
                echo " ";
                // line 540
                echo "        ";
                if ((!(isset($context["omit_collection_item"]) ? $context["omit_collection_item"] : $this->getContext($context, "omit_collection_item")))) {
                    // line 541
                    echo "        ";
                    $context["widget_form_group_attr"] = twig_array_merge((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), array("class" => ($this->getAttribute((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), "class") . " collection-item")));
                    // line 542
                    echo "        ";
                }
                // line 543
                echo "    ";
            }
            // line 544
            echo "    ";
            if (array_key_exists("prototype", $context)) {
                // line 545
                echo "        ";
                $context["data_prototype_name"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "form", array(), "any", false, true), "vars", array(), "any", false, true), "prototype", array(), "any", false, true), "vars", array(), "any", false, true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "form", array(), "any", false, true), "vars", array(), "any", false, true), "prototype", array(), "any", false, true), "vars", array(), "any", false, true), "name"), "__name__")) : ("__name__"));
                // line 546
                echo "        ";
                $context["widget_form_group_attr"] = twig_array_merge(twig_array_merge((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), array("data-prototype" => $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["prototype"]) ? $context["prototype"] : $this->getContext($context, "prototype")), 'row'), "data-prototype-name" => (isset($context["data_prototype_name"]) ? $context["data_prototype_name"] : $this->getContext($context, "data_prototype_name")))), (isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
                // line 547
                echo "    ";
            }
            // line 548
            echo "    ";
            // line 549
            echo "    ";
            $context["widget_form_group_attr"] = twig_array_merge((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), array("class" => ((($this->getAttribute((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), "class") . " ") . (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))) . "_form_group")));
            // line 550
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                // line 551
                echo "        ";
                $context["widget_form_group_attr"] = twig_array_merge((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), array("class" => ((($this->getAttribute((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : null), "class"), "")) : ("")) . " has-error")));
                // line 552
                echo "    ";
            }
            // line 553
            echo "\t";
            if ((twig_in_filter("collection", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "block_prefixes")) && $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true))) {
                // line 554
                echo "\t\t";
                $context["widget_form_group_attr"] = twig_array_merge((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")), array("class" => (((($this->getAttribute((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : null), "class"), "row")) : ("row")) . " ") . $this->getAttribute((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), "class"))));
                // line 555
                echo "\t";
            }
            // line 556
            echo "    <div";
            if ((!($this->getAttribute((isset($context["help_widget_popover"]) ? $context["help_widget_popover"] : $this->getContext($context, "help_widget_popover")), "title") === null))) {
                $this->displayBlock("help_widget_popover", $context, $blocks);
            }
            echo " ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["widget_form_group_attr"]) ? $context["widget_form_group_attr"] : $this->getContext($context, "widget_form_group_attr")));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : $this->getContext($context, "attrname")), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : $this->getContext($context, "attrvalue")), "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
    ";
            // line 558
            echo "    ";
            if ((((twig_length_filter($this->env, (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))) > 0) && ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") != null)) && !twig_in_filter("field", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars"), "block_prefixes")))) {
                // line 560
                echo "        ";
                if ((isset($context["show_child_legend"]) ? $context["show_child_legend"] : $this->getContext($context, "show_child_legend"))) {
                    // line 561
                    echo "            ";
                    $this->displayBlock("form_legend", $context, $blocks);
                    echo "
        ";
                } elseif ((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                    // line 563
                    echo "            ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
                    echo "
        ";
                }
                // line 565
                echo "    ";
            } else {
                // line 566
                echo "        ";
                if ((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                    // line 567
                    echo "            ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
                    echo "
        ";
                }
                // line 569
                echo "    ";
            }
        } else {
            // line 571
            echo "    ";
            if ((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                // line 572
                echo "        ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
                echo "
    ";
            }
        }
    }

    // line 577
    public function block_help_widget_popover($context, array $blocks = array())
    {
        // line 578
        echo " ";
        ob_start();
        // line 579
        echo " ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["help_widget_popover"]) ? $context["help_widget_popover"] : $this->getContext($context, "help_widget_popover")));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 580
            echo " data-";
            echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : $this->getContext($context, "attrname")), "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : $this->getContext($context, "attrvalue")), "html", null, true);
            echo "\"
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 582
        echo " ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 585
    public function block_widget_form_group_end($context, array $blocks = array())
    {
        // line 586
        ob_start();
        // line 587
        if ((((array_key_exists("widget_form_group", $context)) ? (_twig_default_filter((isset($context["widget_form_group"]) ? $context["widget_form_group"] : $this->getContext($context, "widget_form_group")), false)) : (false)) || ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent") == null))) {
            // line 588
            echo "    </div>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 593
    public function block_form_widget($context, array $blocks = array())
    {
        // line 594
        if (((isset($context["horizontal"]) ? $context["horizontal"] : $this->getContext($context, "horizontal")) && (!(isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))))) {
            // line 595
            echo "    ";
            $context["horizontal_input_wrapper_class"] = (((isset($context["horizontal_input_wrapper_class"]) ? $context["horizontal_input_wrapper_class"] : $this->getContext($context, "horizontal_input_wrapper_class")) . " ") . (isset($context["horizontal_label_offset_class"]) ? $context["horizontal_label_offset_class"] : $this->getContext($context, "horizontal_label_offset_class")));
        }
        // line 597
        $this->displayParentBlock("form_widget", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Form:fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1642 => 597,  1638 => 595,  1636 => 594,  1633 => 593,  1626 => 588,  1624 => 587,  1622 => 586,  1619 => 585,  1614 => 582,  1603 => 580,  1598 => 579,  1595 => 578,  1592 => 577,  1583 => 572,  1580 => 571,  1576 => 569,  1570 => 567,  1567 => 566,  1564 => 565,  1558 => 563,  1552 => 561,  1549 => 560,  1546 => 558,  1526 => 556,  1523 => 555,  1520 => 554,  1517 => 553,  1514 => 552,  1511 => 551,  1508 => 550,  1505 => 549,  1503 => 548,  1500 => 547,  1497 => 546,  1494 => 545,  1491 => 544,  1488 => 543,  1485 => 542,  1482 => 541,  1479 => 540,  1475 => 539,  1473 => 538,  1470 => 537,  1463 => 530,  1457 => 528,  1451 => 526,  1449 => 525,  1447 => 524,  1444 => 523,  1437 => 516,  1433 => 514,  1426 => 512,  1423 => 508,  1419 => 507,  1414 => 506,  1411 => 505,  1404 => 503,  1401 => 498,  1396 => 497,  1393 => 496,  1390 => 495,  1387 => 494,  1372 => 492,  1369 => 491,  1365 => 490,  1362 => 489,  1344 => 488,  1342 => 487,  1340 => 486,  1337 => 485,  1329 => 479,  1327 => 478,  1325 => 477,  1322 => 476,  1313 => 472,  1308 => 470,  1306 => 469,  1303 => 468,  1295 => 463,  1284 => 461,  1282 => 460,  1262 => 459,  1259 => 458,  1250 => 453,  1247 => 452,  1244 => 451,  1241 => 450,  1239 => 449,  1236 => 448,  1227 => 443,  1224 => 442,  1221 => 441,  1218 => 440,  1216 => 439,  1213 => 438,  1204 => 434,  1202 => 433,  1199 => 432,  1192 => 426,  1187 => 425,  1185 => 424,  1182 => 423,  1174 => 416,  1168 => 414,  1166 => 413,  1158 => 412,  1153 => 411,  1147 => 409,  1144 => 408,  1142 => 407,  1139 => 406,  1130 => 402,  1124 => 400,  1120 => 399,  1115 => 398,  1109 => 395,  1106 => 394,  1103 => 393,  1101 => 392,  1098 => 391,  1092 => 383,  1086 => 381,  1083 => 380,  1077 => 378,  1075 => 377,  1067 => 376,  1064 => 375,  1061 => 374,  1055 => 370,  1049 => 368,  1046 => 367,  1040 => 365,  1038 => 364,  1032 => 363,  1029 => 362,  1026 => 361,  1019 => 358,  1016 => 357,  1008 => 351,  1002 => 349,  999 => 348,  993 => 346,  990 => 345,  984 => 343,  981 => 342,  975 => 340,  973 => 339,  969 => 338,  967 => 337,  951 => 336,  948 => 335,  945 => 334,  942 => 333,  939 => 332,  936 => 331,  933 => 330,  930 => 329,  927 => 328,  924 => 327,  921 => 326,  918 => 325,  915 => 324,  913 => 323,  911 => 322,  908 => 321,  900 => 317,  897 => 316,  894 => 315,  891 => 314,  889 => 313,  886 => 312,  880 => 306,  873 => 303,  870 => 302,  867 => 301,  865 => 300,  858 => 299,  852 => 297,  849 => 296,  847 => 295,  842 => 294,  840 => 293,  838 => 292,  835 => 291,  827 => 287,  824 => 286,  822 => 285,  819 => 284,  811 => 280,  808 => 279,  806 => 278,  803 => 277,  794 => 271,  790 => 270,  786 => 269,  782 => 268,  778 => 267,  773 => 266,  770 => 265,  764 => 263,  761 => 262,  759 => 261,  756 => 260,  747 => 255,  744 => 254,  738 => 252,  736 => 251,  732 => 250,  727 => 249,  724 => 248,  721 => 247,  715 => 245,  712 => 244,  710 => 243,  707 => 242,  699 => 237,  696 => 236,  694 => 235,  693 => 234,  692 => 233,  690 => 232,  687 => 231,  681 => 229,  675 => 227,  664 => 219,  659 => 217,  655 => 216,  651 => 214,  645 => 212,  642 => 211,  640 => 210,  631 => 209,  628 => 208,  622 => 206,  619 => 205,  617 => 204,  614 => 203,  609 => 201,  607 => 200,  604 => 199,  595 => 193,  592 => 192,  590 => 191,  582 => 187,  579 => 186,  577 => 185,  564 => 184,  556 => 182,  554 => 181,  551 => 180,  544 => 177,  542 => 176,  536 => 173,  534 => 172,  531 => 171,  524 => 166,  522 => 165,  511 => 163,  507 => 161,  505 => 160,  500 => 158,  471 => 153,  460 => 150,  448 => 146,  446 => 145,  443 => 144,  432 => 138,  420 => 132,  410 => 130,  383 => 120,  372 => 118,  367 => 117,  353 => 110,  350 => 109,  339 => 104,  332 => 101,  329 => 100,  323 => 97,  318 => 95,  315 => 94,  308 => 91,  306 => 90,  303 => 89,  300 => 88,  295 => 87,  290 => 86,  287 => 85,  282 => 83,  272 => 77,  259 => 72,  256 => 71,  253 => 70,  251 => 69,  234 => 64,  231 => 63,  225 => 61,  222 => 60,  205 => 54,  188 => 46,  186 => 45,  181 => 44,  172 => 41,  127 => 24,  124 => 23,  118 => 21,  65 => 4,  211 => 40,  198 => 37,  190 => 34,  152 => 26,  100 => 27,  81 => 10,  58 => 18,  23 => 3,  161 => 37,  90 => 15,  84 => 13,  689 => 297,  685 => 295,  636 => 248,  630 => 245,  625 => 242,  623 => 241,  615 => 235,  611 => 202,  605 => 232,  581 => 229,  576 => 227,  573 => 226,  570 => 225,  566 => 224,  563 => 223,  560 => 222,  557 => 221,  538 => 174,  533 => 216,  530 => 215,  526 => 214,  523 => 213,  517 => 164,  491 => 206,  488 => 205,  484 => 204,  481 => 203,  456 => 197,  454 => 148,  451 => 147,  449 => 194,  439 => 189,  436 => 188,  434 => 187,  431 => 186,  426 => 183,  417 => 179,  408 => 177,  404 => 126,  396 => 173,  389 => 171,  378 => 162,  376 => 119,  373 => 160,  359 => 154,  351 => 152,  344 => 105,  340 => 149,  327 => 138,  325 => 98,  317 => 133,  311 => 132,  301 => 128,  297 => 127,  293 => 126,  289 => 125,  286 => 124,  279 => 122,  265 => 74,  263 => 109,  260 => 108,  255 => 105,  237 => 65,  233 => 97,  226 => 95,  213 => 90,  202 => 53,  200 => 52,  197 => 51,  192 => 76,  175 => 42,  146 => 55,  134 => 51,  126 => 20,  53 => 14,  520 => 212,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 157,  479 => 202,  468 => 380,  466 => 152,  347 => 151,  335 => 258,  333 => 257,  137 => 67,  110 => 45,  104 => 15,  76 => 24,  20 => 1,  34 => 5,  480 => 156,  474 => 154,  469 => 158,  461 => 155,  457 => 149,  453 => 151,  444 => 191,  440 => 148,  437 => 147,  435 => 139,  430 => 137,  427 => 136,  423 => 142,  413 => 131,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 122,  387 => 121,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 157,  365 => 116,  362 => 115,  360 => 109,  355 => 111,  341 => 260,  337 => 103,  322 => 136,  314 => 99,  312 => 98,  309 => 97,  305 => 129,  298 => 91,  294 => 90,  285 => 84,  283 => 123,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 45,  220 => 59,  214 => 57,  177 => 65,  169 => 40,  140 => 22,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 200,  269 => 76,  254 => 92,  243 => 67,  240 => 66,  238 => 85,  235 => 46,  230 => 96,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 58,  208 => 55,  204 => 72,  179 => 72,  159 => 61,  143 => 23,  135 => 53,  119 => 22,  102 => 21,  71 => 6,  67 => 18,  63 => 7,  59 => 17,  38 => 6,  94 => 33,  89 => 13,  85 => 33,  75 => 11,  68 => 5,  56 => 4,  87 => 14,  21 => 2,  26 => 2,  93 => 29,  88 => 31,  78 => 9,  46 => 9,  27 => 1,  44 => 9,  31 => 4,  28 => 4,  201 => 92,  196 => 36,  183 => 73,  171 => 70,  166 => 39,  163 => 38,  158 => 36,  156 => 66,  151 => 57,  142 => 29,  138 => 54,  136 => 27,  121 => 22,  117 => 17,  105 => 40,  91 => 27,  62 => 19,  49 => 5,  24 => 6,  25 => 3,  19 => 13,  79 => 26,  72 => 20,  69 => 9,  47 => 8,  40 => 11,  37 => 8,  22 => 32,  246 => 68,  157 => 30,  145 => 46,  139 => 53,  131 => 50,  123 => 19,  120 => 18,  115 => 16,  111 => 40,  108 => 44,  101 => 41,  98 => 31,  96 => 17,  83 => 11,  74 => 23,  66 => 15,  55 => 12,  52 => 6,  50 => 8,  43 => 2,  41 => 10,  35 => 5,  32 => 5,  29 => 4,  209 => 82,  203 => 38,  199 => 67,  193 => 35,  189 => 71,  187 => 84,  182 => 66,  176 => 33,  173 => 65,  168 => 69,  164 => 30,  162 => 57,  154 => 29,  149 => 31,  147 => 30,  144 => 49,  141 => 48,  133 => 26,  130 => 25,  125 => 44,  122 => 23,  116 => 41,  112 => 42,  109 => 39,  106 => 36,  103 => 28,  99 => 15,  95 => 28,  92 => 14,  86 => 12,  82 => 12,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 3,  51 => 11,  48 => 11,  45 => 17,  42 => 9,  39 => 8,  36 => 5,  33 => 5,  30 => 1,);
    }
}
