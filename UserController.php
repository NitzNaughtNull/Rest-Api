<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YourModel; // Zastąp "YourModel" odpowiednią nazwą modelu związanego z Twoją aplikacją

class YourController extends Controller
{
    // CREATE - Dodawanie nowego rekordu
    public function store(Request $request)
    {
        // Walidacja requestu
        $this->validate($request, [
            'field1' => 'required',
            'field2' => 'required',
            // Dodaj inne pola do walidacji
        ]);

        // Stworzenie nowego rekordu
        YourModel::create($request->all());

        return response()->json(['message' => 'Rekord dodany pomyślnie'], 201);
    }

    // READ - Pobieranie wszystkich rekordów
    public function index()
    {
        $records = YourModel::all();
        return response()->json($records, 200);
    }

    // READ - Pobieranie jednego rekordu
    public function show($id)
    {
        $record = YourModel::find($id);

        if (!$record) {
            return response()->json(['message' => 'Rekord nie znaleziony'], 404);
        }

        return response()->json($record, 200);
    }

    // UPDATE - Aktualizacja rekordu
    public function update(Request $request, $id)
    {
        // Walidacja requestu
        $this->validate($request, [
            'field1' => 'required',
            'field2' => 'required',
            // Dodaj inne pola do walidacji
        ]);

        $record = YourModel::find($id);

        if (!$record) {
            return response()->json(['message' => 'Rekord nie znaleziony'], 404);
        }

        $record->update($request->all());

        return response()->json(['message' => 'Rekord zaktualizowany pomyślnie'], 200);
    }

    // DELETE - Usuwanie rekordu
    public function destroy($id)
    {
        $record = YourModel::find($id);

        if (!$record) {
            return response()->json(['message' => 'Rekord nie znaleziony'], 404);
        }

        $record->delete();

        return response()->json(['message' => 'Rekord usunięty pomyślnie'], 200);
    }
}
