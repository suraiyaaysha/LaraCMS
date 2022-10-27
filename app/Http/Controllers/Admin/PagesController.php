<?php

namespace App\Http\Controllers\Admin;

// Asa
use Auth;
// Asa

use App\Http\Controllers\Controller;
use App\Models\Page;
// Asa
use App\Http\Requests\WorkWithPage;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    // This method for Protecting Admin Route
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // --Secure by Middleware--
        // if(Auth::user()->hasAnyRole(['admin', 'editor'])) {
        //     $pages = Page::all();
        // }
        // else {
        //     $pages = Auth::user()->pages()->get();
        // }
        // return view('admin.pages.index', ['pages' => $pages]);
        // // return view('admin.pages.index', compact('pages'));


        // ---Secure by Helping function---
        if(Auth::user()->isAdminOrEditor()) {
            // $pages = Page::all();
            $pages = Page::paginate(5);
        }
        else {
            // $pages = Auth::user()->pages()->get();
            $pages = Auth::user()->pages()->paginate(5);
        }
        return view('admin.pages.index', ['pages' => $pages]);
        // return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create')->with(['model' => new Page()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(WorkWithPage $request)
    {
        // Auth::User()->pages()->save($request->all());
        Auth::user()->pages()->save(
            new Page($request->only(['title', 'url', 'content']))
        );
        // return redirect()->back();
        
        // return redirect()->route('pages.index');
        return redirect()->route('pages.index')->with('status', 'The page has been created');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Page  $page
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Page $page)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        // return view('admin.pages.edit', ['model' => $page]);

        // ---- Secured by Policy System ----
        if(Auth::user()->cannot('update', $page)) {
            return redirect()->route('pages.index');
        }
        return view('admin.pages.edit', ['model' => $page]);
        // ---- Secured by Policy System ----
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Page $page)
    public function update(WorkWithPage $request, Page $page)
    {
        if(Auth::user()->cannot('update', $page)) {
            return redirect()->route('pages.index');
        }

        $page->fill($request->only(['title', 'url', 'content']));

        $page->save();
        // return redirect()->route('pages.index');
        return redirect()->route('pages.index')->with('status', 'The page was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cannot('delete', $page)) {
            return redirect()->route('pages.index');
        }
    }
}
