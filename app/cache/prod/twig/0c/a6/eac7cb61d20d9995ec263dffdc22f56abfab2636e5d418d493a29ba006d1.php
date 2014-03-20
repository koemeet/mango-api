<?php

/* MopaBootstrapBundle::flash.html.twig */
class __TwigTemplate_0ca6eac7cb61d20d9995ec263dffdc22f56abfab2636e5d418d493a29ba006d1 extends Twig_Template
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
        // line 13
        echo "
";
        // line 32
        echo "
";
    }

    // line 1
    public function getflash($_type = null, $_message = null, $_close = null, $_use_raw = null, $_class = null, $_domain = null)
    {
        $context = $this->env->mergeGlobals(array(
            "type" => $_type,
            "message" => $_message,
            "close" => $_close,
            "use_raw" => $_use_raw,
            "class" => $_class,
            "domain" => $_domain,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <div class=\"alert";
            echo twig_escape_filter($this->env, (((isset($context["type"]) ? $context["type"] : null)) ? ((" alert-" . (isset($context["type"]) ? $context["type"] : null))) : ("")), "html", null, true);
            echo " fade in ";
            echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) ? $context["class"] : null), "")) : ("")), "html", null, true);
            echo " ";
            if (((array_key_exists("close", $context)) ? (_twig_default_filter((isset($context["close"]) ? $context["close"] : null), false)) : (false))) {
                echo "alert-dismissable";
            }
            echo "\">
    ";
            // line 3
            if (((array_key_exists("close", $context)) ? (_twig_default_filter((isset($context["close"]) ? $context["close"] : null), false)) : (false))) {
                // line 4
                echo "        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
    ";
            }
            // line 6
            echo "    ";
            if (((array_key_exists("use_raw", $context)) ? (_twig_default_filter((isset($context["use_raw"]) ? $context["use_raw"] : null), false)) : (false))) {
                // line 7
                echo "        ";
                echo $this->env->getExtension('translator')->trans((isset($context["message"]) ? $context["message"] : null), array(), ((array_key_exists("domain", $context)) ? (_twig_default_filter((isset($context["domain"]) ? $context["domain"] : null), "messages")) : ("messages")));
                echo "
    ";
            } else {
                // line 9
                echo "        ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["message"]) ? $context["message"] : null), array(), ((array_key_exists("domain", $context)) ? (_twig_default_filter((isset($context["domain"]) ? $context["domain"] : null), "messages")) : ("messages"))), "html", null, true);
                echo "
    ";
            }
            // line 11
            echo "    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 14
    public function getadvanced_flash($_type = null, $_heading = null, $_message = null, $_close_tag = null, $_use_raw = null, $_class = null, $_domain = null)
    {
        $context = $this->env->mergeGlobals(array(
            "type" => $_type,
            "heading" => $_heading,
            "message" => $_message,
            "close_tag" => $_close_tag,
            "use_raw" => $_use_raw,
            "class" => $_class,
            "domain" => $_domain,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 15
            echo "    <div class=\"alert";
            echo twig_escape_filter($this->env, (((isset($context["type"]) ? $context["type"] : null)) ? ((" alert-" . (isset($context["type"]) ? $context["type"] : null))) : ("")), "html", null, true);
            echo " fade in ";
            echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) ? $context["class"] : null), "")) : ("")), "html", null, true);
            echo " ";
            if (((array_key_exists("close_tag", $context)) ? (_twig_default_filter((isset($context["close_tag"]) ? $context["close_tag"] : null), false)) : (false))) {
                echo "alert-dismissable";
            }
            echo "\">
    ";
            // line 16
            if (((array_key_exists("close_tag", $context)) ? (_twig_default_filter((isset($context["close_tag"]) ? $context["close_tag"] : null), false)) : (false))) {
                // line 17
                echo "        ";
                if (((isset($context["close_tag"]) ? $context["close_tag"] : null) == true)) {
                    // line 18
                    echo "            ";
                    $context["close_tag"] = "a";
                    // line 19
                    echo "        ";
                }
                // line 20
                echo "        <";
                echo twig_escape_filter($this->env, (isset($context["close_tag"]) ? $context["close_tag"] : null), "html", null, true);
                echo " class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" ";
                if (((isset($context["close_tag"]) ? $context["close_tag"] : null) == "a")) {
                    echo "href=\"#\"";
                } elseif (((isset($context["close_tag"]) ? $context["close_tag"] : null) == "button")) {
                    echo "type=\"button\"";
                }
                echo ">&times;</";
                echo twig_escape_filter($this->env, (isset($context["close_tag"]) ? $context["close_tag"] : null), "html", null, true);
                echo ">
    ";
            }
            // line 22
            echo "    ";
            if (((array_key_exists("heading", $context)) ? (_twig_default_filter((isset($context["heading"]) ? $context["heading"] : null), false)) : (false))) {
                // line 23
                echo "    <h4 class=\"alert-heading\">";
                echo twig_escape_filter($this->env, (isset($context["heading"]) ? $context["heading"] : null), "html", null, true);
                echo "</h4>
    ";
            }
            // line 25
            echo "    ";
            if (((array_key_exists("use_raw", $context)) ? (_twig_default_filter((isset($context["use_raw"]) ? $context["use_raw"] : null), false)) : (false))) {
                // line 26
                echo "        ";
                echo $this->env->getExtension('translator')->trans((isset($context["message"]) ? $context["message"] : null), array(), ((array_key_exists("domain", $context)) ? (_twig_default_filter((isset($context["domain"]) ? $context["domain"] : null), "messages")) : ("messages")));
                echo "
    ";
            } else {
                // line 28
                echo "        ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["message"]) ? $context["message"] : null), array(), ((array_key_exists("domain", $context)) ? (_twig_default_filter((isset($context["domain"]) ? $context["domain"] : null), "messages")) : ("messages"))), "html", null, true);
                echo "
    ";
            }
            // line 30
            echo "    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 33
    public function getsession_flash($_close = null, $_use_raw = null, $_class = null, $_domain = null)
    {
        $context = $this->env->mergeGlobals(array(
            "close" => $_close,
            "use_raw" => $_use_raw,
            "class" => $_class,
            "domain" => $_domain,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 34
            echo "    ";
            $context["flash_messages"] = $this;
            // line 35
            echo "
    ";
            // line 36
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "peekAll")) > 0)) {
                // line 37
                echo "        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "all"));
                foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
                    // line 38
                    echo "            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                        // line 39
                        echo "                ";
                        if (((isset($context["type"]) ? $context["type"] : null) == "fos_user_success")) {
                            // line 40
                            echo "                    ";
                            $context["type"] = "success";
                            // line 41
                            echo "                    ";
                            $context["domain"] = "FOSUserBundle";
                            // line 42
                            echo "                ";
                        }
                        // line 43
                        echo "                ";
                        echo $context["flash_messages"]->getflash((isset($context["type"]) ? $context["type"] : null), (isset($context["message"]) ? $context["message"] : null), (isset($context["close"]) ? $context["close"] : null), (isset($context["use_raw"]) ? $context["use_raw"] : null), (isset($context["class"]) ? $context["class"] : null), (isset($context["domain"]) ? $context["domain"] : null));
                        echo "
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 45
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle::flash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 40,  198 => 37,  190 => 34,  152 => 26,  120 => 18,  100 => 27,  81 => 24,  58 => 18,  23 => 3,  161 => 32,  157 => 30,  90 => 15,  84 => 13,  52 => 6,  37 => 8,  689 => 297,  685 => 295,  636 => 248,  630 => 245,  625 => 242,  623 => 241,  615 => 235,  611 => 233,  605 => 232,  581 => 229,  576 => 227,  573 => 226,  570 => 225,  566 => 224,  563 => 223,  560 => 222,  557 => 221,  538 => 218,  533 => 216,  530 => 215,  526 => 214,  523 => 213,  517 => 211,  491 => 206,  488 => 205,  484 => 204,  481 => 203,  456 => 197,  454 => 196,  451 => 195,  449 => 194,  439 => 189,  436 => 188,  434 => 187,  431 => 186,  426 => 183,  417 => 179,  408 => 177,  404 => 176,  396 => 173,  389 => 171,  378 => 162,  376 => 161,  373 => 160,  359 => 154,  351 => 152,  344 => 150,  340 => 149,  327 => 138,  325 => 137,  317 => 133,  311 => 132,  301 => 128,  297 => 127,  293 => 126,  289 => 125,  286 => 124,  279 => 122,  265 => 110,  263 => 109,  260 => 108,  255 => 105,  237 => 98,  233 => 97,  226 => 95,  213 => 90,  202 => 81,  200 => 80,  197 => 79,  192 => 76,  175 => 71,  146 => 55,  134 => 51,  126 => 20,  74 => 23,  53 => 14,  520 => 212,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 208,  479 => 202,  468 => 380,  466 => 199,  347 => 151,  335 => 258,  333 => 257,  139 => 53,  137 => 67,  110 => 45,  104 => 15,  96 => 17,  76 => 24,  20 => 1,  34 => 5,  480 => 162,  474 => 382,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 191,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 172,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 157,  365 => 111,  362 => 110,  360 => 109,  355 => 153,  341 => 260,  337 => 103,  322 => 136,  314 => 99,  312 => 98,  309 => 97,  305 => 129,  298 => 91,  294 => 90,  285 => 89,  283 => 123,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 45,  220 => 43,  214 => 41,  177 => 65,  169 => 60,  140 => 22,  132 => 51,  128 => 49,  111 => 40,  107 => 36,  61 => 13,  273 => 200,  269 => 94,  254 => 92,  246 => 101,  243 => 88,  240 => 86,  238 => 85,  235 => 46,  230 => 96,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 42,  208 => 39,  204 => 72,  179 => 72,  159 => 61,  143 => 23,  135 => 53,  131 => 50,  119 => 22,  108 => 44,  102 => 21,  71 => 27,  67 => 18,  63 => 7,  59 => 17,  47 => 8,  38 => 6,  94 => 33,  89 => 35,  85 => 33,  79 => 26,  75 => 11,  68 => 20,  56 => 4,  50 => 8,  29 => 4,  87 => 14,  72 => 20,  55 => 12,  21 => 2,  26 => 2,  98 => 31,  93 => 29,  88 => 31,  78 => 10,  46 => 9,  27 => 1,  40 => 11,  44 => 9,  35 => 5,  31 => 4,  43 => 2,  41 => 10,  28 => 4,  201 => 92,  196 => 36,  183 => 73,  171 => 70,  166 => 71,  163 => 62,  158 => 28,  156 => 66,  151 => 57,  142 => 59,  138 => 54,  136 => 24,  123 => 19,  121 => 46,  117 => 17,  115 => 16,  105 => 40,  101 => 41,  91 => 27,  69 => 9,  66 => 15,  62 => 19,  49 => 5,  24 => 6,  32 => 5,  25 => 3,  22 => 32,  19 => 13,  209 => 82,  203 => 38,  199 => 67,  193 => 35,  189 => 71,  187 => 84,  182 => 66,  176 => 33,  173 => 65,  168 => 69,  164 => 30,  162 => 59,  154 => 29,  149 => 25,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 23,  116 => 41,  112 => 42,  109 => 39,  106 => 33,  103 => 28,  99 => 36,  95 => 28,  92 => 36,  86 => 30,  82 => 12,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 3,  51 => 11,  48 => 11,  45 => 8,  42 => 9,  39 => 8,  36 => 5,  33 => 5,  30 => 1,);
    }
}
