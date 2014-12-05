<?php

class PortfolioController extends \BaseController
{


    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // need to display better with dropdown menu
        $portfolios = Portfolio::All();
        return View::make('backend.portfolio.all')
            ->withPortfolios($portfolios);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('backend.portfolio.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //begin validate
        $rules = array
        (
            'url' => array('required', 'unique:portfolios','active_url','url'),
            'picture' => array('required'),
            'name' => array('required', 'unique:portfolios'),
            'testimony' => array('required'),
            'author' => array('required'),
        );

        //Validate the entries
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::action('PortfolioController@create')->withErrors($validator)->withInput();
        }

        Input::file('picture')->move( public_path() .'/asset/portfolio/',Input::file('picture')->getClientOriginalName());

        $input = New Portfolio;
        $input->url = Input::get('url');
        $input->picture = Input::file('picture')->getClientOriginalName();
        $input->name = Input::get('name');
        $input->testimony = Input::get('testimony');
        $input->author = Input::get('author');
        $input->save();

        return Redirect::action('PortfolioController@index')->withMsg(Lang::get('messages.success_store'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        return View::make('backend.portfolio.edit')
            ->withPortfolio(Portfolio::findorFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $id = Hashids::decode($id)[0];
        //begin validate
        $rules = array
        (
            'url' => 'required|unique:portfolios|url|active_url,url' . ($id ? ",$id" : ''),
            'name' => 'required|unique:portfolios,name' . ($id ? ",$id" : ''),
            'testimony' => 'required|unique:portfolios,name' . ($id ? ",$id" : ''),
            'author' => 'required',
        );

        //Validate the entries
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::action('PortfolioController@edit',Hashids::encode($id))->withErrors($validator)->withInput();
        }

        $input = Portfolio::findOrFail($id);

        if (Input::file('picture')){
            // If new picture is requested delete the previous picture and Upload new one
            File::delete(public_path() .'/asset/portfolio/'.$input->picture);
            Input::file('picture')->move( public_path() .'/asset/portfolio/',Input::file('picture')->getClientOriginalName());
            $input->picture = Input::file('picture')->getClientOriginalName();
        }

        $input->url = Input::get('url');
        $input->name = Input::get('name');
        $input->testimony = Input::get('testimony');
        $input->author = Input::get('author');
        $input->save();

        return Redirect::action('PortfolioController@index')->withMsg(Lang::get('messages.success_update'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];

        $portfolio = Portfolio::findOrFail($id);
        File::delete(public_path() .'/asset/portfolio/'.$portfolio->picture);
        $portfolio->delete();

        return Redirect::action('PortfolioController@index')->withMsg(Lang::get('messages.success_destroy'));
    }


}
