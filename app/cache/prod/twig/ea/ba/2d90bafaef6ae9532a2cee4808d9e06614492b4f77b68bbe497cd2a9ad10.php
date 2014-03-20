<?php

/* MangoAPIDocsBundle:Console:layout.html.twig */
class __TwigTemplate_eaba2d90bafaef6ae9532a2cee4808d9e06614492b4f77b68bbe497cd2a9ad10 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'resources' => array($this, 'block_resources'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"container\" id=\"resources_container\">
    <ul id=\"resources\">
        ";
        // line 3
        $this->displayBlock('resources', $context, $blocks);
        // line 4
        echo "    </ul>
</div>
<p id=\"colophon\">
    Documentation auto-generated on ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true);
        echo "
</p>
<script type=\"text/javascript\">

\$(window).load(function() {
    var id = (window.location.hash || '').substr(1).replace( /([:\\.\\[\\]\\{\\}])/g, \"\\\\\$1\");
    var elem = \$('#' + id);
    if (elem.length) {
        setTimeout(function() {
            \$('body,html').scrollTop(elem.position().top);
        });
        elem.find('a.toggler').click();
    }
});

\$('.toggler').click(function() {
    \$(this).next().slideToggle('fast');
});

";
        // line 26
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : null)) {
            // line 27
            echo "var toggleButtonText = function (\$btn) {
    if (\$btn.text() === 'Default') {
        \$btn.text('Raw');
    } else {
        \$btn.text('Default');
    }
};

var renderRawBody = function (\$container) {
    var rawData, \$btn;

    rawData = \$container.data('raw-response');
    \$btn = \$container.parents('.pane').find('.to-raw');

    \$container.addClass('prettyprinted');
    \$container.html(\$('<div/>').text(rawData).html());

    \$btn.removeClass('to-raw');
    \$btn.addClass('to-prettify');

    toggleButtonText(\$btn);
};

var renderPrettifiedBody = function (\$container) {
    var rawData, \$btn;

    rawData = \$container.data('raw-response');
    \$btn = \$container.parents('.pane').find('.to-prettify');

    \$container.removeClass('prettyprinted');
    \$container.html(prettifyResponse(rawData));
    prettyPrint && prettyPrint();

    \$btn.removeClass('to-prettify');
    \$btn.addClass('to-raw');

    toggleButtonText(\$btn);
};

var unflattenDict = function (body) {
    var found = true;
    while(found) {
        found = false;

        for (var key in body) {
            var okey;
            var value = body[key];
            var dictMatch = key.match(/^(.+)\\[([^\\]]+)\\]\$/);

            if(dictMatch) {
                found = true;
                okey = dictMatch[1];
                var subkey = dictMatch[2];
                body[okey] = body[okey] || {};
                body[okey][subkey] = value;
                delete body[key];
            } else {
                body[key] = value;
            }
        }
    }
    return body;
}

\$('.tabs li').click(function() {
    var contentGroup = \$(this).parents('.content');

    \$('.pane.selected', contentGroup).removeClass('selected');
    \$('.pane.' + \$(this).data('pane'), contentGroup).addClass('selected');

    \$('li', \$(this).parent()).removeClass('selected');
    \$(this).addClass('selected');
});

var prettifyResponse = function(text) {
    try {
        var data = typeof text === 'string' ? JSON.parse(text) : text;
        text = JSON.stringify(data, undefined, '  ');
    } catch (err) {
    }

    // HTML encode the result
    return \$('<div>').text(text).html();
};

var displayFinalUrl = function(xhr, method, url, container) {
    container.text(method + ' ' + url);
};

var displayResponseData = function(xhr, container) {
    var data = xhr.responseText;

    container.data('raw-response', data);

    renderPrettifiedBody(container);

    container.parents('.pane').find('.to-prettify').text('Raw');
    container.parents('.pane').find('.to-raw').text('Raw');
};

var displayResponseHeaders = function(xhr, container) {
    var text = xhr.status + ' ' + xhr.statusText + \"\\n\\n\";
    text += xhr.getAllResponseHeaders();

    container.text(text);
};

var displayResponse = function(xhr, method, url, result_container) {
    displayFinalUrl(xhr, method, url, \$('.url', result_container));
    displayResponseData(xhr, \$('.response', result_container));
    displayResponseHeaders(xhr, \$('.headers', result_container));

    result_container.show();
};

\$('.pane.sandbox form').submit(function() {
    var url = \$(this).attr('action'),
            method = \$(this).attr('method'),
            self = this,
            params = {},
            headers = {},
            content = \$(this).find('textarea.content').val(),
            result_container = \$('.result', \$(this).parent());

    if (method === 'ANY') {
        method = 'POST';
    } else if (method.indexOf('|') !== -1) {
        method = method.split('|').sort().pop();
    }

    // set default requestFormat
    var requestFormat = \$('#request_format').val();
    var requestFormatMethod = '";
            // line 159
            echo twig_escape_filter($this->env, (isset($context["requestFormatMethod"]) ? $context["requestFormatMethod"] : null), "html", null, true);
            echo "';
    if (requestFormatMethod == 'format_param') {
        params['_format'] = requestFormat;
    } else if (requestFormatMethod == 'accept_header') {
        headers['Accept'] = 'application/' + requestFormat;
    }

    // set default bodyFormat
    var bodyFormat = \$('#body_format').val();

    if(!('Content-type' in headers)) {
        headers['Content-type'] = 'application/'+bodyFormat;
    }

    // retrieve all the parameters to send
    \$('.parameters .tuple', \$(this)).each(function() {
        var key, value;

        key = \$('.key', \$(this)).val();
        value = \$('.value', \$(this)).val();

        if (value) {
            params[key] = value;
        }
    });

    // retrieve the additional headers to send
    \$('.headers .tuple', \$(this)).each(function() {
        var key, value;

        key = \$('.key', \$(this)).val();
        value = \$('.value', \$(this)).val();

        if (value) {
            headers[key] = value;
        }

    });

    // fix parameters in URL
    for (var key in \$.extend({}, params)) {
        if (url.indexOf('{' + key + '}') !== -1) {
            url = url.replace('{' + key + '}', params[key]);
            delete params[key];
        }
    };

    // disable all the fiels and buttons
    \$('input, button', \$(this)).attr('disabled', 'disabled');

    // append the query authentication
    if (authentication_delivery == 'query') {
        url += url.indexOf('?') > 0 ? '&' : '?';
        url += api_key_parameter + '=' + \$('#api_key').val();
    }

    // prepare the api enpoint
    ";
            // line 216
            if (((((isset($context["endpoint"]) ? $context["endpoint"] : null) == "") && (!(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request")))) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "host"))) {
                // line 217
                echo "var endpoint = '";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "getBaseUrl", array(), "method"), "html", null, true);
                echo "';
    ";
            } else {
                // line 219
                echo "var endpoint = '";
                echo twig_escape_filter($this->env, (isset($context["endpoint"]) ? $context["endpoint"] : null), "html", null, true);
                echo "';
    ";
            }
            // line 221
            echo "if (\$('#api_endpoint') && \$('#api_endpoint').val() != null) {
        endpoint = \$('#api_endpoint').val();
    }

    // prepare final parameters
    var body = {};
    if(bodyFormat == 'json' && method != 'GET') {
        body = unflattenDict(params);
        body = JSON.stringify(body);
    } else {
        body = params;
    }
    var data = content.length ? content : body;

    // and trigger the API call
    \$.ajax({
        url: endpoint + url,
        type: method,
        data: data,
        headers: headers,
        crossDomain: true,
        beforeSend: function (xhr) {
            if (authentication_delivery == 'http_basic') {
                xhr.setRequestHeader('Authorization', 'Basic ' + btoa(\$('#api_key').val() + ':' + \$('#api_pass').val()));
            }else if(authentication_delivery == 'header') {
                xhr.setRequestHeader(api_key_parameter, \$('#api_key').val());
            }
        },
        complete: function(xhr) {
            displayResponse(xhr, method, url, result_container);

            // and enable them back
            \$('input:not(.content-type), button', \$(self)).removeAttr('disabled');
        }
    });

    return false;
});

\$('.operations').on('click', '.operation > a', function(e) {
    if (history.pushState) {
        history.pushState(null, null, \$(this).attr('href'));
        e.preventDefault();
    }
});

\$('.pane.sandbox').on('click', '.to-raw', function(e) {
    renderRawBody(\$(this).parents('.pane').find('.response'));

    e.preventDefault();
});

\$('.pane.sandbox').on('click', '.to-prettify', function(e) {
    renderPrettifiedBody(\$(this).parents('.pane').find('.response'));

    e.preventDefault();
});

\$('.pane.sandbox').on('click', '.to-expand, .to-shrink', function(e) {
    var \$headers = \$(this).parents('.result').find('.headers');
    var \$label = \$(this).parents('.result').find('a.to-expand');

    if (\$headers.hasClass('to-expand')) {
        \$headers.removeClass('to-expand');
        \$headers.addClass('to-shrink');
        \$label.text('Shrink');
    } else {
        \$headers.removeClass('to-shrink');
        \$headers.addClass('to-expand');
        \$label.text('Expand');
    }

    e.preventDefault();
});

\$('.pane.sandbox').on('click', '.add', function() {
    var html = \$(this).parents('.pane').find('.tuple_template').html();

    \$(this).before(html);

    return false;
});

\$('.pane.sandbox').on('click', '.remove', function() {
    \$(this).parent().remove();
});

\$('.pane.sandbox').on('click', '.set-content-type', function(e) {
    var html;
    var \$element;
    var \$headers = \$(this).parents('form').find('.headers');
    var content_type = \$(this).prev('input.value').val();

    e.preventDefault();

    if (content_type.length === 0) {
        return;
    }

    \$headers.find('input.key').each(function() {
        if (\$.trim(\$(this).val().toLowerCase()) === 'content-type') {
            \$element = \$(this).parents('p');
            return false;
        }
    });

    if (typeof \$element === 'undefined') {
        html = \$(this).parents('.pane').find('.tuple_template').html();

        \$element = \$headers.find('legend').after(html).next('p');
    }

    \$element.find('input.key').val('Content-Type');
    \$element.find('input.value').val(content_type);

});

";
            // line 338
            if (((isset($context["authentication"]) ? $context["authentication"] : null) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery") == "http_basic"))) {
                // line 339
                echo "var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), "html", null, true);
                echo "';
";
            } elseif (((isset($context["authentication"]) ? $context["authentication"] : null) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery") == "query"))) {
                // line 341
                echo "var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), "html", null, true);
                echo "';
var api_key_parameter = '";
                // line 342
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "name"), "html", null, true);
                echo "';
var search = window.location.search;
var api_key_start = search.indexOf(api_key_parameter) + api_key_parameter.length + 1;

if (api_key_start > 0 ) {
    var api_key_end = search.indexOf('&', api_key_start);

    var api_key = -1 == api_key_end
            ? search.substr(api_key_start)
            : search.substring(api_key_start, api_key_end);

    \$('#api_key').val(api_key);
}
";
            } elseif (((isset($context["authentication"]) ? $context["authentication"] : null) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery") == "header"))) {
                // line 356
                echo "var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), "html", null, true);
                echo "';
var api_key_parameter = '";
                // line 357
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "name"), "html", null, true);
                echo "';
";
            } else {
                // line 359
                echo "var authentication_delivery = false;
";
            }
        }
        // line 362
        echo "</script>
";
    }

    // line 3
    public function block_resources($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "MangoAPIDocsBundle:Console:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  422 => 359,  412 => 356,  395 => 342,  382 => 338,  257 => 219,  249 => 216,  77 => 36,  70 => 7,  1408 => 419,  1402 => 417,  1400 => 416,  1398 => 415,  1394 => 414,  1385 => 413,  1383 => 412,  1380 => 411,  1367 => 405,  1361 => 403,  1355 => 401,  1353 => 400,  1351 => 399,  1347 => 398,  1341 => 397,  1339 => 396,  1336 => 395,  1323 => 389,  1317 => 387,  1311 => 385,  1309 => 384,  1307 => 383,  1297 => 381,  1291 => 380,  1287 => 379,  1283 => 378,  1279 => 377,  1273 => 376,  1271 => 375,  1268 => 374,  1256 => 369,  1251 => 368,  1249 => 367,  1246 => 366,  1237 => 360,  1231 => 358,  1228 => 357,  1223 => 356,  1211 => 349,  1198 => 346,  1195 => 345,  1190 => 343,  1179 => 338,  1177 => 337,  1162 => 330,  1159 => 329,  1157 => 328,  1154 => 327,  1145 => 322,  1143 => 321,  1118 => 320,  1112 => 318,  1100 => 314,  1095 => 312,  1088 => 308,  1084 => 307,  1079 => 306,  1074 => 304,  1056 => 293,  1053 => 292,  1051 => 291,  1048 => 290,  1036 => 284,  1027 => 281,  1024 => 280,  1014 => 272,  1012 => 271,  1009 => 270,  1004 => 266,  982 => 261,  979 => 260,  976 => 259,  970 => 257,  964 => 255,  961 => 254,  958 => 253,  955 => 252,  952 => 251,  950 => 250,  947 => 249,  934 => 241,  931 => 240,  923 => 236,  920 => 235,  903 => 229,  892 => 225,  881 => 220,  878 => 219,  876 => 218,  862 => 212,  860 => 211,  857 => 210,  846 => 205,  844 => 204,  841 => 203,  833 => 199,  830 => 198,  828 => 197,  825 => 196,  817 => 192,  814 => 191,  812 => 190,  809 => 189,  801 => 185,  798 => 184,  796 => 183,  793 => 182,  785 => 178,  783 => 177,  780 => 176,  772 => 172,  769 => 171,  767 => 170,  753 => 164,  751 => 163,  749 => 162,  746 => 161,  739 => 156,  729 => 155,  697 => 141,  695 => 139,  683 => 135,  680 => 134,  678 => 133,  666 => 126,  662 => 125,  658 => 124,  654 => 123,  649 => 122,  643 => 120,  638 => 118,  635 => 117,  598 => 107,  596 => 106,  593 => 105,  555 => 95,  550 => 94,  547 => 93,  529 => 92,  527 => 91,  515 => 85,  512 => 84,  509 => 83,  503 => 81,  493 => 78,  490 => 77,  478 => 74,  470 => 73,  467 => 72,  464 => 71,  459 => 69,  450 => 64,  442 => 62,  433 => 60,  428 => 59,  414 => 52,  405 => 49,  403 => 48,  400 => 47,  390 => 341,  388 => 42,  385 => 41,  377 => 37,  371 => 35,  366 => 33,  363 => 32,  342 => 23,  316 => 16,  313 => 15,  299 => 8,  288 => 4,  281 => 411,  276 => 395,  271 => 374,  266 => 366,  250 => 341,  248 => 336,  245 => 335,  215 => 280,  212 => 279,  210 => 270,  207 => 269,  194 => 248,  191 => 246,  184 => 233,  174 => 217,  129 => 148,  114 => 111,  1642 => 597,  1638 => 595,  1636 => 594,  1633 => 593,  1626 => 588,  1624 => 587,  1622 => 586,  1619 => 585,  1614 => 582,  1603 => 580,  1598 => 579,  1595 => 578,  1592 => 577,  1583 => 572,  1580 => 571,  1576 => 569,  1570 => 567,  1567 => 566,  1564 => 565,  1558 => 563,  1552 => 561,  1549 => 560,  1546 => 558,  1526 => 556,  1523 => 555,  1520 => 554,  1517 => 553,  1514 => 552,  1511 => 551,  1508 => 550,  1505 => 549,  1503 => 548,  1500 => 547,  1497 => 546,  1494 => 545,  1491 => 544,  1488 => 543,  1485 => 542,  1482 => 541,  1479 => 540,  1475 => 539,  1473 => 538,  1470 => 537,  1463 => 530,  1457 => 528,  1451 => 526,  1449 => 525,  1447 => 524,  1444 => 523,  1437 => 516,  1433 => 514,  1426 => 512,  1423 => 508,  1419 => 507,  1414 => 421,  1411 => 505,  1404 => 503,  1401 => 498,  1396 => 497,  1393 => 496,  1390 => 495,  1387 => 494,  1372 => 492,  1369 => 491,  1365 => 490,  1362 => 489,  1344 => 488,  1342 => 487,  1340 => 486,  1337 => 485,  1329 => 479,  1327 => 478,  1325 => 477,  1322 => 476,  1313 => 472,  1308 => 470,  1306 => 469,  1303 => 382,  1295 => 463,  1284 => 461,  1282 => 460,  1262 => 459,  1259 => 458,  1250 => 453,  1247 => 452,  1244 => 451,  1241 => 450,  1239 => 449,  1236 => 448,  1227 => 443,  1224 => 442,  1221 => 355,  1218 => 354,  1216 => 439,  1213 => 438,  1204 => 434,  1202 => 347,  1199 => 432,  1192 => 344,  1187 => 342,  1185 => 424,  1182 => 423,  1174 => 336,  1168 => 332,  1166 => 413,  1158 => 412,  1153 => 411,  1147 => 409,  1144 => 408,  1142 => 407,  1139 => 406,  1130 => 402,  1124 => 400,  1120 => 399,  1115 => 319,  1109 => 317,  1106 => 316,  1103 => 315,  1101 => 392,  1098 => 313,  1092 => 383,  1086 => 381,  1083 => 380,  1077 => 305,  1075 => 377,  1067 => 299,  1064 => 298,  1061 => 374,  1055 => 370,  1049 => 368,  1046 => 367,  1040 => 285,  1038 => 364,  1032 => 283,  1029 => 282,  1026 => 361,  1019 => 358,  1016 => 276,  1008 => 351,  1002 => 349,  999 => 348,  993 => 346,  990 => 345,  984 => 343,  981 => 342,  975 => 340,  973 => 258,  969 => 338,  967 => 256,  951 => 336,  948 => 335,  945 => 334,  942 => 333,  939 => 243,  936 => 242,  933 => 330,  930 => 329,  927 => 328,  924 => 327,  921 => 326,  918 => 234,  915 => 233,  913 => 323,  911 => 322,  908 => 321,  900 => 228,  897 => 227,  894 => 226,  891 => 314,  889 => 224,  886 => 312,  880 => 306,  873 => 217,  870 => 302,  867 => 301,  865 => 213,  858 => 299,  852 => 297,  849 => 206,  847 => 295,  842 => 294,  840 => 293,  838 => 292,  835 => 291,  827 => 287,  824 => 286,  822 => 285,  819 => 284,  811 => 280,  808 => 279,  806 => 278,  803 => 277,  794 => 271,  790 => 270,  786 => 269,  782 => 268,  778 => 267,  773 => 266,  770 => 265,  764 => 169,  761 => 262,  759 => 261,  756 => 165,  747 => 255,  744 => 254,  738 => 252,  736 => 251,  732 => 250,  727 => 249,  724 => 154,  721 => 153,  715 => 151,  712 => 150,  710 => 149,  707 => 148,  699 => 142,  696 => 140,  694 => 138,  693 => 234,  692 => 233,  690 => 232,  687 => 231,  681 => 229,  675 => 132,  664 => 219,  659 => 217,  655 => 216,  651 => 214,  645 => 212,  642 => 211,  640 => 119,  631 => 209,  628 => 208,  622 => 206,  619 => 113,  617 => 112,  614 => 111,  609 => 201,  607 => 200,  604 => 199,  595 => 193,  592 => 192,  590 => 191,  582 => 187,  579 => 186,  577 => 185,  564 => 99,  556 => 182,  554 => 181,  551 => 180,  544 => 177,  542 => 176,  536 => 173,  534 => 172,  531 => 171,  524 => 90,  522 => 165,  511 => 163,  507 => 161,  505 => 160,  500 => 158,  471 => 153,  460 => 150,  448 => 146,  446 => 145,  443 => 144,  432 => 3,  420 => 132,  410 => 130,  383 => 120,  372 => 118,  367 => 117,  353 => 110,  350 => 26,  339 => 104,  332 => 20,  329 => 100,  323 => 97,  318 => 95,  315 => 94,  308 => 13,  306 => 90,  303 => 89,  300 => 88,  295 => 87,  290 => 5,  287 => 85,  282 => 83,  272 => 77,  259 => 72,  256 => 71,  253 => 342,  251 => 217,  234 => 64,  231 => 63,  225 => 298,  222 => 297,  205 => 54,  188 => 46,  186 => 239,  181 => 232,  172 => 41,  127 => 24,  124 => 132,  118 => 21,  83 => 18,  65 => 4,  211 => 40,  198 => 37,  190 => 34,  152 => 26,  120 => 18,  100 => 27,  81 => 24,  58 => 6,  23 => 1,  161 => 202,  157 => 30,  90 => 40,  84 => 31,  52 => 12,  37 => 12,  689 => 137,  685 => 295,  636 => 248,  630 => 245,  625 => 242,  623 => 241,  615 => 235,  611 => 202,  605 => 232,  581 => 229,  576 => 101,  573 => 226,  570 => 225,  566 => 224,  563 => 223,  560 => 222,  557 => 96,  538 => 174,  533 => 216,  530 => 215,  526 => 214,  523 => 213,  517 => 164,  491 => 206,  488 => 205,  484 => 204,  481 => 203,  456 => 68,  454 => 148,  451 => 147,  449 => 194,  439 => 189,  436 => 188,  434 => 187,  431 => 186,  426 => 58,  417 => 357,  408 => 50,  404 => 126,  396 => 173,  389 => 171,  378 => 162,  376 => 119,  373 => 160,  359 => 154,  351 => 152,  344 => 24,  340 => 149,  327 => 138,  325 => 98,  317 => 133,  311 => 14,  301 => 128,  297 => 127,  293 => 6,  289 => 125,  286 => 124,  279 => 122,  265 => 74,  263 => 221,  260 => 363,  255 => 353,  237 => 65,  233 => 304,  226 => 95,  213 => 90,  202 => 266,  200 => 52,  197 => 249,  192 => 76,  175 => 42,  146 => 181,  134 => 161,  126 => 147,  74 => 14,  53 => 26,  520 => 212,  513 => 403,  510 => 402,  506 => 400,  501 => 80,  496 => 79,  479 => 202,  468 => 380,  466 => 152,  347 => 151,  335 => 21,  333 => 257,  139 => 169,  137 => 67,  110 => 45,  104 => 90,  96 => 67,  76 => 31,  20 => 1,  34 => 7,  480 => 75,  474 => 154,  469 => 158,  461 => 70,  457 => 149,  453 => 151,  444 => 191,  440 => 148,  437 => 61,  435 => 139,  430 => 137,  427 => 362,  423 => 57,  413 => 131,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 122,  387 => 121,  384 => 339,  381 => 120,  379 => 119,  374 => 36,  368 => 34,  365 => 116,  362 => 115,  360 => 109,  355 => 27,  341 => 260,  337 => 22,  322 => 136,  314 => 99,  312 => 98,  309 => 97,  305 => 129,  298 => 91,  294 => 90,  285 => 3,  283 => 123,  278 => 410,  268 => 373,  264 => 84,  258 => 354,  252 => 80,  247 => 78,  241 => 77,  229 => 45,  220 => 290,  214 => 57,  177 => 65,  169 => 210,  140 => 22,  132 => 51,  128 => 49,  111 => 110,  107 => 13,  61 => 4,  273 => 394,  269 => 76,  254 => 92,  246 => 68,  243 => 327,  240 => 326,  238 => 312,  235 => 311,  230 => 303,  227 => 301,  224 => 71,  221 => 77,  219 => 76,  217 => 289,  208 => 55,  204 => 267,  179 => 224,  159 => 196,  143 => 23,  135 => 53,  131 => 160,  119 => 117,  108 => 44,  102 => 12,  71 => 10,  67 => 18,  63 => 25,  59 => 5,  47 => 9,  38 => 5,  94 => 37,  89 => 47,  85 => 25,  79 => 39,  75 => 11,  68 => 6,  56 => 1,  50 => 14,  29 => 3,  87 => 33,  72 => 13,  55 => 27,  21 => 2,  26 => 4,  98 => 31,  93 => 29,  88 => 31,  78 => 22,  46 => 4,  27 => 4,  40 => 18,  44 => 8,  35 => 6,  31 => 7,  43 => 19,  41 => 7,  28 => 2,  201 => 92,  196 => 36,  183 => 73,  171 => 216,  166 => 209,  163 => 38,  158 => 36,  156 => 195,  151 => 188,  142 => 29,  138 => 54,  136 => 168,  123 => 19,  121 => 131,  117 => 17,  115 => 16,  105 => 40,  101 => 89,  91 => 36,  69 => 13,  66 => 7,  62 => 6,  49 => 5,  24 => 3,  32 => 5,  25 => 3,  22 => 1,  19 => 1,  209 => 82,  203 => 38,  199 => 265,  193 => 35,  189 => 159,  187 => 84,  182 => 66,  176 => 223,  173 => 65,  168 => 69,  164 => 203,  162 => 59,  154 => 189,  149 => 182,  147 => 30,  144 => 176,  141 => 175,  133 => 26,  130 => 25,  125 => 44,  122 => 23,  116 => 116,  112 => 42,  109 => 105,  106 => 104,  103 => 28,  99 => 68,  95 => 28,  92 => 14,  86 => 46,  82 => 12,  80 => 17,  73 => 19,  64 => 7,  60 => 20,  57 => 11,  54 => 14,  51 => 13,  48 => 13,  45 => 8,  42 => 10,  39 => 8,  36 => 8,  33 => 4,  30 => 6,);
    }
}
