<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\producto;

class MailController extends Controller
{
    public function sendEmail(){



        $details=[

          'tittle' => 'Control del Sistema',
          'body' => "Se acaba de generar un listado pdf de los clientes, el usuario responsable:" 

        ];

        Mail::to('severyn00@gmail.com')->send(new TestMail($details));
        return redirect("clientes/");
    }
}