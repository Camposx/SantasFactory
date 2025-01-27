<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ToyController extends Controller
{

    public function index()
    {
        $toys = Toy::get();
        foreach($toys as $toy){
            $description = substr($toy->description, 0, 100);
            $toy->description = $description;

        }
        return view('toys', compact('toys'));
    }

    public function create()
    {
        return view('createToyForm');
    }

    public function store(Request $request)
    {
        $toys = Toy::create([
            'name' => $request->name,
            'photo' => $request->photo,
            'description' => $request->description,
            'age_range' => $request->age_range,
        ]);
        $toys->save();

        return Redirect::to(route('toyshome'));
    }

    public function show(string $id)
    {
        $toys = Toy::find($id);

        return view('showToy', compact('toys'));
    }

    public function edit(string $id)
    {
        $toy = Toy::find($id);

        return view('editToyForm', compact('toy'));
    }

    public function update(Request $request, string $id)
    {
        $toys = Toy::find($id);

        $toys -> update([
            'name' => $request->name,
            'photo' => $request->photo,
            'description' => $request->description,
            'age_range' => $request->age_range,
        ]);

        $toys -> save();
        return Redirect::to(route('toyshome'));
    }

    public function destroy(string $id)
    {
        $toys = Toy::find($id);

        $toys-> delete();
        return Redirect::to(route('toyshome'));
    }

    public function topToys() {
        $topToys = Toy::withCount('kids')->orderBy('kids_count', 'desc')->take(3)->get();

        return $topToys;
    }
    public function countRangeAgeToys( string $value){
        $toyCount= Toy::where('age_range', $value)->count();
        return $toyCount;
    }
    public function arrayCountRangeAgeToys(){
        $dic = ['0-3', '3-7', '7-12', '12-16', '16-18', '+18'];
        $toys=[];
        foreach ($dic as $key){
            $toy = $this->countRangeAgeToys($key);
            $toys[]=$toy;
        }
        return $toys;
    }
}
