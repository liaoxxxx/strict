<?php

namespace Liaoxx\Strict;

use OutOfBoundsException;

class Lists {
    private array $items = [];
    private string $type;

    public function getType(): string {
        return $this->type;
    }



    public function __construct(string $type) {
        $this->type = $type;
    }

    public function add($item): void {
        if (!is_a($item, $this->type)) {
            throw new \InvalidArgumentException("Item must be of type {$this->type}");
        }
        $this->items[] = $item;
    }

    /**
     * @param int $index
     * @return void
     * @author LiaoYongjian
     */
    public function remove(int $index): void {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
    }

    /**
     * @param int $index
     * @return object|null
     * @author LiaoYongjian
     * @throws OutOfBoundsException
     */
    public function get(int $index): ?object {
        return $this->items[$index] ?? throw new OutOfBoundsException("Index {$index} is out of bounds.");
    }

    public function size(): int {
        return count($this->items);
    }
}