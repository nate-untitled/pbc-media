<?php

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

use App\Http\Resources\ImageGallery;

Route::get('/', function () {
    return redirect('brand-resources');
});


Route::get('/unauthorized', function () {
    return redirect('unauthorized');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/brand-resources', function () {
        $all_data = array();
        $dirs = Storage::allDirectories();

        $i = 0;
        foreach ($dirs as $dir) {
            $new_files = array();
            array_push($all_data, ['folder' => $dir]);
            $files = Storage::files($dir);
            foreach ($files as $file) {
                $file_path = $file;
                $file = basename($file);
                array_push($new_files, $file);
            }
            array_push($all_data[$i], $new_files);
            $i++;
        }

        // TODO: just need first two images

        $files = \App\FileUpload::all();
        $galleries = \App\ImageGallery::all();
        $galleryMedia = array();

        foreach ($galleries as $gallery) {
            $galleryItems = $gallery->getMedia('my_multi_collection');

            foreach ($galleryItems as $item) {
                $item = [
                    'url' => $item->getUrl(),
                    'thumb_url' => $item->getUrl('thumb'),
                    'med_url' => $item->getUrl('medium'),
                    'imageGalleryId' => $gallery->id,
                    'imageGalleryName' => $gallery->name,
                ];

                array_push($galleryMedia, $item);
            }
        }

        return view('brand-resources')
            ->with('gallery_media', $galleryMedia)
            ->with('files', $files);
    });

    Route::get('/gallery/{id}', function ($id) {
        $gallery = \App\ImageGallery::where('id', $id)->first();
        $galleryItems = $gallery->getMedia('my_multi_collection');

        $galleryMedia = array();
        foreach ($galleryItems as $item) {
            $item = [
                'url' => $item->getUrl(),
                'thumb_url' => $item->getUrl('thumb'),
                'med_url' => $item->getUrl('medium'),
                'imageGalleryId' => $gallery->id,
                'imageGalleryName' => $gallery->name,
            ];

            array_push($galleryMedia, $item);
        }


        return view('gallery')
            ->with('gallery_media', $galleryMedia);
    });

});

Route::get('/logout', function () {
    auth()->logout();
    return redirect('admin/login');
});


//ctf0\MediaManager\MediaRoutes::routes();


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () { });
Route::group(['middleware' => 'App\Http\Middleware\PartnerMiddleware'], function () { });


Auth::routes();
