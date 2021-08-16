<?php
namespace Tests;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(),
            $this->response->getContent()
        );
   
    }
    public function test_a_basic_request()
    {
        $response =  $this->json('Get','/api/v1/items');

        $response->seeStatusCode(200);
        
    }
    public function testShouldReturnItem(){

        $this->get("/api/v1/items/24", []);
        $this->seeStatusCode(200);
        
        
    }
    public function testShouldCreateItem(){

        $parameters = [
            'name' => 'TodoItem'.random_int(45,1092),
            'description' => 'testShouldCreateItem ',
        ];

        $this->post("api/v1/items", $parameters, []);
        $this->seeStatusCode(200);
       
    }
    public function testShouldUpdateItem(){

        $parameters = [
            'name' => 'UpdateTodoItem',
            'description' => 'Testing ',
        ];

        $this->put("api/v1/items/3", $parameters, []);
        $this->seeStatusCode(200);
       
    }
    public function testShouldDeleteItem(){
        
        $this->delete("api/v1/items/9", [], []);
        $this->seeStatusCode(200);
    }

}
