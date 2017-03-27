<?php

namespace <% package.namespace %>\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use <% namespacemodel %>;

/**
 * Class <% model.plural %>Controller
 * @author <% author.name %>
 */
class <% model.plural %>Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $<% model.instances.plural %> = <% model.single %>::all();
        return view( '<% package.name %>::index' )
            ->with( compact( '<% model.instances.plural %>' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( '<% package.name %>::create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $<% model.instances.single %> = <% model.single %>::create( $request->all() );
        flash( trans( 'crudlang::messages.stored.success', [ 'model'=>$<% model.instances.single %>->name ] ), 'success' );
        return redirect()->route( '<% package.name %>.<% model.instances.plural %>.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( <% model.single %> $<% model.instances.single %> )
    {
        return view( '<% package.name %>::show' )
            ->with( compact( '<% model.instances.single %>' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( <% model.single %> $<% model.instances.single %> )
    {
        return view( '<% package.name %>::edit' )
            ->with( compact( '<% model.instances.single %>' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, <% model.single %> $<% model.instances.single %>)
    {
        $<% model.instances.single %>->update( $request->all() );

        flash( trans( 'crudlang::messages.updated.success', [ 'model'=>$<% model.instances.single %>->name ] ), 'success' );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( <% model.single %> $<% model.instances.single %> )
    {
        if ( $<% model.instances.single %>->delete() ) {
            flash( trans( 'crudlang::messages.deleted.success', [ 'model'=>$<% model.instances.single %>->name ] ), 'success' );
        }
        else {
            flash( trans( 'crudlang::messages.deleted.error', [ 'model'=>$<% model.instances.single %>->name ] ), 'success' );
        }
        return redirect()->route( '<% package.name %>.<% model.instances.plural %>.index' );
    }
}
