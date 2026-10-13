<?php
declare(strict_types=1);

namespace App\Test\TestCase\Utility;

use App\Utility\Bibtex;
use PHPUnit\Framework\TestCase;

class BibtexTest extends TestCase
{
    public function testParsesInproceedings(): void
    {
        $entry = Bibtex::parse("@inproceedings{liem:2021:user,\n"
            . "    title = {User-Centric System Fault Identification Using IO500 Benchmark},\n"
            . "    author = {Liem, Radita and Povaliaiev, Dmytro and Kunkel, Julian},\n"
            . "    booktitle = {2021 IEEE/ACM Sixth International Parallel Data Systems Workshop (PDSW)},\n"
            . "    year = {2021},\n"
            . "    doi = {10.1109/PDSW54622.2021.00011}\n}");

        $this->assertSame('User-Centric System Fault Identification Using IO500 Benchmark', $entry['title']);
        $this->assertSame(['Radita Liem', 'Dmytro Povaliaiev', 'Julian Kunkel'], $entry['authors']);
        $this->assertSame('2021 IEEE/ACM Sixth International Parallel Data Systems Workshop (PDSW)', $entry['venue']);
        $this->assertSame('2021', $entry['year']);
        $this->assertSame('10.1109/PDSW54622.2021.00011', $entry['doi']);
    }

    /**
     * Authors may already be "First Last"; the venue falls back to journal, then publisher.
     */
    public function testNameOrderAndVenueFallbacks(): void
    {
        $software = Bibtex::parse('@software{k, author = {Julian Kunkel and John Bent}, title = {VI4IO/io-500-dev},'
            . ' year = {2018}, publisher = {Zenodo}, doi = {10.5281/zenodo.1422814}}');
        $this->assertSame(['Julian Kunkel', 'John Bent'], $software['authors']);
        $this->assertSame('Zenodo', $software['venue']);

        $article = Bibtex::parse('@article{k, title = {Establishing the IO-500 Benchmark}, author = {Kunkel, J},'
            . ' journal = {White Paper}, year = {2016}}');
        $this->assertSame('White Paper', $article['venue']);
        $this->assertSame('', $article['doi']);
    }

    public function testMissingFieldsAreEmpty(): void
    {
        $this->assertSame(['title' => '', 'authors' => [], 'venue' => '', 'year' => '', 'doi' => ''], Bibtex::parse('@misc{x}'));
    }
}
