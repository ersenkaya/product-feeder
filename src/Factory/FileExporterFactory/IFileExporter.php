<?php

namespace ProductFeeder\Factory\FileExporterFactory;

interface IFileExporter
{
    public function export(string $provider, string $content): string;
}