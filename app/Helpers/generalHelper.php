<?php


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

function responseJson($object = null, $massage = '', $response_status = 200, $pagination = null)
{
    $response = [
        'message'     => $massage,
        'data'        => $object,
        'pagination'  => $pagination,
    ];

    return response()->json($response, $response_status);
}

function getPaginates($collection)
{
    return [
        'per_page' => $collection->perPage(),
        'path' => $collection->path(),
        'total' => $collection->total(),
        'current_page' => $collection->currentPage(),
        'next_page_url' => $collection->nextPageUrl(),
        'prev_page_url' => $collection->previousPageUrl(),
        'last_page' => $collection->lastPage(),
        'has_more_pages' => $collection->hasMorePages(),
        'from' => $collection->firstItem(),
        'to' => $collection->lastItem(),
    ];
}




function saveFiles($files, $model, $folder,$identifier = null, $action = 'store' )
{
    if(!$files)
        return ;
    $files = is_array($files) ? $files : [$files]; // it works for single and multiple files
    if ($action == 'update' && count($files) > 0) {
        deleteFile($model,$identifier);
    }
    foreach ($files as $file) {

        $fileSize = $file->getSize();
        $fileType = $file->getMimeType();
        $image = time() . "-" . rand(0, 9999999) . '.' . $file->getClientOriginalName();

        // $file->storeAs($folder, $image, 'public');
        Storage::disk("public")->put($folder."/".$image, $file->getContent());

        $model->media()->create([
            'name' =>  $image,
            'size' => $fileSize,
            'mime_type' => $fileType,
            'identifier' => $identifier,
            'uploaded_by' => auth()->id() ?? 1,
            'url' => Storage::url($folder."/".$image),
        ]);
    }
}



function deleteFile($model,$identifier = null)
{
    $allMedia = $identifier ? $model->media()->whereIdentifier($identifier)->get() : $model->media()->whereNull('identifier')->get();
    foreach ($allMedia as $media) {
        unlink_image_by_path($media->url);
        $media->delete();
    }
}


function unlink_image_by_path($image_path)
{
    if (File::exists(public_path($image_path)) && $image_path) {
        unlink(public_path($image_path));
    }
}


function productTransaction($order, $item, $product, $fromStore = null, $toStore = null)
{
    $productTransaction =  \App\Models\ProductTransaction::create([
        'order_id' => $order->id,
        'order_type' => get_class($order),
        'item_id' => $item->id,
        'item_type' => get_class($item),
        'product_id' => $product->id,
        'from_store_id' => $fromStore ? $fromStore->id : null,
        'to_store_id' => $toStore ? $toStore->id : null,
    ]);

    $productTransaction->deliveryStatus()->create([
        "transaction_date" => now()->format("Y-m-d")
    ]);

    return $productTransaction;
}
