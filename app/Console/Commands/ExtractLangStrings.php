<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExtractLangStrings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:extract {--output= : The output file path}';
    protected $description = 'Extract all @lang strings from the project';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $strings = $this->extractStrings();
        $outputPath = $this->option('output') ?? base_path('resources/lang/en/extracted.php');

        $content = "<?php\n\nreturn [\n";
        foreach ($strings as $key => $value) {
            $content .= "    '" . addslashes($key) . "' => '" . addslashes($value) . "',\n";
        }
        $content .= "];\n";

        File::put($outputPath, $content);

        $this->info("Extracted " . count($strings) . " strings to: " . $outputPath);
    }

    private function extractStrings()
    {
        $strings = [];
        $files = File::allFiles(base_path());
        $regex = '/\@lang\([\'"](.+?)[\'"]\)/';

        foreach ($files as $file) {
            if ($file->getExtension() === 'php') {
                $content = File::get($file);
                if (preg_match_all($regex, $content, $matches)) {
                    foreach ($matches[1] as $match) {
                        $strings[$match] = $match;
                    }
                }
            }
        }

        return $strings;
    }
}
