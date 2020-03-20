## NFE-API

API construída com o framework Laravel para gerar notas fiscais eletrônicas.

![Laravel](https://github.com/juizmill/nfe-api/workflows/Laravel/badge.svg)

## Framework

Veja a lista de framework que será utilizado no projeto

 - [Laravel](https://laravel.com/)
 - [SPED-NFE](https://github.com/nfephp-org/sped-nfe)
 - [JWT-AUTH](https://github.com/tymondesigns/jwt-auth)

## Manuais

Aqui estão os manuais de auxílido para desenvolver o projeto

 - [Laravel](https://laravel.com/doc)
 - [SPED-NFE](https://github.com/nfephp-org/sped-nfe/tree/master/docs)
 - [JWT-AUTH](https://jwt-auth.readthedocs.io/en/develop/)
 - [Manuais da SEFAZ](https://github.com/nfephp-org/sped-nfe/tree/master/docs)

## Como contribuir

Você pode ajudar a contribuir com o projeto abrindo [issues](https://github.com/juizmill/nfe-api/issues) ou criando códigos e enviando por uma [pull request](https://github.com/juizmill/nfe-api/pulls)

Lembrando que ao contribuir com código o mesmo deve ser implementado testes com a bibliotéca PHPUnit.

O projeto já vem com alguns recuros para ser utilizado no desenvolvimento como **PHP CS** e deve seguir o padrão **PSR2**

## Rotas já desenvolvidas


| Method   | URI                               | Name                         | Action                                                            | Middleware                                 |
|----------|-----------------------------------|------------------------------|-------------------------------------------------------------------|--------------------------------------------|
| GET-HEAD | v1/company                        | company.index                | App\Http\Controllers\CompanyController@index                      | api,apiJwt                                 |
| POST     | v1/company/store                  | company.store                | App\Http\Controllers\CompanyController@store                      | api,apiJwt                                 |
| DELETE   | v1/company/{id}/destroy           | company.destroy              | App\Http\Controllers\CompanyController@destroy                    | api,apiJwt                                 |
| GET-HEAD | v1/company/{id}/show              | company.show                 | App\Http\Controllers\CompanyController@show                       | api,apiJwt                                 |
| PUT      | v1/company/{id}/update            | company.update               | App\Http\Controllers\CompanyController@update                     | api,apiJwt                                 |
| GET-HEAD | v1/customer                       | customer.index               | App\Http\Controllers\CustomerController@index                     | api,apiJwt                                 |
| POST     | v1/customer/store                 | customer.store               | App\Http\Controllers\CustomerController@store                     | api,apiJwt                                 |
| DELETE   | v1/customer/{id}/destroy          | customer.destroy             | App\Http\Controllers\CustomerController@destroy                   | api,apiJwt                                 |
| GET-HEAD | v1/customer/{id}/show             | customer.show                | App\Http\Controllers\CustomerController@show                      | api,apiJwt                                 |
| PUT      | v1/customer/{id}/update           | customer.update              | App\Http\Controllers\CustomerController@update                    | api,apiJwt                                 |
| POST     | v1/login                          | api.login                    | App\Http\Controllers\Auth\AuthController@login                    | api                                        |
| POST     | v1/logout                         | api.logout                   | App\Http\Controllers\Auth\AuthController@logout                   | api                                        |
| GET-HEAD | v1/permission                     | permission.index             | App\Http\Controllers\PermissionController@index                   | api,apiJwt                                 |
| POST     | v1/permission/store               | permission.store             | App\Http\Controllers\PermissionController@store                   | api,apiJwt                                 |
| DELETE   | v1/permission/{id}/destroy        | permission.destroy           | App\Http\Controllers\PermissionController@destroy                 | api,apiJwt                                 |
| GET-HEAD | v1/permission/{id}/show           | permission.show              | App\Http\Controllers\PermissionController@show                    | api,apiJwt                                 |
| PUT      | v1/permission/{id}/update         | permission.update            | App\Http\Controllers\PermissionController@update                  | api,apiJwt                                 |
| GET-HEAD | v1/product                        | product.index                | App\Http\Controllers\ProductController@index                      | api,apiJwt                                 |
| POST     | v1/product/store                  | product.store                | App\Http\Controllers\ProductController@store                      | api,apiJwt                                 |
| DELETE   | v1/product/{id}/destroy           | product.destroy              | App\Http\Controllers\ProductController@destroy                    | api,apiJwt                                 |
| GET-HEAD | v1/product/{id}/show              | product.show                 | App\Http\Controllers\ProductController@show                       | api,apiJwt                                 |
| PUT      | v1/product/{id}/update            | product.update               | App\Http\Controllers\ProductController@update                     | api,apiJwt                                 |
| POST     | v1/refresh_token                  | api.refresh                  | App\Http\Controllers\Auth\AuthController@refresh                  | api                                        |
| GET-HEAD | v1/role                           | role.index                   | App\Http\Controllers\RoleController@index                         | api,apiJwt                                 |
| DELETE   | v1/role/permission/destroy        | role.permission.destroy      | App\Http\Controllers\RolePermissionController@destroy             | api,apiJwt                                 |
| POST     | v1/role/permission/store          | role.permission.store        | App\Http\Controllers\RolePermissionController@store               | api,apiJwt                                 |
| POST     | v1/role/store                     | role.store                   | App\Http\Controllers\RoleController@store                         | api,apiJwt                                 |
| DELETE   | v1/role/{id}/destroy              | role.destroy                 | App\Http\Controllers\RoleController@destroy                       | api,apiJwt                                 |
| GET-HEAD | v1/role/{id}/show                 | role.show                    | App\Http\Controllers\RoleController@show                          | api,apiJwt                                 |
| PUT      | v1/role/{id}/update               | role.update                  | App\Http\Controllers\RoleController@update                        | api,apiJwt                                 |
| GET-HEAD | v1/transport                      | transport.index              | App\Http\Controllers\TransportController@index                    | api,apiJwt                                 |
| POST     | v1/transport/store                | transport.store              | App\Http\Controllers\TransportController@store                    | api,apiJwt                                 |
| GET-HEAD | v1/transport/vehicle              | transport.index              | App\Http\Controllers\VehicleController@index                      | api,apiJwt                                 |
| POST     | v1/transport/vehicle/store        | transport.store              | App\Http\Controllers\VehicleController@store                      | api,apiJwt                                 |
| DELETE   | v1/transport/vehicle/{id}/destroy | transport.destroy            | App\Http\Controllers\VehicleController@destroy                    | api,apiJwt                                 |
| GET-HEAD | v1/transport/vehicle/{id}/show    | transport.show               | App\Http\Controllers\VehicleController@show                       | api,apiJwt                                 |
| PUT      | v1/transport/vehicle/{id}/update  | transport.update             | App\Http\Controllers\VehicleController@update                     | api,apiJwt                                 |
| DELETE   | v1/transport/{id}/destroy         | transport.destroy            | App\Http\Controllers\TransportController@destroy                  | api,apiJwt                                 |
| GET-HEAD | v1/transport/{id}/show            | transport.show               | App\Http\Controllers\TransportController@show                     | api,apiJwt                                 |
| PUT      | v1/transport/{id}/update          | transport.update             | App\Http\Controllers\TransportController@update                   | api,apiJwt                                 |
| GET-HEAD | v1/user                           | user.index                   | App\Http\Controllers\UserController@index                         | api,apiJwt,can:user.index                  |
| PUT      | v1/user/password/{id}/update      | user.handle.password.update  | App\Http\Controllers\UserHandlePasswordController@update          | api,apiJwt,can:user.handle.password.update |
| POST     | v1/user/recover/password          | user.handle.recover.password | App\Http\Controllers\UserHandlePasswordController@recoverPassword | api                                        |
| POST     | v1/user/reset/password            | user.handle.reset.password   | App\Http\Controllers\UserHandlePasswordController@resetPassword   | api                                        |
| DELETE   | v1/user/role/destroy              | user.role.destroy            | App\Http\Controllers\UserRoleController@destroy                   | api,apiJwt                                 |
| POST     | v1/user/role/store                | user.role.store              | App\Http\Controllers\UserRoleController@store                     | api,apiJwt                                 |
| POST     | v1/user/store                     | user.store                   | App\Http\Controllers\UserController@store                         | api                                        |
| DELETE   | v1/user/{id}/delete               | user.destroy                 | App\Http\Controllers\UserController@destroy                       | api,apiJwt,can:user.destroy                |
| GET-HEAD | v1/user/{id}/show                 | user.show                    | App\Http\Controllers\UserController@show                          | api,apiJwt,can:user.show                   |
| PUT      | v1/user/{id}/update               | user.update                  | App\Http\Controllers\UserController@update                        | api,apiJwt,can:user.update                 |
