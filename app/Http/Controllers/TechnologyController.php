<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $technologies = Technology::all();
    return view('admin.technologies.index', compact('technologies'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $technology = new Technology();
    return view('admin.technologies.create', compact('technology'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //! Validazione
    $request->validate([
      'label' => ['required', Rule::unique('types', 'label')],
      'color' => 'nullable'
    ], [
      'label.required' => 'Il titolo è obbligatorio.',
      'label.unique' => 'Il titolo è già stato inserito.',
    ]);

    $data = $request->all();

    $technology = new Technology();

    $technology->fill($data);

    $technology->save();

    return to_route('admin.technologies.index', compact('technology'))->with('type', 'success')->with('message', 'Il linguaggio è stato creato con successo!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Technology $technology)
  {
    return view('admin.technologies.edit', compact('technology'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Technology $technology)
  {
    //! Validazione
    $request->validate([
      'label' => ['required', Rule::unique('types', 'label')],
      'color' => 'nullable'
    ], [
      'label.required' => 'Il titolo è obbligatorio.',
      'label.unique' => 'Il titolo è già stato inserito.',
    ]);

    $data = $request->all();


    $technology->update($data);

    return to_route('admin.technologies.index', compact('technology'))->with('type', 'success')->with('message', 'Il linguaggio è stato modificato con successo!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Technology $technology)
  {
    $technology->forceDelete();
    return to_route('admin.technologies.index')->with('type', 'success')->with('message', 'Il linguaggio è stato rimosso correttamente!');
  }
}
