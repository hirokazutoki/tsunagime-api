<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpRequestController;

Route::group(['prefix' => 'v1'], function () {
    Route::get('version', function () {
        return response()->json(['version' => 'v1']);
    });

    Route::post('register', function (Request $request) {
        $email = $request->input("email");

        $exist = User::whereEmail($email)->exists();

        if ($exist) {
            abort(500);
        }

        User::create(
            ['name' => $request->input("name"), 'email' => $request->input("email"), 'password' => $request->input("password")]
        );
    });

    Route::post("/external-login", function (Request $request) {
        // Or some identifier for the user from a third party service
        $email = $request->input("email");
        $name = $request->input("name", 'default');

        $user = User::firstOrCreate(
            ["email" => $email],
            [
                "given_name" => $name,
                "family_name" => $name,
                "password" => bcrypt(Str::random(16)), // fake password
            ]
        );

        $token = $user->createToken("web-client")->plainTextToken;

        return response()->json(["token" => $token]);
    });

    Route::middleware("auth:sanctum")->group(function () {
        Route::apiResource('help_requests', HelpRequestController::class);

        Route::get("/bookmarks", function (Request $request) {
            return $request->user()->bookmarks()->get();
        });

        Route::post("/bookmarks", function (Request $request) {
            $request->validate([
                "title" => "required|string",
                "url" => "required|url",
            ]);

            return $request
                ->user()
                ->bookmarks()
                ->create([
                    "title" => $request->title,
                    "url" => $request->url,
                ]);
        });
    });
});
