<?php

namespace Razorpay\Slack;

class ActionConfirmation
{
    /**
     * The required title for the pop up window.
     *
     * @var string
     */
    protected $title;

    /**
     * The required description.
     *
     * @var string
     */
    protected $text;

    /**
     * The text label for the OK button.
     *
     * @var string
     */
    protected $okText;

    /**
     * The text label for the Cancel button.
     *
     * @var string
     */
    protected $dismissText;

    /**
     * Instantiate a new ActionConfirmation.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes)
    {
        if (isset($attributes['title']))
        {
            $this->setTitle($attributes['title']);
        }

        if (isset($attributes['text']))
        {
            $this->setText($attributes['text']);
        }

        if (isset($attributes['ok_text']))
        {
            $this->setOkText($attributes['ok_text']);
        }

        if (isset($attributes['dismiss_text']))
        {
            $this->setDismissText($attributes['dismiss_text']);
        }
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ActionConfirmation
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return ActionConfirmation
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getOkText(): string
    {
        return $this->okText;
    }

    /**
     * @param string $okText
     * @return ActionConfirmation
     */
    public function setOkText(string $okText): self
    {
        $this->okText = $okText;

        return $this;
    }

    /**
     * @return string
     */
    public function getDismissText(): string
    {
        return $this->dismissText;
    }

    /**
     * @param string $dismissText
     * @return ActionConfirmation
     */
    public function setDismissText(string $dismissText): self
    {
        $this->dismissText = $dismissText;

        return $this;
    }

    /**
     * Get the array representation of this action confirmation.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'title'         => $this->getTitle(),
            'text'          => $this->getText(),
            'ok_text'       => $this->getOkText(),
            'dismiss_text'  => $this->getDismissText(),
        ];
    }
}
