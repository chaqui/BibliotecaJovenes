#Aplicación para Biblioteca

aplicación para gestionar la Biblioteca de la Sociedad de Jovenes Seguidores de Cristo 

##instalacion 

```
npm install
php artisan serve


```

##rutas publicas 
+--------+-----------+----------------------------------+-------------------+--------------------------------------------------------+--------------+
| Domain | Method    | URI                              | Name              | Action                                                 | Middleware   |
+--------+-----------+----------------------------------+-------------------+--------------------------------------------------------+--------------+
|        | POST      | api/autor                        | autor.store       | App\Http\Controllers\AutorController@store             | api          |
|        | GET|HEAD  | api/autor                        | autor.index       | App\Http\Controllers\AutorController@index             | api          |
|        | GET|HEAD  | api/autor/create                 | autor.create      | App\Http\Controllers\AutorController@create            | api          |
|        | GET|HEAD  | api/autor/{autor}                | autor.show        | App\Http\Controllers\AutorController@show              | api          |
|        | PUT|PATCH | api/autor/{autor}                | autor.update      | App\Http\Controllers\AutorController@update            | api          |
|        | DELETE    | api/autor/{autor}                | autor.destroy     | App\Http\Controllers\AutorController@destroy           | api          |
|        | GET|HEAD  | api/autor/{autor}/edit           | autor.edit        | App\Http\Controllers\AutorController@edit              | api          |
|        | GET|HEAD  | api/autor/{autor}/libros         | autor.libros      | App\Http\Controllers\AutorController@obtenerLibros     | api          |
|        | GET|HEAD  | api/editorial                    | editorial.index   | App\Http\Controllers\EditorialController@index         | api          |
|        | POST      | api/editorial                    | editorial.store   | App\Http\Controllers\EditorialController@store         | api          |
|        | GET|HEAD  | api/editorial/create             | editorial.create  | App\Http\Controllers\EditorialController@create        | api          |
|        | GET|HEAD  | api/editorial/{editorial}        | editorial.show    | App\Http\Controllers\EditorialController@show          | api          |
|        | PUT|PATCH | api/editorial/{editorial}        | editorial.update  | App\Http\Controllers\EditorialController@update        | api          |
|        | DELETE    | api/editorial/{editorial}        | editorial.destroy | App\Http\Controllers\EditorialController@destroy       | api          |
|        | GET|HEAD  | api/editorial/{editorial}/edit   | editorial.edit    | App\Http\Controllers\EditorialController@edit          | api          |
|        | GET|HEAD  | api/editorial/{editorial}/libros | editorial.libros  | App\Http\Controllers\EditorialController@obtenerLibros | api          |
|        | GET|HEAD  | api/libro                        | libro.index       | App\Http\Controllers\libroController@index             | api          |
|        | POST      | api/libro                        | libro.store       | App\Http\Controllers\libroController@store             | api          |
|        | GET|HEAD  | api/libro/create                 | libro.create      | App\Http\Controllers\libroController@create            | api          |
|        | GET|HEAD  | api/libro/{libro}                | libro.show        | App\Http\Controllers\libroController@show              | api          |
|        | PUT|PATCH | api/libro/{libro}                | libro.update      | App\Http\Controllers\libroController@update            | api          |
|        | DELETE    | api/libro/{libro}                | libro.destroy     | App\Http\Controllers\libroController@destroy           | api          |
|        | GET|HEAD  | api/libro/{libro}/autores        | libro.autores     | App\Http\Controllers\libroController@obtenerAutores    | api          |
|        | GET|HEAD  | api/libro/{libro}/edit           | libro.edit        | App\Http\Controllers\libroController@edit              | api          |
|        | GET|HEAD  | api/libro/{libro}/editorial      | libro.editorial   | App\Http\Controllers\libroController@editorial         | api          |
|        | GET|HEAD  | api/libro/{libro}/resenias       | libro.resenias    | App\Http\Controllers\libroController@obtenerResenias   | api          |
|        | GET|HEAD  | api/user                         |                   | Closure                                                | api,auth:api |
+--------+-----------+----------------------------------+-------------------+--------------------------------------------------------+--------------+
