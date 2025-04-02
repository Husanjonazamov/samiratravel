<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Media;
use App\Models\Tour;
use App\Models\Type;
use App\Services\Media\MediaService;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $all = [];
    public $directory = [];

    public function scanned($path)
    {

        $list = [];

        $Dirs = scandir($path);
        foreach ($Dirs as $dir) {

            if (is_dir($path . $dir) && '..' != $dir && '.' != $dir)
                if (opendir($path . $dir)) {
                    $this->directory[] = [
                        'name' => $dir,
                        'path' => $path . $dir,
                    ];
                    $list[] = ['dir' => [
                        'name' => $dir,
                        'source' => $this->scanned($path . $dir . '//')],
                    ];

                }


            if (is_file($path . $dir)) {
                $file['name'] = $dir;
                $file['info'] = [
                    'type' => filetype($path . $dir),
                    'size' => filesize($path . $dir),
                    'path' => $path . $dir,
                    //'md5' => md5_file($path . $dir),
                    // 'sha' => sha1_file($path . $dir)
                ];
                $list[] = ['file' => $file];
                $this->all[] = $file;

            }

        }
        return $list;
    }

    public function run(MediaService $service)
    {
        echo "Seeding tours\n";
        $this->scanned(storage_path('app/Mariyam/'));
        foreach ($this->all as $file) {
            if (pathinfo($file['info']['path'], PATHINFO_EXTENSION) === 'txt') {
                $name=str_replace('.txt', '', $file['name']);
                $attributes = [
                    'title' => [
                        'en' => $name,
                        'ru' => $name,
                        'uz' => $name,
                    ],
                    'description' => [
                        'en' => file_get_contents($file['info']['path']),
                        'ru' => file_get_contents($file['info']['path']),
                        'uz' => file_get_contents($file['info']['path']),
                    ],
                    'location' => basename( pathinfo($file['info']['path'], PATHINFO_DIRNAME)),
                    'time' => rand(1, 14),
                    'price' => match ($file['name']) {
                        'Umra safari.txt' => 15000000,
                        'Buxoroga sayohat.txt' => 5000000,
                        'Samarqand shahriga sayohat.txt' => 5000000,
                        'Xivaga sayohat.txt' => 6000000
                    },
                    'slider'=>true,
                    'best'=>true,
                    'famous'=>true,
                    'status'=>true,
                    'slug'=>Str::slug($name),
                ];
                Tour::create($attributes);
            }
        }
        foreach ($this->all as $file){
            if (pathinfo($file['info']['path'], PATHINFO_EXTENSION) === 'jpg') {
                $tour = Tour::query()->where('location', basename(pathinfo(str_replace('Rasmlar', '', $file['info']['path']), PATHINFO_DIRNAME)))->first();
                $image = new UploadedFile($file['info']['path'], $file['name'], 'image/jpeg', null, true);
                if (empty($tour->image)) {
                    $service->create(['media' => $image], 'tours', $tour->id, Media::TYPE_IMAGE);
                } else
                    $service->createFile(['media' => $image],Media::TYPE_GALLERY ,'tours', $tour->id );

                $gallery = Gallery::create(
                    [
                        'name' => $file['name'],
                        'description' => $file['name'],
                    ]
                );
                $g = new UploadedFile($file['info']['path'], $file['name'], 'image/jpeg', null, true);
                $service->create(['media' => $g], 'galleries', $gallery->id, Media::TYPE_IMAGE);

            }
        }
    }
}
