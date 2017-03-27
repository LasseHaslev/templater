<?php

namespace %namespace%\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use %namespace%\%model%;

/**
 * Class %model_plural%Controller
 * @author %name%
 */
class %model_plural%Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $%instance_plural% = %model%::all();
        return view( '%packagename%::index' )
            ->with( compact( '%instance_plural%' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( '%packagename%::create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $%instance% = %model%::create( $request->all() );
        flash( trans( 'crudlang::messages.stored.success', [ 'model'=>$%instance%->name ] ), 'success' );
        return redirect()->route( '%packagename%.%instance_plural%.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( %model% $%instance% )
    {
        return view( '%packagename%::show' )
            ->with( compact( '%instance%' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( %model% $%instance% )
    {
        return view( '%packagename%::edit' )
            ->with( compact( '%instance%' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, %model% $%instance%)
    {
        $%instance%->update( $request->all() );

        flash( trans( 'crudlang::messages.updated.success', [ 'model'=>$%instance%->name ] ), 'success' );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( %model% $%instance% )
    {
        if ( $%instance%->delete() ) {
            flash( trans( 'crudlang::messages.deleted.success', [ 'model'=>$%instance%->name ] ), 'success' );
        }
        else {
            flash( trans( 'crudlang::messages.deleted.error', [ 'model'=>$%instance%->name ] ), 'success' );
        }
        return redirect()->route( '%packagename%.%instance_plural%.index' );
    }
}
