<?php
    class FileNode extends TemplateDoubleNode{

        public $themes = array();

        protected function concatContent(TemplateNode $content_node){
            if($content_node instanceof TemplateThemesNode){
                $this->themes = split(',',str_replace(' ','',$content_node->getAttribute('themes')));
                return;
            }

            $this->content .= $content_node->render();
        }

        public function  render() {
            return $this->content;
        }

        public function  renderCall($generated_dir_name, $helper_base_file, array $options = array()) {
            ;
        }

        public function  nestedRender() {
            ;
        }

    }
