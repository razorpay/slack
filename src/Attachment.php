<?php

namespace Razorpay\Slack;

use InvalidArgumentException;

class Attachment
{
    /**
     * The fallback text to use for clients that don't support attachments.
     *
     * @var string
     */
    protected $fallback;

    /**
     * Optional text that should appear within the attachment.
     *
     * @var string
     */
    protected $text;

    /**
     * Optional image that should appear within the attachment.
     *
     * @var string
     */
    protected $imageUrl;

    /**
     * Optional thumbnail that should appear within the attachment.
     *
     * @var string
     */
    protected $thumbUrl;

    /**
     * Optional text that should appear above the formatted data.
     *
     * @var string
     */
    protected $pretext;

    /**
     * Optional title for the attachment.
     *
     * @var string
     */
    protected $title;

    /**
     * Optional title link for the attachment.
     *
     * @var string
     */
    protected $titleLink;

    /**
     * Optional author name for the attachment.
     *
     * @var string
     */
    protected $authorName;

    /**
     * Optional author link for the attachment.
     *
     * @var string
     */
    protected $authorLink;

    /**
     * Optional author icon for the attachment.
     *
     * @var string
     */
    protected $authorIcon;

    /**
     * The color to use for the attachment.
     *
     * @var string
     */
    protected $color = 'good';

    /**
     * The text to use for the attachment footer.
     *
     * @var string
     */
    protected $footer;

    /**
     * The icon to use for the attachment footer.
     *
     * @var string
     */
    protected $footerIcon;

    /**
     * The timestamp to use for the attachment.
     *
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * The fields of the attachment.
     *
     * @var array
     */
    protected $fields = [];

    /**
     * The fields of the attachment that Slack should interpret
     * with its Markdown-like language.
     *
     * @var array
     */
    protected $markdownFields = [];

    /**
     * A collection of actions (buttons) to include in the attachment.
     * A maximum of 5 actions may be provided.
     *
     * @var array
     */
    protected $actions = [];

    /**
     * Instantiate a new Attachment.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes)
    {
        if (isset($attributes['fallback']))
        {
            $this->setFallback($attributes['fallback']);
        }

        if (isset($attributes['text']))
        {
            $this->setText($attributes['text']);
        }

        if (isset($attributes['image_url']))
        {
            $this->setImageUrl($attributes['image_url']);
        }

        if (isset($attributes['thumb_url']))
        {
            $this->setThumbUrl($attributes['thumb_url']);
        }

        if (isset($attributes['pretext']))
        {
            $this->setPretext($attributes['pretext']);
        }

        if (isset($attributes['color']))
        {
            $this->setColor($attributes['color']);
        }

        if (isset($attributes['footer']))
        {
            $this->setFooter($attributes['footer']);
        }

        if (isset($attributes['footer_icon']))
        {
            $this->setFooterIcon($attributes['footer_icon']);
        }

        if (isset($attributes['timestamp']))
        {
            $this->setTimestamp($attributes['timestamp']);
        }

        if (isset($attributes['fields']))
        {
            $this->setFields($attributes['fields']);
        }

        if (isset($attributes['mrkdwn_in']))
        {
            $this->setMarkdownFields($attributes['mrkdwn_in']);
        }

        if (isset($attributes['title']))
        {
            $this->setTitle($attributes['title']);
        }

        if (isset($attributes['title_link']))
        {
            $this->setTitleLink($attributes['title_link']);
        }

        if (isset($attributes['author_name']))
        {
            $this->setAuthorName($attributes['author_name']);
        }

        if (isset($attributes['author_link']))
        {
            $this->setAuthorLink($attributes['author_link']);
        }

        if (isset($attributes['author_icon']))
        {
            $this->setAuthorIcon($attributes['author_icon']);
        }

        if (isset($attributes['actions']))
        {
            $this->setActions($attributes['actions']);
        }

    }

    /**
     * Get the fallback text
     *
     * @return string
     */
    public function getFallback(): string
    {
        return $this->fallback;
    }

    /**
     * Set the fallback text.
     *
     * @param string $fallback
     *
     * @return $this
     */
    public function setFallback(string $fallback): self
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * Get the optional text to appear within the attachment.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the optional text to appear within the attachment.
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the optional image to appear within the attachment.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set the optional image to appear within the attachment.
     *
     * @param string $imageUrl
     * @return $this
     */
    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get the optional thumbnail to appear within the attachment.
     *
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * Set the optional thumbnail to appear within the attachment.
     *
     * @param string $thumbUrl
     * @return $this
     */
    public function setThumbUrl(string $thumbUrl): self
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * Get the text that should appear above the formatted data.
     *
     * @return string
     */
    public function getPretext()
    {
        return $this->pretext;
    }

    /**
     * Set the text that should appear above the formatted data.
     *
     * @param string $pretext
     *
     * @return $this
     */
    public function setPretext(string $pretext): self
    {
        $this->pretext = $pretext;

        return $this;
    }

    /**
     * Get the color to use for the attachment.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the color to use for the attachment.
     *
     * @param string $color
     *
     * @return $this
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the footer to use for the attachment.
     *
     * @return string
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * Set the footer text to use for the attachment.
     *
     * @param string $footer
     * @return $this
     */
    public function setFooter(string $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get the footer icon to use for the attachment.
     *
     * @return string
     */
    public function getFooterIcon()
    {
        return $this->footerIcon;
    }

    /**
     * Set the footer icon to use for the attachment.
     *
     * @param string $footerIcon
     * @return $this
     */
    public function setFooterIcon($footerIcon): self
    {
        $this->footerIcon = $footerIcon;

        return $this;
    }

    /**
     * Get the timestamp to use for the attachment.
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set the timestamp to use for the attachment.
     *
     * @param \DateTime $timestamp
     * @return $this
     */
    public function setTimestamp($timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get the title to use for the attachment.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title to use for the attachment.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the title link to use for the attachment.
     *
     * @return string
     */
    public function getTitleLink()
    {
        return $this->titleLink;
    }

    /**
     * Set the title link to use for the attachment.
     *
     * @param string $titleLink
     * @return $this
     */
    public function setTitleLink($titleLink): self
    {
        $this->titleLink = $titleLink;

        return $this;
    }

    /**
     * Get the author name to use for the attachment.
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set the author name to use for the attachment.
     *
     * @param string $author_name
     * @return $this
     */
    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Get the author link to use for the attachment.
     *
     * @return string
     */
    public function getAuthorLink()
    {
        return $this->authorLink;
    }

    /**
     * Set the auhtor link to use for the attachment.
     *
     * @param string $author_link
     * @return $this
     */
    public function setAuthorLink(string $authorLink): self
    {
        $this->authorLink = $authorLink;

        return $this;
    }

    /**
     * Get the author icon to use for the attachment.
     *
     * @return string
     */
    public function getAuthorIcon()
    {
        return $this->authorIcon;
    }

    /**
     * Set the author icon to use for the attachment.
     *
     * @param string $author_icon
     * @return $this
     */
    public function setAuthorIcon(string $authorIcon): self
    {
        $this->authorIcon = $authorIcon;

        return $this;
    }

    /**
     * Get the fields for the attachment.
     *
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Set the fields for the attachment.
     *
     * @param array $fields
     * @return $this
     */
    public function setFields(array $fields): self
    {
        $this->clearFields();

        foreach ($fields as $field)
        {
            $this->addField($field);
        }

        return $this;
    }

    /**
     * Add a field to the attachment.
     *
     * @param mixed $field
     * @return $this
     */
    public function addField($field): self
    {
        if ($field instanceof AttachmentField)
        {
            $this->fields[] = $field;

            return $this;
        }
        else if (is_array($field) === true)
        {
            $this->fields[] = new AttachmentField($field);

            return $this;
        }

        throw new InvalidArgumentException(
            'The attachment field must be an instance of Razorpay\Slack\AttachmentField or a keyed array');
    }

    /**
     * Clear the fields for the attachment.
     *
     * @return $this
     */
    public function clearFields(): self
    {
        $this->fields = [];

        return $this;
    }

    /**
     * Clear the actions for the attachment.
     *
     * @return $this
     */
    public function clearActions(): self
    {
        $this->actions = [];

        return $this;
    }

    /**
     * Get the fields Slack should interpret in its
     * Markdown-like language.
     *
     * @return array
     */
    public function getMarkdownFields(): array
    {
        return $this->markdownFields;
    }

    /**
     * Set the fields Slack should interpret in its
     * Markdown-like language.
     *
     * @param array $fields
     * @return $this
     */
    public function setMarkdownFields(array $fields): self
    {
        $this->markdownFields = $fields;

        return $this;
    }

    /**
     * Get the collection of actions (buttons) to include in the attachment.
     *
     * @return AttachmentAction[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * Set the collection of actions (buttons) to include in the attachment.
     *
     * @param array $actions
     * @return $this
     */
    public function setActions(array $actions): self
    {
        $this->clearActions();

        foreach ($actions as $action)
        {
            $this->addAction($action);
        }

        return $this;
    }

    /**
     * Add an action to the attachment.
     *
     * @param mixed $action
     * @return $this
     */
    public function addAction($action): self
    {
        if ($action instanceof AttachmentAction)
        {
            $this->actions[] = $action;

            return $this;
        }
        else if (is_array($action) === true)
        {
            $this->actions[] = new AttachmentAction($action);

            return $this;
        }

        throw new InvalidArgumentException(
            'The attachment action must be an instance of Razorpay\Slack\AttachmentAction or a keyed array');
    }

    /**
     * Convert this attachment to its array representation.
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'fallback'    => $this->getFallback(),
            'text'        => $this->getText(),
            'pretext'     => $this->getPretext(),
            'color'       => $this->getColor(),
            'footer'      => $this->getFooter(),
            'footer_icon' => $this->getFooterIcon(),
            'ts'          => $this->getTimestamp() ? $this->getTimestamp()->getTimestamp() : null,
            'mrkdwn_in'   => $this->getMarkdownFields(),
            'image_url'   => $this->getImageUrl(),
            'thumb_url'   => $this->getThumbUrl(),
            'title'       => $this->getTitle(),
            'title_link'  => $this->getTitleLink(),
            'author_name' => $this->getAuthorName(),
            'author_link' => $this->getAuthorLink(),
            'author_icon' => $this->getAuthorIcon(),
        ];

        $data['fields']  = $this->getFieldsAsArrays();
        $data['actions'] = $this->getActionsAsArrays();

        return $data;
    }

    /**
     * Iterates over all fields in this attachment and returns
     * them in their array form.
     *
     * @return array
     */
    protected function getFieldsAsArrays(): array
    {
        $fields = [];

        foreach ($this->getFields() as $field)
        {
            $fields[] = $field->toArray();
        }

        return $fields;
    }

    /**
     * Iterates over all actions in this attachment and returns
     * them in their array form.
     *
     * @return array
     */
    protected function getActionsAsArrays(): array
    {
        $actions = [];

        foreach ($this->getActions() as $action)
        {
            $actions[] = $action->toArray();
        }

        return $actions;
    }
}
