<?php

class LanguageController extends BaseController{

    public function chooser(){
        //App::setLocale(Input::get('locale'))

        Session::set('locale',Input::get('locale'));
        return Redirect::back();
    }

}