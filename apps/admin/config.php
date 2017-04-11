<?php

return [
    'view_replace_str' => [
        ' src="image'     => ' src="/static/admin/image',
        ' href="css/'     => ' href="/static/admin/css/',
        ' src="js/'       => ' src="/static/admin/js/',
        ' src="upload/'   => ' src="/upload/',
        ' rel="upload/'   => ' rel="/upload/',
        '.css" '          => '.css?v=1.0.0" ',
        '.css">'          => '.css?v=1.0.0">',
        '.js" '           => '.js?v=1.0.0" ',
        '.js">'           => '.js?v=1.0.0">',
    ],
];