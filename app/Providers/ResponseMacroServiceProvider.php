<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Response::macro('success', function ($data = [], $message = 'Success', $status = 200) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ], $status);
        });

        Response::macro('error', function ($message = 'Error', $status = 400, $errors = []) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
                'errors' => $errors
            ], $status);
        });

    }
}
