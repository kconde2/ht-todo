<?php

namespace Tests\Unit;

use App\Todo\Domain\Model\Todo;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    public function test_can_create_new_task_with_only_task_name()
    {
        $todo = new Todo(text: 'Task 1');

        self::assertEquals('Task 1', $todo->text);
        self::assertInstanceOf(\DateTime::class, $todo->createdAt);
        self::assertInstanceOf(\DateTime::class, $todo->updatedAt);
        self::assertIsBool($todo->checked);
        self::assertFalse($todo->checked);
        self::assertTrue(Str::isUuid($todo->id));
    }

    public function test_can_create_new_task_from_array()
    {
        $todoArray = [
            "checked" => false,
            "createdAt" => 1670958882721,
            "text" => "dadadeadad",
            "id" => "65e4c110-7b1a-11ed-8945-876f0265d8b8",
            "updatedAt" => 1670958882721
        ];

        $todo = Todo::fromArray($todoArray);
        self::assertEquals($todoArray['text'], $todo->text);
        self::assertInstanceOf(\DateTime::class, $todo->createdAt);
        self::assertInstanceOf(\DateTime::class, $todo->updatedAt);
        self::assertIsBool($todo->checked);
        self::assertFalse($todo->checked);
        self::assertTrue(Str::isUuid($todo->id));
    }

    public function test_can_create_todo_array_from_todo_model()
    {
        $todo = new Todo(text: 'Task 1');

        $todoArray = $todo->toArray();

        self::assertTrue($todoArray['checked'] === $todo->checked);
        self::assertTrue($todoArray['text'] === $todo->text);
    }

    public function test_can_todo_toggle()
    {
        $todo = new Todo(text: 'Task 2');
        $clonedTod = clone $todo;


        $todo->toggle();

        self::assertFalse($clonedTod->checked === $todo->checked);
        self::assertTrue('Task 2' === $clonedTod->text);
        self::assertTrue($clonedTod->checked !== $todo->checked);
        self::assertEquals($clonedTod->createdAt, $todo->createdAt);
        self::assertNotEquals($clonedTod->updatedAt, $todo->updatedAt);
    }
}
