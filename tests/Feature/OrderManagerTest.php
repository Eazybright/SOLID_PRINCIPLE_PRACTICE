<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\HardCopiesOrderManagerService;
use App\Services\SoftCopiesOrderManagerService;

class OrderManagerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function that_hard_copy_order_manager_can_process_order(): void
    {
        $items = [
            ['title' => 'test-book-1', 'price' => 2],
            ['title' => 'test-book-2', 'price' => 4],
            ['title' => 'test-book-3', 'price' => 6],
        ];

        $delivery_company = 'EazybrightFC';

        $order_manager = new HardCopiesOrderManagerService($items);

        $delivery_message = 'hard copy download link';

        $process_order = $order_manager->calculate()
                                        ->discount()
                                        ->shipping(5)
                                        ->delivery($delivery_company)
                                        ->process();

        $this->assertSame(5.0, $process_order->paid);
        $this->assertSame($delivery_message, $process_order->delivery);
    }

    /**
     * @test
     *
     * @return void
     */
    public function that_soft_copy_order_manager_can_process_order(): void
    {
        $items = [
            ['title' => 'test-book-1', 'price' => 2],
            ['title' => 'test-book-2', 'price' => 4],
            ['title' => 'test-book-3', 'price' => 6],
        ];

        // $delivery_company = 'EazybrightFC';

        $order_manager = new SoftCopiesOrderManagerService($items);

        $delivery_message = 'soft copy download link';

        $process_order = $order_manager->calculate()
                                        ->discount()
                                        ->process();
        // dd($process_order);
        // $this->assertSame(5.0, $process_order->paid);
        $this->assertSame($delivery_message, $process_order->delivery);
    }
}