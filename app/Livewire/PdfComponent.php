<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Smalot\PdfParser\Parser;

class PdfComponent extends Component
{
    use WithFileUploads;

    #[Layout('layouts.app')]
    public $file;
    public $text = '';

    public function readPdf()
    {
        // Check if a file was uploaded
        if ($this->file) {
            // Temporary file path
            $tempPath = $this->file->getRealPath();

            // Ensure the file exists
            if (file_exists($tempPath)) {
                try {
                    $parser = new Parser();
                    $pdf = $parser->parseFile($tempPath);
                    $this->text = $pdf->getText();
                    //dd($this->text);
                } catch (\Exception $e) {
                    throw new \Exception("Failed to parse PDF: " . $e->getMessage());
                    dd($e->getMessage());
                }
            } else {
                throw new \Exception("Uploaded file is not accessible.");
            }
        } else {
            throw new \Exception("No file was uploaded.");
        }
    }

    public function render()
    {
        return view('livewire.pdf-component');
    }
}
