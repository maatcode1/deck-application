<?php

namespace Deck\Application\Controller;

use Deck\Application\Http\Request;
use Deck\View\View;

class AbstractController
{
    protected View $view;
    protected Request $request;
    protected array $config;

    public function getView(): View
    {
        return $this->view;
    }
    public function setView(View $view): AbstractController
    {
        $this->view = $view;
        return $this;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
    public function setConfig(array $config): AbstractController
    {
        $this->config = $config;
        return $this;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
    public function setRequest(Request $request): AbstractController
    {
        $this->request = $request;
        return $this;
    }



}