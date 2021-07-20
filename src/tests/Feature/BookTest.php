<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Book;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_route()
    {   
        $this->withoutExceptionHandling();
        $response = $this->get('/books');

        $response->assertStatus(200);
    }

    public function test_create_book()
    {
        $data = [
            'title' => 'Test Book',
            'author' => 'Test Author',
        ];
        $this->withoutExceptionHandling();
        $response = $this->json('post', '/books', $data);
        $response->assertStatus(302);
    }

    public function test_download_route()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('downloads');
        $response->assertStatus(200);
    }

    public function test_csv_download()
    {
        $this->withoutExceptionHandling();
        $first_response = $this->get('downloads/csv/title_author');
        $second_response = $this->get('downloads/csv/title');
        $third_response = $this->get('downloads/csv/author');
        $this->assertEquals($first_response->getStatusCode(), 200);
        $this->assertEquals($second_response->getStatusCode(), 200);
        $this->assertEquals($third_response->getStatusCode(), 200);
    }

    public function test_xml_download()
    {
        $this->withoutExceptionHandling();
        $first_response = $this->get('downloads/xml/title_author');
        $second_response = $this->get('downloads/xml/title');
        $third_response = $this->get('downloads/xml/author');
        $this->assertEquals($first_response->getStatusCode(), 200);
        $this->assertEquals($second_response->getStatusCode(), 200);
        $this->assertEquals($third_response->getStatusCode(), 200);
    }

    public function test_search_route()
    {
        $this->withoutExceptionHandling();
        Book::create(["title"=>"Oliver Twist", "author"=>"Charles Dickens"]);
        $response = $this->get('/search?q=oliver');
        $response->assertStatus(200);
        $response->assertSee('Oliver Twist');
        $response->assertSee('Charles Dickens');
    }
}
