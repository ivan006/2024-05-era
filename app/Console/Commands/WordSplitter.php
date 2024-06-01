<?php

namespace App\Console\Commands;

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
        $input = strtolower($input);
        $result = $this->splitRecursive($input);
        return ['words' => $result, 'log' => $this->createLog($result)];
    }

    private function splitRecursive($input) {
        $length = strlen($input);
        if ($length === 0) {
            return [];
        }

        foreach ($this->commonWords as $word => $value) {
            $wordLength = strlen($word);
            if (substr($input, 0, $wordLength) === $word) {
                $remaining = substr($input, $wordLength);
                return array_merge([$word], $this->splitRecursive($remaining));
            }
        }

        // If no words matched, return the input as a single segment
        return [$input];
    }

    private function createLog($words) {
        $log = [];
        $position = 0;
        foreach ($words as $word) {
            $log[] = ['segment' => $word, 'position' => $position];
            $position += strlen($word);
        }
        return $log;
    }
}
