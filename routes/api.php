<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('password/request-token', [AuthController::class, 'updatePasswordRequestToken']);
Route::post('password/reset', [AuthController::class, 'updatePasswordRequest']);

//File for API is barcode.php
// TODO: change to use auth:sanctum
//Route::prefix('v1')->group(base_path('routes/api/barcode.php'));
Route::middleware(['auth:sanctum', 'user.action.log'])
    ->prefix('v1')
    ->group(base_path('routes/api/barcode.php'));

Route::post('/examenesEquipo', function () {

    $return = [
        [
            "idRegExamenEnc" => 1438616,
            "idAfiliado" => 6860,
            "idLaboratorio" => 4,
            "edad" => 52,
            "fechaNacimiento" => "1973-07-01",
            "fechaRealizacion" => "2024-06-12",
            "idSexo" => 2,
            "medico" => "18450 | LAURA MARIA ARANIVA VASQUEZ",
            "ipEquipo" => "192.168.56.1",
            "idRegExamenDet" => [
                [
                    "idRegExamenDet" => 4561247,
                    "codigoExamen" => "QC01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561251,
                    "codigoExamen" => "QC05",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561255,
                    "codigoExamen" => "QC24",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561246,
                    "codigoExamen" => "HM01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561250,
                    "codigoExamen" => "QC04",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561254,
                    "codigoExamen" => "QC08",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561249,
                    "codigoExamen" => "QC03",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561253,
                    "codigoExamen" => "QC07",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561248,
                    "codigoExamen" => "QC02",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561252,
                    "codigoExamen" => "QC06",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4561256,
                    "codigoExamen" => "UR01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ]
            ]
        ],
        [
            "idRegExamenEnc" => 1477196,
            "idAfiliado" => 71656,
            "idLaboratorio" => 4,
            "edad" => 62,
            "fechaNacimiento" => "1963-02-28",
            "fechaRealizacion" => "2024-08-20",
            "idSexo" => 2,
            "medico" => "22822 | CRISTÓBAL MOISÉS RÍOS SALMERÓN",
            "ipEquipo" => "192.168.56.1",
            "idRegExamenDet" => [
                [
                    "idRegExamenDet" => 4685230,
                    "codigoExamen" => "QC01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4685231,
                    "codigoExamen" => "QC25",
                    "estadoEquipo" => null,
                    "resultados" => null
                ]
            ]
        ],
        [
            "idRegExamenEnc" => 1534970,
            "idAfiliado" => 19463,
            "idLaboratorio" => 4,
            "edad" => 63,
            "fechaNacimiento" => "1962-03-09",
            "fechaRealizacion" => "2025-01-15",
            "idSexo" => 2,
            "medico" => "19158 | FRANCISCO ERNESTO DUEÑAS CERROS",
            "ipEquipo" => "192.168.56.1",
            "idRegExamenDet" => [
                [
                    "idRegExamenDet" => 4885720,
                    "codigoExamen" => "QC02",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885724,
                    "codigoExamen" => "QC59",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885719,
                    "codigoExamen" => "HM01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885723,
                    "codigoExamen" => "QC04",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885722,
                    "codigoExamen" => "QC05",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885726,
                    "codigoExamen" => "UR01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885721,
                    "codigoExamen" => "QC03",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4885725,
                    "codigoExamen" => "QC58",
                    "estadoEquipo" => null,
                    "resultados" => null
                ]
            ]
        ],
        [
            "idRegExamenEnc" => 1477221,
            "idAfiliado" => 182501,
            "idLaboratorio" => 4,
            "edad" => 38,
            "fechaNacimiento" => "1987-11-02",
            "fechaRealizacion" => "2024-08-20",
            "idSexo" => 2,
            "medico" => "21062 | ANDREA BERENICE ACEVEDO LOPEZ",
            "ipEquipo" => "192.168.56.1",
            "idRegExamenDet" => [
                [
                    "idRegExamenDet" => 4685316,
                    "codigoExamen" => "QC02",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4685315,
                    "codigoExamen" => "QC25",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4685314,
                    "codigoExamen" => "QC01",
                    "estadoEquipo" => null,
                    "resultados" => null
                ],
                [
                    "idRegExamenDet" => 4685317,
                    "codigoExamen" => "QC03",
                    "estadoEquipo" => null,
                    "resultados" => null
                ]
            ]
        ]
    ];

//    $return = {
//        "idRegExamenEnc": 1533910,
//  "idAfiliado": 174562,
//  "idLaboratorio": 4,
//  "edad": 77,
//  "fechaNacimiento": "1947-04-21",
//  "fechaRealizacion": "2024-11-28",
//  "idSexo": 2,
//  "medico": "19158 | FRANCISCO ERNESTO DUEÑAS CERROS",
//  "ipEquipo": "192.168.56.1",
//  "idRegExamenDet": [
//    {
//        "idRegExamenDet": 4885479,
//      "codigoExamen": "QC22",
//      "estadoEquipo": null,
//      "resultados": null
//    }
//  ]
//};
    return response()->json($return);
});

Route::post('/actualizarEstado', function (Request $request) {
    $idRegExamenDet = $request->input('idRegExamenDet');
    $estadoEquipo = $request->input('estadoEquipo');

    $return =
        [
            "idRegExamenDet" => (int) $idRegExamenDet,
            "codigoExamen" => null,
            "estadoEquipo" => (int) $estadoEquipo,
            "resultados" => null
        ];
    return response()->json($return);
});

Route::post('/actualizarResultados', function (Request $request) {
    $idRegExamenDet = $request->input('idRegExamenDet');
    $resultados = $request->input('resultados');
    $return =
        [
            "idRegExamenDet" => (int) $idRegExamenDet,
            "codigoExamen" => null,
            "estadoEquipo" => null,
            "resultados" => $resultados

        ];
    return response()->json($return);
});

Route::post('/check-request', CheckRequestController::class);
Route::get('/check-request', CheckRequestController::class);