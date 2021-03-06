<?php

namespace CrudeForum\CrudeForum\Iterator;

class Filtered implements \Iterator {

    use Proxy;

    public $iter = 0;
    private $callback;

    public function __construct(\Iterator $iter, callable $callback) {
        $this->iter = $iter;
        $this->callback = $callback;
    }

    private function tryUntilPass() {
        while ($this->iter->valid() && !call_user_func($this->callback, $this->iter->current())) {
            // if not pass the callback,
            // skip to the next one
            $this->iter->next();
        }
    }

    public function rewind() {
        $this->iter->rewind();
        $this->tryUntilPass();
    }

    public function next() {
        $this->iter->next();
        $this->tryUntilPass();
    }
}
