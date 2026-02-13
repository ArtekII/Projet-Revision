<?php

namespace app\template;

use flight\template\View;

class LayoutView extends View
{
    private ?string $layoutTemplate = null;
    private array $layoutData = [];

    public function layout(string $file, array $data = []): void
    {
        $this->layoutTemplate = $file;
        $this->layoutData = $data;
    }

    public function render(string $file, ?array $templateData = null): void
    {
        echo $this->fetch($file, $templateData);
    }

    public function fetch(string $file, ?array $data = null): string
    {
        $template = $this->getTemplate($file);

        if (!\file_exists($template)) {
            throw new \Exception('Template file not found: ' . $template . '.');
        }

        $outerLayoutTemplate = $this->layoutTemplate;
        $outerLayoutData = $this->layoutData;
        $this->layoutTemplate = null;
        $this->layoutData = [];

        \ob_start();

        \extract($this->vars);
        if (\is_array($data)) {
            \extract($data);
            if ($this->preserveVars === true) {
                $this->vars = \array_merge($this->vars, $data);
            }
        }

        include $template;
        $content = \ob_get_clean();

        $currentLayoutTemplate = $this->layoutTemplate;
        $currentLayoutData = $this->layoutData;

        $this->layoutTemplate = $outerLayoutTemplate;
        $this->layoutData = $outerLayoutData;

        if ($currentLayoutTemplate === null) {
            return $content;
        }

        return $this->fetch(
            $currentLayoutTemplate,
            \array_merge(['content' => $content], $currentLayoutData)
        );
    }
}
