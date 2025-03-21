<?php

namespace App\Providers;

use App\Models\Aboutus;
use App\Models\Address;
use App\Models\BusinessPartner;
use App\Models\Email;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Instansi;
use App\Models\Phone;
use App\Models\Product;
use App\Models\SosialMedia;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.landingpage.layouts', function ($view) {
            $email = Email::all(); // Ambil data yang dibutuhkan
            $view->with('email', $email);

            $sosialmedia = SosialMedia::all(); // Ambil data yang dibutuhkan
            $view->with('sosialmedia', $sosialmedia);

            $phone = Phone::all(); // Ambil data yang dibutuhkan
            $view->with('phone', $phone);


            $business_partner = BusinessPartner::all(); // Ambil data yang dibutuhkan
            $view->with('business_partner', $business_partner);

            $address = Address::all(); // Ambil data yang dibutuhkan
            $view->with('address', $address);

            $aboutus = Aboutus::all(); // Ambil data yang dibutuhkan
            $view->with('aboutus', $aboutus);
        });
    }
}