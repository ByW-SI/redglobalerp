<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadoPrestamo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
use PDF;

class EmpleadoPrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $prestamos = $empleado->prestamos;
        return view('empleado.prestamo.index',['empleado'=>$empleado,'prestamos'=>$prestamos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('empleado.prestamo.create', ['empleado' => $empleado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    { 
        $request['monto'] = str_replace(',', "",$request['monto']);
        $request['empleado_id'] = $empleado->id;
        //dd($request->all());
        $prestamo = EmpleadoPrestamo::Create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        $prestamos = $empleado->prestamos;
        return redirect()->route('empleados.prestamos.index',['empleado'=>$empleado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function show(EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    public function getTalon(Empleado $empleado, EmpleadoPrestamo $prestamo)
    {
        $pagos = str_replace(["quincenas", "meses"], "", $prestamo->numero_pagos);
        $pagos = trim($pagos);
        $pdf = PDF::loadView('empleado.prestamo.talon',['empleado'=>$empleado, 'prestamo'=>$prestamo, 'pagos'=>$pagos]);
        return $pdf->download('talon.pdf');
    }

    public function uploadTalon(Empleado $empleado, EmpleadoPrestamo $prestamo)
    {
        return view('empleado.prestamo.cargarTalon', ['empleado'=>$empleado, 'prestamo'=>$prestamo]);
    }

    public function storeTalon(Request $request, Empleado $empleado, EmpleadoPrestamo $prestamo)
    {
        if ($request->talon_path && $request->file('talon_path')->isValid()) {
            $talon_path = $request->talon_path->storeAs('prestamos/'.$empleado->fullname, 'talon_prestamo'.$prestamo->fecha.'.'.$request->talon_path->extension(), 'public');
            $prestamo->imagen_talon = $talon_path;
            $prestamo->save();
            Alert::success('Archivo Guardado', 'Se ha guardado correctamente el archivo');
            return redirect()->route('empleados.prestamos.index',['empleado'=>$empleado]);
        }
        else{
            Alert::danger('Error', 'No se pudo guardar el archivo');
            return back()->withInput();
        }

    }

    public function viewTalon(Empleado $empleado, EmpleadoPrestamo $prestamo)
    {
        return view('empleado.prestamo.showTalon', ['empleado' => $empleado, 'prestamo' => $prestamo]);
    }
}
