<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $types = Type::all();
    return view('admin.types.index', compact('types'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $type = new Type();
    return view('admin.types.create', compact('type'));
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
      'label.regex' => 'Il colore inserito non è valido.',
    ]);

    $data = $request->all();

    $type = new Type();

    $type->fill($data);

    $type->save();

    return to_route('admin.types.index', compact('type'))->with('type', 'success')->with('message', 'Il tipo è stato creato con successo!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Type $type)
  {
    return view('admin.types.edit', compact('type'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Type $type)
  {
    //! Validazione
    $request->validate([
      'label' => ['required', Rule::unique('types', 'label')->ignore($type)],
      'color' => 'nullable'
    ], [
      'label.required' => 'Il titolo è obbligatorio.',
      'label.unique' => 'Il titolo è già stato inserito.',
      'label.regex' => 'Il colore inserito non è valido.',
    ]);
    $data = $request->all();

    $type->update($data);
    return to_route('admin.types.index', compact('type'))->with('type', 'success')->with('message', 'Il tipo è stato modificato con successo!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Type $type)
  {
    $type->forceDelete();
    return to_route('admin.types.index')->with('type', 'success')->with('message', 'Il tipo è stato rimosso correttamente!');
  }
}
