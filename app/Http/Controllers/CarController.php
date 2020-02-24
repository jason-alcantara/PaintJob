<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    public function index() {
        return view('index');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'plate_num' => 'required',
            'current'   => 'required',
            'target'    => 'required',
        ]);

        $current = substr($request->input('current'), 7);
        $current = substr($current, 0, -4);

        $target = substr($request->input('target'), 7);
        $target = substr($target, 0, -4);

        $car = new Car;
        
        $car->plate_num = $request->input('plate_num');
        $car->current = $current;
        $car->target = $target;
        
        $car->save();

        return redirect()->route('summary');
    }

    public function summary() {
        $progresses = Car::where('completed', 0)->limit(5)->get();
        $queues = Car::where('completed', 0)->skip(5)->take(10)->get();
        
        $completed = Car::where('completed', 1)->count();
        $green = Car::where('completed', 1)->where('target', 'green')->count();
        $red = Car::where('completed', 1)->where('target', 'red')->count();
        $blue = Car::where('completed', 1)->where('target', 'blue')->count();
        
        return view('summary', ['progresses'=> $progresses, 'queues' => $queues, 'completed' => $completed,
                                'green' => $green, 'red' => $red, 'blue' => $blue]);
    }

    public function completed(Request $request) {
        $carId = $request->input('carId');

        $car = Car::where('id', $carId)->first();

        $car->completed = 1;

        $car->save();

        $data = ['message' => 'Lorem Ipsum', 
         'errors' => []];
        return response()->json($data);
    }
}
