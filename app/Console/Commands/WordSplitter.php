<?php

namespace App\Console\Commands;

class WordSplitter {
    private $commonWords;

    public function __construct($filename = null) {
        $url = 'https://raw.githubusercontent.com/first20hours/google-10000-english/master/google-10000-english.txt';
        $savePath = storage_path('app/google-10000-english.txt');

        if ($filename) {
            $savePath = $filename;
        } else {
            $this->downloadWordsList($url, $savePath);
        }

        $this->commonWords = $this->loadCommonWords($savePath);
    }

    private function downloadWordsList($url, $savePath) {
        $content = file_get_contents($url);
        if ($content === false) {
            throw new \Exception("Failed to download words list from $url");
        }
        file_put_contents($savePath, $content);
    }

    private function loadCommonWords($filename) {
        $words = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return array_flip($words); // Use array_flip to quickly check if a word exists
    }

    public function split($input) {
        $input = strtolower($input);
        $length = strlen($input);
        $cost = [0];
        $result = [];

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
                    }
                }
            }
        }

        $words = [];
        for ($i = $length; $i > 0; $i -= strlen($result[$i])) {
            array_unshift($words, $result[$i]);
        }

        return $words;
    }
}
