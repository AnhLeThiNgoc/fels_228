<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Answer;
use App\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.words.index')->with([
            'words' => Word::paginate(config('custom.paginate.admin.word')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.words.create')->with([
            'categoriesCollection' => Category::all()->pluck('name', 'id'),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $word = Word::create([
                'content' => $data['word'],
                'category_id' => $data['category'],
            ]);
            foreach ($data['answers'] as $key => $answer) {
                $answer = Answer::create([
                    'word_id' => $word->id,
                    'content' => $answer,
                ]);

                if ($key == 0) {
                    $answer->status = 1;
                }
            }
            DB::commit();
            return redirect()
                ->action('Admin\WordController@index')
                ->with('status', trans('keywords.success', [
                    'Action' => trans('keywords.create'),
                    'item' => trans_choice('keywords.words', 1),
                ]));
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->action('Admin\WordController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.words.show')->with([
            'word' => Word::findOrFail($id)
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
        $word = Word::findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        return redirect()->action('Admin\WordController@index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::findOrFail($id);
        return redirect()->action('Admin\WordController@index');
    }
}
