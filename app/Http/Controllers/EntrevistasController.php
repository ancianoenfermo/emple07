<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class EntrevistasController extends Controller
{
    public function index() {
        $title = "La entrevista de trabajo";
        $descripcion = "La entrevista de trabajo es la fase del proceso de selección donde el entrevistador analiza a fondo el candidato para comprobar su idoneidad para el puesto ofertado. El aspirante debe aprovechar la oportunidad para destacar que es el más cualificado para el empleo.";
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



        return view('entrevistas');
    }
}
