<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class CartapresentacionController extends Controller
{
    public function index() {
        $title = "La carta de presentación";
        $descripcion = "Es la carta que acompaña al CV y pretende atraer la atención del responsable de selección";
        $image = asset('img/home/buscar-empleo.jpg');

        SEOTools::setTitle($title);
        SEOTools::setDescription($descripcion);
        SEOTools::setCanonical(URL::current());

        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::opengraph()->addImage($image);
        SEOTools::opengraph()->addProperty('type','website');

        SEOTools::twitter()->setSite('site','@wiempleo');
        SEOTools::twitter()->setImage($image);
        SEOTools::twitter()->setType('type','summary_large_image');




        return view('cartapresentacion');
    }
}
