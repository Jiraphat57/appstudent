<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Travelschool1;
use App\Models\Typeresidence;
use App\Models\Typetitle;
use App\Models\Student4;
use App\Models\SecondarySchool;
use App\Models\HighSchool;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicearea;

class ServiceareaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicearea $servicearea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicearea $servicearea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicearea $servicearea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicearea $servicearea)
    {
        //
    }
}
