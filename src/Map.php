<?php

namespace Liaoxx\Strict;

class Map {
    private array $items = [];
    private string $keyType;
    private string $valueType;

    public function __construct(string $keyType, string $valueType) {
        $this->keyType = $keyType;
        $this->valueType = $valueType;
    }

    public function put($key, $value): void {
        if (!is_a($key, $this->keyType) && !is_subclass_of($key, $this->keyType)) {
            throw new \InvalidArgumentException("Key must be of type {$this->keyType}");
        }
        if (!is_a($value, $this->valueType) && !is_subclass_of($value, $this->valueType)) {
            throw new \InvalidArgumentException("Value must be of type {$this->valueType}");
        }
        $this->items[$key] = $value;
    }

    public function remove($key): void {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
    }

    public function get($key): ?object {
        return isset($this->items[$key]) ? $this->items[$key] : null;
    }

    public function containsKey($key): bool {
        return isset($this->items[$key]);
    }

    public function size(): int {
        return count($this->items);
    }
}