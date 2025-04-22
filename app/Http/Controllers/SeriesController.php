<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use App\Http\Requests\SeriesFormRequest;


class SeriesController extends Controller
{
    public function index(SeriesFormRequest $request)
    {
        $series = Serie::query()->orderBy('name', 'desc')->take(200)->get();
        // dd($series);

        // $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        // $request->session()->forget('mensagem.sucesso');

        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create()
    {
        return view('series.create');
    }
    public function store(SeriesFormRequest $request)
    {
        // $nomeSerie = $request->input('nome');

        // $serie = new Serie();
        // $serie->name = $nomeSerie;
        // $serie->save();

        // $request->validate(['nome' => ['required', 'min:3']]);

        $serie = Serie::create($request->all());
        // dd($serie);

        // session(['mensagem.sucesso' => 'Série adicionada com sucesso.']);
        // $request->session()->flash('mensagem.sucesso', "Série '{$serie->name}' adicionada com sucesso.");

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->name}' adicionada com sucesso.");
    }
    public function destroy(Serie $series)
    {
        // Serie::destroy($request->series);

        $series->delete();
        // $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso.');

        return to_route('series.index')
            ->with('mensagem.sucesso', 'Série removida com sucesso.');
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }
    public function update(Serie $series, SeriesFormRequest $request)
    {
        // $series->name = $request->name;
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso.");

        // return to_route('series.index')
        //     ->withMensagemSucesso('Série atualizada com sucesso.');
    }
}