<?php

class Navigation
{
    public $count_glob;
    public $count_page;
    public $total;
    public $page;
    public $start;
    public $url;

    public function __construct($count_glob, $count_page, $page, $url)
    {

        $this->url = $url;
        $this->count_page = $count_page;
        $this->count_glob = $count_glob;;
        $this->total = intval(($count_glob - 1) / $count_page + 1);
        $this->page = $page;
        if(empty($page)){
            $this->page = 1;
        };
        if($this->page > $this->total){
            $this->page = $this->total;
        }

        $this->start = $this->page * $count_page - $count_page;
    }

    public function view($prev = "<", $next = ">")
    {
        if($this->count_glob == 0 || $this->total <= 1) return false;

        $html = '<div class="navigation">';

        if($this->page != 1){
            $html .= '<a class="navigation__prev" href= "'.$this->url.'/'. ($this->page - 1) .'">'.$prev.'</a>';
        }
        if($this->page - 2 > 0){
            $html .= '<a class="navigation__page" href="'.$this->url.'/'. ($this->page - 2) .'">'. ($this->page - 2) .'</a>';
        }
        if($this->page - 1 > 0){
            $html .= '<a class="navigation__page" href="'.$this->url.'/'. ($this->page - 1) .'">'. ($this->page - 1) .'</a>';
        }

        $html .= '<span class="navigation__flowing">'.$this->page.'</span>';

        if($this->page + 1 <= $this->total){
            $html .= '<a class="navigation__page" href="'.$this->url.'/'. ($this->page + 1) .'">'. ($this->page + 1) .'</a>';
        }
        if($this->page + 2 <= $this->total){
            $html .= '<a class="navigation__page" href="'.$this->url.'/'. ($this->page + 2) .'">'. ($this->page + 2) .'</a>';
        }
        if($this->page != $this->total){
            $html .= '<a class="navigation__next" href="'.$this->url.'/'. ($this->page + 1) .'">'.$next.'</a>';
        }

        $html .= '</div>';

        echo $html;
    }
}