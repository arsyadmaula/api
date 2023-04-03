<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Review;

class ReviewTest extends TestCase
{

    use RefreshDatabase;
 
    public function test_user_can_list_all_resto()
    {
        $count = 5;
        Review::factory()->count($count)->create();

        $this->getJson(route('reviews.index'))
            ->assertOk()
            ->assertJsonCount($count);


        }

    public function test_user_can_create_resto()
    {
     $data = Review::factory()->makeOne()->toArray();
     
     $this->postJson(route('reviews.store'), $data)->assertCreated();
    }

    public function test_user_can_show_resto()
    {
        $data = Review::factory()->createOne();

        $this->getJson(route('reviews.show',$data))
        ->assertOk()
        ->assertJsonStructure([]);
    }

    public function test_user_can_edit_resto()
    {
        $updateData = Review::factory()->makeOne()->toArray();
        $data = Review::factory()->createOne();
        
        $this->patchJson(route('reviews.update', $data),$updateData)
        ->assertOk()
        ->assertJsonStructure([]);
    }
    
    public function test_user_can_delete_resto()
    {
        $data = Review::factory()->createOne();
        
        $this->deleteJson(route('reviews.destroy', $data))
        ->assertOk()
        ->assertJsonStructure([]);
    }
}
