<?php

namespace App\View\Components\Messages;

use Illuminate\View\Component;

class Messages extends Component
{
    /**
     * @var array|string[]
     */
    public array $types;

    /**
     * @var bool
     */
    public bool $hasMessages = false;

    /**
     * @var array
     */
    public array $messages = [];

    /**
     * @param array $types
     */
    public function __construct(array $types = ['error', 'warning', 'success', 'info', 'message', 'status'])
    {
        $this->types = $types;

        foreach ($types as $type) {
            if (session()->has($type)) {
                $this->messages[$type] = [[
                    'type' => $type,
                    'message' => session($type),
                ]];
            }
        }

        if (!empty($this->messages)) {
            $this->hasMessages = true;
        }
    }

    /**
     * @return \Closure|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.messages.messages');
    }
}
