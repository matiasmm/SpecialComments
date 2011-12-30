<?php

class TemplateBlockNode extends TemplateDoubleNode implements TemplateNodeVerifyWithContext {

    protected $mandatory_attributes = array("name");
    protected $allowed_attributes = array("name", "parameters");
    protected $attributes_aliases = array("name" => array('block'));
    public $called_render_for_theme = array();
    static protected $blocks_rendered_call = array();

    protected function getParametersString($with_default=false) {
        if (!$with_default) {
            $rtr = '';
            $pars = explode(',', $this->attributes['parameters']);
            $i = 0;
            foreach ($pars as $p) {
                $rtr.= current(explode('=', $p));
                if (isset($pars[$i + 1]))
                    $rtr.=',';
                $i++;
            }
            return $rtr;
        }
        return $this->attributes['parameters'];
    }

    function render() {

        $this->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();

        $name = $this->attributes["name"];

        $pars = $this->getParametersString();

        return sprintf(<<<EOF
	<?php function $name($pars){ ?>
		%s
	<?php } ?>


EOF
                , $this->content);
    }

    function nestedRender() {
        $name = $this->attributes["name"];
        $pars = $this->getParametersString();

        return sprintf(<<<EOF
	public function $name($pars){\n  ob_start();\n  ?>%s<?php \n  return ob_get_clean(); \n}\n

EOF
                , trim($this->content));
    }

    function getAttrName() {
        return $this->attributes["name"];
    }

    function check(array $context) {
        foreach ($context as $n) {
            if (get_class($n) == 'TemplateBlockNode') {
                if ($n !== $this && $n->getAttrName() == $this->getAttrName()) {
                    $not_ok = true;
                    $mg_theme = '';

                    $comparten_theme = false;
                    foreach ($this->called_render_for_theme as $themes_where_applied) {
                        if (in_array($themes_where_applied, $n->called_render_for_theme)) {
                            $mg_theme = " for theme '$themes_where_applied'";
                            $comparten_theme = true;
                        }
                    }

                    if (count($this->called_render_for_theme)) { //si tiene varios themes
                        if ($comparten_theme == false) {
                            $not_ok = false;
                        } else {
                            $not_ok = true;
                        }
                    }

                    if ($not_ok) {
                        $name = $this->getAttrName();
                        $f1 = $this->info;
                        $f2 = $n->info;
                        throw new Exception("There are 2 helpers named '$name'$mg_theme in: \n'$f1' \nand:\n '$f2'");
                    }
                }
            }
        }
    }

}
