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
    public function testShouldReturnAllItems(){

        echo( "ReturnAllItems \n");
        $response =  $this->json('Get','/api/v1/items');
        $response->seeStatusCode(200);
        
    }
    public function testShouldReturnItem(){
        echo( "ReturnSpecificItem \n");
        $this->get("/api/v1/items/24", []);
        $this->seeStatusCode(200);
        
        
    }
    public function testShouldCreateItem(){
        echo( "CreateItem \n");
        $itemId='TodoItem'.random_int(0,256);
        $parameters = [
            'name' => $itemId,
            'description' => 'testShouldCreateItem ',
        ];

        $this->post("api/v1/items", $parameters, []);
        $this->seeStatusCode(200);
        echo($itemId." Created \n");
       
    }
    public function testShouldUpdateItem(){
        echo( "UpdateItem \n");
        $parameters = [
            'name' => 'UpdateTodoItem',
            'description' => 'Testing ',
        ];

        $this->put("api/v1/items/3", $parameters, []);
        $this->seeStatusCode(200);
        echo("Item updated \n");
       
    }
    public function testShouldDeleteItem(){
        echo( "DeleteItem \n");
        $this->delete("api/v1/items/99", [], []);
        $this->seeStatusCode(200);
    }

}
