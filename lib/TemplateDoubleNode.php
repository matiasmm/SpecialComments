<?php

abstract class TemplateDoubleNode extends TemplateBaseNode{

        protected $content = '';
        protected $tree;

        final function __construct($attributes, $tree){
                foreach($attributes as $k=>$attr){
                    $this->attributes[$k] = trim($attr);
                }
                $this->tree = $tree;
        }

        protected function concatContent(TemplateNode $content_node){
            $this->content .= $content_node->nestedRender();
        }

        function buildContent(){
            foreach($this->tree as $b){
                switch($b->type){
                    case 's':
                        $c = sprintf("Template%sNode", ucfirst($b->text));
                        $o = new $c($b->attributes);
                        $o->setup($b->token);
                        $this->concatContent($o);
                    break;
                    case 'd':
                        $c = sprintf("Template%sNode", ucfirst($b->text));
                        $o = new $c($b->attributes, $b->tree);
                        $o->setup($b->token);
                        $o->buildContent();
                        $this->concatContent($o);
                    break;
                    case 'content':
                        $o = new ContentNode($b);
                        $this->concatContent($o);
                    break;
                    case 'special_html':
                        $r = sprintf('<%s', $b->text);
                        foreach($b->data['html_special_attributes'] as $name => $info){
                            $target_name = $info['modif']->text;

                            if(false == array_key_exists($target_name, $b->data['html_attributes'])){
                                printf("Attribute '%s' not found. Line: %d, Col: %d.", $target_name, $info['name']->data["l"], $info['name']->data["c"]); die;
                            }
                            $value_target = $b->data['html_attributes'][$target_name];
                            unset($b->data['html_attributes'][$target_name]);

                            $c = sprintf("Template%sAttribute", ucfirst($info['name']->text));
                            $value_source = $info['value_source'];

                            $o = new $c;
                            $final_v = $o->render($value_source, $value_target);
                            $r .= sprintf(' %s="%s"', $target_name,$final_v);
                        }

                        foreach($b->data['html_attributes'] as $name => $value){
                            $r .= sprintf(' %s="%s"', $name,$value);
                        }

                        if($b->data['type'] == 's'){
                            $r .=">";

                            $bc = new stdClass();
                            $bc->text  = $r;
                            $o = new ContentNode($bc);
                            $this->concatContent($o);
                        }else{
                            $r .=">";


                            foreach($b->data['html_special_attributes_with_content'] as $name => $value_source){
                                $c = sprintf("Template%sAttribute", ucfirst($name));
                                $o = new $c;
                                $b->data['content'] = $o->render($value_source, $b->data['content']);
                            }

                            $bc = new stdClass();
                            $bc->text  = $r. $b->data['content'] . sprintf("</%s>",$b->text);
                            $o = new ContentNode($bc);
                            $this->concatContent($o);
                        }
                    break;
                }
            }
        }


}
