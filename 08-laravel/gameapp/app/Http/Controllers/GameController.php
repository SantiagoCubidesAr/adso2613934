<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use App\Exports\GameExport;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $games = Game::paginate(20);
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cats = Category::all();
        return view(view:'games.create')->with(key:'cats', value:$cats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('image')) {
            $photo = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $photo);
        }

        $game = new Game;
        $game->title = $request->title;
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->category_id;
        $game->price = $request->price;
        $game->user_id = Auth::user()->id;
        $game->genre = $request->genre;
        $game->slider = $request->slider;
        $game->description = $request->description;
        $game->image = $photo;

        if ($game->save()) {
            return redirect('games')->with('message', 'The user: ' . $game->title . 'was successfully added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
        $cats = Category::all();
        return view('games.edit')
                ->with('game', $game)
                ->with('cats', $cats);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //

        if ($request->hasFile('image')) {
            $photo = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $photo);
        } else {
            $photo = $request->originphoto;
        }

        $game->title = $request->title;
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->category_id;
        $game->price = $request->price;
        $game->user_id = Auth::user()->id;
        $game->genre = $request->genre;
        $game->slider = $request->slider;
        $game->description = $request->description;
        $game->image = $photo;

        if ($game->save()) {
            return redirect('games')->with('message', 'The user: '. $game->title. 'was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if($game->delete()) {
            return redirect('games')->with('message', 'The category:'. $game->title . 'was successfully deleted!');
        }
    }

    public function search(Request $request){
        $games = Game::names($request->q)->paginate(20);
        return view('games.search')->with('games', $games);
    }

    public function pdf() {
        $games = Game::all();
        $pdf = PDF::loadView('games.pdf', compact('games'));
        return $pdf->download('allgames.pdf');
    }
    public function excel() {
        return \Excel::download(new GameExport, 'allgames.xlsx');
    }
}
