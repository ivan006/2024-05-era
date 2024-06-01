<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;

class WordSplitter {
    private $commonWords;

    public function __construct($filename = null) {
        $url = 'https://raw.githubusercontent.com/first20hours/google-10000-english/master/google-10000-english.txt';
        $savePath = storage_path('app/google-10000-english.txt');
        $sortedPath = storage_path('app/sorted-google-10000-english.txt');

        if ($filename) {
            $savePath = $filename;
        }

        if (!file_exists($savePath)) {
            $this->downloadWordsList($url, $savePath);
        }

        if (!file_exists($sortedPath)) {
            $words = $this->sortWordsByLength($savePath);
            $this->saveSortedWords($words, $sortedPath);
        }

        $this->commonWords = $this->loadCommonWords($sortedPath);
    }

    private function downloadWordsList($url, $savePath) {
        $content = file_get_contents($url);
        if ($content === false) {
            throw new \Exception("Failed to download words list from $url");
        }
        file_put_contents($savePath, $content);
    }

    private function sortWordsByLength($filePath) {
        $words = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        usort($words, function($a, $b) {
            return strlen($b) - strlen($a);
        });
        return $words;
    }

    private function saveSortedWords($words, $sortedFilePath) {
        file_put_contents($sortedFilePath, implode("\n", $words));
    }

    private function loadCommonWords($filename) {
        $words = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return array_flip($words); // Use array_flip to quickly check if a word exists
    }

    public function split($input) {
        Log::info("Starting split method for input: $input");
        $input = strtolower($input);
        $length = strlen($input);
        $cost = [0];
        $result = [];
        $segmentationLog = []; // To log the segmentation process

        Log::info("Initialized variables. Starting dynamic programming loop.");

        for ($i = 1; $i <= $length; $i++) {
            $cost[$i] = PHP_INT_MAX;
            $result[$i] = '';
        }

        for ($i = 1; $i <= $length; $i++) {
            for ($j = 0; $j < $i; $j++) {
                $word = substr($input, $j, $i - $j);
                if (isset($this->commonWords[$word])) {
                    $wordCost = -log($this->commonWords[$word] + 1); // Add 1 to avoid log(0)
                    if ($cost[$j] + $wordCost < $cost[$i]) {
                        $cost[$i] = $cost[$j] + $wordCost;
                        $result[$i] = $word;
                        Log::info("Found word: $word at position $j to $i with cost {$cost[$i]}");
                    }
                }
            }
        }

        Log::info("Completed dynamic programming loop. Constructing result.");

        $words = [];
        $lastIndex = $length;
        while ($lastIndex > 0) {
            $segment = $result[$lastIndex];
            if ($segment === '') {
                throw new \Exception("Segmentation failed for input: $input");
            }
            array_unshift($words, $segment);
            $segmentationLog[] = [
                'segment' => $segment,
                'position' => $lastIndex - strlen($segment)
            ];
            $lastIndex -= strlen($segment);
        }

        Log::info("Completed segmentation for input: $input");

        return ['words' => $words, 'log' => $segmentationLog];
    }
}
