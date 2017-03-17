<?php

class ZurbPresenter extends Illuminate\Pagination\Presenter {

    public function getActivePageWrapper($text)
    {
        return '<li class="disabled"><a href="javascript:void(0);">'.$text.'</a></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="active"><a href="javascript:void(0);">'.$text.'</a></li>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        return '<li><a href="javascript:void(0);" data-value="'.$page.'" onclick="getProducts('.$page.')">'.$page.'</a></li>';
    }

}
