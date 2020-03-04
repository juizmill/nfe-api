<?php

namespace App\Console\Commands;

use App\GoodsSegments;
use App\AttachmentMerchandise;
use Illuminate\Console\Command;

class AttachmentMerchandiseCommand extends Command
{
    protected $signature = 'nfe:attachment-merchandise';
    protected $description = 'Import all merchandises';

    public function handle()
    {
        $csv = base_path('database/CEST_NCM.csv');
        if (file_exists($csv)) {
            AttachmentMerchandise::query()->truncate();
            if ($file = fopen($csv, 'r')) {
                while (($line = fgetcsv($file)) !== false) {
                    $segment = GoodsSegments::query()->where('name', '=', $line[2])->first();
                    if ($segment) {
                        AttachmentMerchandise::query()->create([
                            'cest' => (int) str_replace(['.', '-'], '', $line[0]),
                            'ncm' => (int) str_replace(['.', '-'], '', $line[1]),
                            'item' => $line[3],
                            'description' => $line[4],
                            'goods_segments_id' => $segment->id
                        ]);
                    } else {
                        $this->warn('Segment not Found: ' . $line[2]);
                    }

                }
                fclose($file);
            }
        }

        $this->info('Import Attachment Merchandise finisher');
    }
}
