<?php

class router {

    function __construct() {

        $this->run_router();
    }

    private function item_stack($k, $vv, $pvar) {

        $t = explode('/', $k . '/' . $vv);
        if (strstr($t[1], '$') != FALSE)
            $t[1] = $pvar[substr($t[1], 1)];
        if (strstr($t[2], '$') != FALSE)
            $t[2] = $pvar[substr($t[2], 1)];
        return $t;
    }

    function run_router() {

        //  обходим все маршруты всех модулей
        foreach (app::$ini->ini['blocks_ini'] as $k => $v) {

            foreach ($v['rules'] as $vv) {

                unset($t, $var);
                /// uri
                if (isset($vv['uri'])) {

                    if (preg_match('~' . $vv['uri'] . '~', app::$request->url_static, $pvar)) {

                        $t = $this->item_stack($k, $vv['run'], $pvar);

                        foreach ($vv['var'] as $kkk => $vvv) {
                            $var[$kkk] = $pvar[substr($vvv, 1)];
                        }
                    }
                    else
                        unset($t);
                }

                /// get
                if (isset($vv['get'])) {

                    $z = explode('=', $vv['get']);

                    if (isset($z[1])) {

                        if (app::$request->get[$z[0]] == $z[1]) {
                            $t = $this->item_stack($k, $vv['run'], $pvar);
                        }
                        else
                            unset($t);
                    }
                    else {

                        if (isset(app::$request->get[$z[0]])) {
                            $t = $this->item_stack($k, $vv['run'], $pvar);
                        }
                        else
                            unset($t);
                    }
                }

                /// post

                if (isset($vv['post'])) {

                    $z = explode('=', $vv['post']);

                    if (isset($z[1])) {

                        if (app::$request->post[$z[0]] == $z[1]) {
                            $t = $this->item_stack($k, $vv['run'], $pvar);
                        }
                        else
                            unset($t);
                    }
                    else {

                        if (isset(app::$request->post[$z[0]])) {
                            $t = $this->item_stack($k, $vv['run'], $pvar);
                        }
                        else
                            unset($t);
                    }
                }

                /// ajax
                if (isset($vv['ajax'])) {

                    if (app::$request->is_ajax() === $vv['ajax']) {
                        $t = $this->item_stack($k, $vv['run'], $pvar);
                    }
                    else
                        unset($t);
                }


                if (isset($t)) {
                    if (isset($var))
                        $t[3] = $var;
                    app::$stack[] = $t;
                }
            }
        }
    }

}