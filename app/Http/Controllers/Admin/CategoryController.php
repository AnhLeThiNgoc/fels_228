<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with([
            'categories' => Category::paginate(config('custom.paginate.admin.category')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()
            ->action('Admin\CategoryController@index')
            ->with('status', trans('keywords.success', [
                'Action' => trans('keywords.create'),
                'item' => trans_choice('keywords.categories', 1),
            ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findorFail($id);
        $words = $category->words()->paginate(config('custom.paginate.admin.word'));

        return view('admin.categories.show')->with([
            'category' => $category,
            'words' => $words,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit')->with([
            'category' => Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, $id)
    {
        $data = $request->all();
        Category::where('id', $id)->update([
            'name' => $data['name']
        ]);

        return redirect()
            ->action('Admin\CategoryController@index')
            ->with('status', trans('keywords.success', [
                'Action' => trans('keywords.update'),
                'item' => trans_choice('keywords.categories', 1),
            ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->action('Admin\CategoryController@index');
    }
}
