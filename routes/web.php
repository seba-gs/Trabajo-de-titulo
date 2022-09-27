<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\{UsuariosController, generalController, CatalogoController,
     NoticiaController, PatrocinadoresController, VideoController, CompraController, PerfilController, 
     RegistroController, EspecieController, CrearNoticaController, FotografiasController,
     CrearFotografiasController, CrearPatroController, GraficosController};

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
    return view('general.index');
});
// Rutas Usuarios
Route::get('/InicioSesion/logout', [App\Http\Controllers\UsuariosController::class, 'logout'])->name('logout');
Route::get('/InicioSesion', [App\Http\Controllers\UsuariosController::class, 'index'])->name('index');
Route::post('/InicioSesion', [App\Http\Controllers\UsuariosController::class, 'login'])->name('login');
Route::get('/Registrar', [App\Http\Controllers\UsuariosController::class, 'registro'])->name('registro');
Route::post('/Registrar', [App\Http\Controllers\UsuariosController::class, 'store'])->name('registro.store');
Route::get('/Usuarios', [App\Http\Controllers\UsuariosController::class, 'Usuarios'])->name('usuarios');
Route::post('/Usuarios/{usuario}/activar', [App\Http\Controllers\UsuariosController::class, 'activar'])->name('activar');
Route::get('/NuevoUsuario', [App\Http\Controllers\UsuariosController::class, 'nuevoUsuario'])->name('nuevo.usuarios');
Route::post('/CrearUsuario', [App\Http\Controllers\UsuariosController::class, 'crear'])->name('crear.usuarios');
Route::get('/Editar/{id_usuario}', [App\Http\Controllers\UsuariosController::class, 'editar'])->name('editar.usuarios');
Route::post('/Editar/{id_usuario}', [App\Http\Controllers\UsuariosController::class, 'update'])->name('update.usuarios');
//-------
Route::get('/Bienvenido', [App\Http\Controllers\generalController::class, 'inicio'])->name('inicio');
//-------
// Rutas Fotografias
Route::get('/Catalogo', [App\Http\Controllers\CatalogoController::class, 'catalogo'])->name('catalogo');
Route::get('/Fotografias/{especie}', [App\Http\Controllers\FotografiasController::class, 'fotografia'])->name('fotografia');
Route::get('/CrearFotografias', [App\Http\Controllers\CrearFotografiasController::class, 'crearFotografia'])->name('crearFotografia');
Route::post('/CrearFotografias', [App\Http\Controllers\CrearFotografiasController::class, 'store'])->name('crearFoto');
Route::get('/Fotografia/{id}/editar', [App\Http\Controllers\CrearFotografiasController::class, 'edit'])->name('editFotografia');
Route::post('/Fotografia/{foto}/update', [App\Http\Controllers\CrearFotografiasController::class, 'update'])->name('fotografia.up');
Route::delete('/Fotografia/{epecie}/{foto}/eliminar', [App\Http\Controllers\CrearFotografiasController::class, 'destroy'])->name('borrarFoto');
// Rutas Especies
Route::get('/Especie', [App\Http\Controllers\EspecieController::class, 'Especie'])->name('Especie');
Route::post('/Especie', [App\Http\Controllers\EspecieController::class, 'store'])->name('crearEspecie');
Route::get('/Especie/{especie}', [App\Http\Controllers\EspecieController::class, 'edit'])->name('editEspecie');
Route::post('/Especie/{especie}', [App\Http\Controllers\EspecieController::class, 'update'])->name('Especie.update');
Route::delete('/Especie/{especie}/eliminar', [App\Http\Controllers\EspecieController::class, 'destroy'])->name('borrarEspecie');
// Rutas Videos
Route::get('/Videos', [App\Http\Controllers\VideoController::class, 'video'])->name('video');
Route::get('/Videos/CrearVideo', [App\Http\Controllers\VideoController::class, 'crearVideo'])->name('crearVideo');
Route::post('/Videos/Crear', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store');
Route::get('/Videos/{video}/editar', [App\Http\Controllers\VideoController::class, 'edit'])->name('editVideo');
Route::post('/Videos/{video}/editar', [App\Http\Controllers\VideoController::class, 'update'])->name('video.up');
Route::delete('/Videos/{video}/eliminar', [App\Http\Controllers\VideoController::class, 'destroy'])->name('borrarVideo');
// Rutas Noticias
Route::get('/Noticias', [App\Http\Controllers\NoticiaController::class, 'noticia'])->name('noticia');
Route::get('/CrearNoticias', [App\Http\Controllers\CrearNoticaController::class, 'crearNoticia'])->name('crearNoticia');
Route::post('/CrearNoticias', [App\Http\Controllers\CrearNoticaController::class, 'store'])->name('NoticiaPost');
Route::get('/Noticias/{noticia}/editar', [App\Http\Controllers\CrearNoticaController::class, 'edit'])->name('editarNoticia');
Route::post('/Noticias/{noticia}/editar', [App\Http\Controllers\CrearNoticaController::class, 'update'])->name('Noticia.update');
Route::delete('Noticias/{noticia}/eliminar', [App\Http\Controllers\CrearNoticaController::class, 'destroy'])->name('borrarNoticia');
// Rutas Patrocinadores
Route::get('/Patrocinadores', [App\Http\Controllers\PatrocinadoresController::class, 'patrocinadores'])->name('patrocinadores');
Route::get('/CrearPatrocinador', [App\Http\Controllers\CrearPatroController::class, 'crearPatrocinador'])->name('crearPatrocinador');
Route::post('/CrearPatrocinador', [App\Http\Controllers\CrearPatroController::class, 'store'])->name('patrocinador.store');
Route::get('/Patrocinador/{patrocinador}/editar', [App\Http\Controllers\CrearPatroController::class, 'edit'])->name('editarPatrocinador');
Route::post('/Patrocinador/{patrocinador}/editar', [App\Http\Controllers\CrearPatroController::class, 'update'])->name('editarPatrocinador');
Route::delete('/Patrocinador/{patrocinador}/eliminar', [App\Http\Controllers\CrearPatroController::class, 'destroy'])->name('borrarPatrocinador');
//-------------
Route::get('/Perfil', [App\Http\Controllers\PerfilController::class, 'perfil'])->name('perfil');
//-------------
// Rutas Compras
Route::get('/Compra/{foto}/{valor}/{usuario}', [App\Http\Controllers\ComprasController::class, 'compra'])->name('compra');
Route::post('/Compra/{foto}/{valor}/{usuario}', [App\Http\Controllers\ComprasController::class, 'store'])->name('compra.store');
Route::get('/Compra/ListarCompras/{foto}', [App\Http\Controllers\ComprasController::class, 'listar'])->name('listar.compras');
Route::delete('/Compra/Cancelar/{compra}/{foto}', [App\Http\Controllers\ComprasController::class, 'destroy'])->name('cancelar.compra');
// Rutas Comentarios
Route::get('/Comentarios/{foto}', [App\Http\Controllers\ComentariosController::class, 'comentarios'])->name('comentarios');
Route::post('/Comentarios/{foto}', [App\Http\Controllers\ComentariosController::class, 'store'])->name('comentarios.store');
// Rutas Graficos
Route::get('/Estadisticas', [App\Http\Controllers\GraficosController::class, 'index'])->name('index.graficos');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');