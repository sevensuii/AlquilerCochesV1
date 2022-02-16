<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\MailController;
use App\Mail\TestMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get("clientes/send-email",[MailController::class, 'sendEmail'])->name("clientes.TestEmail");
// Route::get("clientes/send-mail", function() {
//     $details=[

//           'tittle' => 'Control del Sistema',
//           'body' => "Se acaba de generar un listado pdf de los clientes, el usuario responsable:" 

//         ];

//         \Mail::to('severyn00@gmail.com')->send(new TestMail($details));

//         dd("Email is Sent.");
//         // return redirect("clientes/");
// });



Route::get("clientes/pdf",[ClienteController::class, 'listadoPdf'])->name('clientes.pdf');
Route::resource('clientes', 'App\Http\Controllers\ClienteController');


Route::resource('coches', 'App\Http\Controllers\CocheController');

/* Route::get('test_mail','App\Http\Controllers\ClienteController@testMail'); */

route::get("clientes/send-mail", function() {
    $transport = (new Swift_SmtpTransport('smtp.example.org', 25))->setUsername('979889c4252672')->setPassword('7ba03cb2d67b4e');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Alguien ha generado un PDF'))->setFrom(['miapp@lar.com' => 'Laravel app admnin'])->setTo(['severyn00@gmail.com' => 'PDF generado'])->setBody('Se acaba de generar un listado pdf de los clientes, el usuario responsable:{{auth()->user()->name}}</b> con el correo <b>{{auth()->user()->email}}');

    $result = $mailer->send($message);

    return redirect("clientes/");

});