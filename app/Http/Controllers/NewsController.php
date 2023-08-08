<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsModel;

    public function __construct(News $newsModel)
    {
        $this->newsModel = $newsModel;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = $this->newsModel->all();

        return view('layouts.news.index', [
            'newsList' => $news,
            'title' => 'News List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = $this->newsModel->all();

        return view('layouts.news.form', [
            'news' => $news,
            'title' => 'Create News',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $inputs = $request->all();

        $this->newsModel->create($inputs);

        $request->session()->flash('success', 'Create news successful!');

        return to_route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = $this->newsModel->find($id);

        return view('layouts.news.form', [
            'news' => $news,
            'title' => 'Edit News',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $inputs = $request->all();

        $this->newsModel->find($id)->update($inputs);

        $request->session()->flash('success', 'Update news successful!');

        return to_route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newsId = $this->newsModel->find($id);

        if ($newsId) {
            $newsId->delete();
        }

        return to_route('news.index');
    }
}