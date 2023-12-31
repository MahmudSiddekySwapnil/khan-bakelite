<?php

namespace App\Services;

use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
class MultipleImageUploadService
{
    public function imagesUploadService($request, $tableName, $storagePath, $imageKey =[])
    {
        // Initialize the array to store uploaded images
        $uploadedImages = [];

        // Check if the request has files for the specified image key
        if ($request->hasFile($imageKey)) {
            $images = $request->file($imageKey);

            foreach ($images as $image) {
                $imageContents = file_get_contents($image->getRealPath());
                $imageHash = md5($imageContents); // Calculate the MD5 hash of the image content.

                // Check if an image with the same hash already exists in the database.
                $existingImage = DB::table($tableName)->where('image_hash', $imageHash)->first();

                if ($existingImage) {
                    // An image with the same content already exists.
                    $uploadedImages[] = [
                        'message' => 'exists',
                    ];
                } else {
                    // If the image is unique, proceed with saving it.
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/' . $storagePath, $imageName);
                    $imageUrl = asset('storage/' . $storagePath . '/' . $imageName);
                    $uploadedImages[] = [
                        'message' => '',
                        'image_url' => $imageUrl,
                        'picture' => $imageName,
                        'image_hash' => $imageHash
                        // Add other model attributes as needed
                    ];
                }
            }
        }
        // Return the array containing details of all uploaded images
        return $uploadedImages;
    }
}
