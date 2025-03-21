<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\NameOffice;
use App\Models\Address;
use App\Models\Phone;
use App\Models\Email;
use App\Models\VisiOffice;
use App\Models\MisiOffice;
use App\Models\Product;
use App\Models\Team;
use App\Models\BusinessPartner;
use App\Models\Gallery;
use App\Models\JobAssociate;
use App\Models\Testimoni;
use App\Models\Hero;
use App\Models\Aboutus;
use App\Models\Artikel;
use App\Models\JobIntership;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $data['countNameOffice'] = NameOffice::count();
        $data['countAddress'] = Address::count();
        $data['countPhone'] = Phone::count();
        $data['countEmail'] = Email::count();
        $data['countVisi'] = VisiOffice::count();
        $data['countMisi'] = MisiOffice::count();
        $data['countProduct'] = Product::count();
        $data['countTeam'] = Team::count();
        $data['countBusinesPartner'] = BusinessPartner::count();
        $data['countGallery'] = Gallery::count();
        $data['countJobAssociate'] = JobAssociate::count();
        $data['countJobIntership'] = JobIntership::count();
        $data['countTestimoni'] = Testimoni::count();
        $data['countHero'] = Hero::count();
        $data['countAboutUs'] = Aboutus::count();
        $data['countArtikel'] = Artikel::count();
        $data['countUser'] = User::count();

        return view('pages.halaman_admin.dashboard.index', $data);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
