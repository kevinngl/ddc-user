<?php

namespace App\Libraries;

use Google\Cloud\Storage\StorageClient;

class GoogleCloudStorage
{
    private $googleCredentialsPath;

    public function __construct() {
        $this->googleCredentialsPath = config('app.google_credentials');

        putenv("GOOGLE_APPLICATION_CREDENTIALS=" . base_path($this->googleCredentialsPath));
    }

    public function uploadFile($request_file, $objectName)
    {
        try {
            // Get the file from the request
            $file = $request_file;

            // Set the bucket name and file name
            $bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');
            $fileName = $file->getClientOriginalName();

            // Instantiate the StorageClient
            $storage = new StorageClient([
                'credentials' => json_decode(base_path(getenv('GOOGLE_APPLICATION_CREDENTIALS'))),
            ]);

            // Upload the file to Google Cloud Storage
            $bucket = $storage->bucket($bucketName);
            $bucket->upload(
                fopen($file->getRealPath(), 'r'),
                [
                    'name' => $objectName,
                ]
            );

            return 'https://storage.googleapis.com/' . $bucketName . '/' . $objectName;
        } catch (Exception $e) {
            throw new \RuntimeException($e->getMessage);
        }
    }
}
