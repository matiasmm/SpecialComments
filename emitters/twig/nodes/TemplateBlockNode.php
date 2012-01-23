<?php

class TemplateBlockNode extends TemplateDoubleNode implements TemplateNodeVerifyWithContext {

    protected $mandatory_attributes = array("name");
    protected $allowed_attributes = array("name", "parameters");
    protected $attributes_aliases = array("name" => array('block'));
    public $called_render_for_theme = array();
    static protected $blocks_rendered_call = array();
    
    protected $parameters = array();

    protected function getParametersString($with_default=false) {
            $rtr = '';
            $pars = explode(',', $this->attributes['parameters']);
            $i = 0;
            foreach ($pars as $p) {
                if(!trim($p)){
                    continue;
                }
                $str_par = current(explode('=', $p));
                $rtr.= '$'.$str_par;
                $this->parameters[] = $str_par;
                if (isset($pars[$i + 1]))
                    $rtr.=',';
                $i++;
            }
            return $rtr;
    }
    
    function createContext(){
        $r  = '$context = array(';
        foreach((array)$this->attributes['parameters'] as $par){
            $r .= sprintf('"%s"=> $%s,', $par, $par);
        }
        $r .= ');'; 
        return $r;
    }

    function render() {

        $this->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();

        $name = $this->attributes["name"];

        $pars = $this->getParametersString();

        return sprintf(<<<EOF
	<?php function $name($pars){ 
            %s
		%s
	} ?>


EOF
        , $this->createContext() 
        , TwigTemplateCreator::twigToPhp($this->content));
    }

    function nestedRender() {
        $name = $this->attributes["name"];
        $pars = $this->getParametersString();

        return sprintf(<<<EOF
	public function $name($pars){\n  ob_start();\n  %s %s \n  return ob_get_clean(); \n}\n

EOF
                , $this->createContext() 
                , TwigTemplateCreator::twigToPhp(trim($this->content)));
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
