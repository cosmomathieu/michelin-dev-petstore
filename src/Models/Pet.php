<?php

declare(strict_types=1);

/*
 * MichelinDevPetstore
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MichelinDevPetstoreLib\Models;

use Core\Utils\XmlDeserializer;
use Core\Utils\XmlSerializer;
use stdClass;

class Pet implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Category|null
     */
    private $category;

    /**
     * @var string[]
     */
    private $photoUrls;

    /**
     * @var Tag[]|null
     */
    private $tags;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @param string $name
     * @param string[] $photoUrls
     */
    public function __construct(string $name, array $photoUrls)
    {
        $this->name = $name;
        $this->photoUrls = $photoUrls;
    }

    /**
     * Returns Id.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * @maps id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * @required
     * @maps name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Category.
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Sets Category.
     *
     * @maps category
     */
    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }

    /**
     * Returns Photo Urls.
     *
     * @return string[]
     */
    public function getPhotoUrls(): array
    {
        return $this->photoUrls;
    }

    /**
     * Sets Photo Urls.
     *
     * @required
     * @maps photoUrls
     *
     * @param string[] $photoUrls
     */
    public function setPhotoUrls(array $photoUrls): void
    {
        $this->photoUrls = $photoUrls;
    }

    /**
     * Returns Tags.
     *
     * @return Tag[]|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * Sets Tags.
     *
     * @maps tags
     *
     * @param Tag[]|null $tags
     */
    public function setTags(?array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * Returns Status.
     * pet status in the store
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     * pet status in the store
     *
     * @maps status
     * @factory \MichelinDevPetstoreLib\Models\Status1Enum::checkValue
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']       = $this->id;
        }
        $json['name']         = $this->name;
        if (isset($this->category)) {
            $json['category'] = $this->category;
        }
        $json['photoUrls']    = $this->photoUrls;
        if (isset($this->tags)) {
            $json['tags']     = $this->tags;
        }
        if (isset($this->status)) {
            $json['status']   = Status1Enum::checkValue($this->status);
        }

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }

    /**
     * Encode this object to XML
     */
    public function toXmlElement(XmlSerializer $serializer, \DOMElement $element): void
    {
        $serializer->addAsSubelement($element, 'id', $this->id);
        $serializer->addAsSubelement($element, 'name', $this->name);
        $serializer->addAsSubelement($element, 'category', $this->category);
        $serializer->addArrayAsSubelement($element, 'photoUrl', $this->photoUrls, 'photoUrls');
        $serializer->addArrayAsSubelement($element, 'tag', $this->tags, 'tags');
        $serializer->addAsSubelement($element, 'status', Status1Enum::checkValue($this->status));
    }

    /**
     * Create a new instance of this class from an XML Element
     */
    public static function fromXmlElement(XmlDeserializer $serializer, \DOMElement $element)
    {
        $name = $serializer->fromElement($element, 'name', 'string');
        $photoUrls = $serializer->fromElementToArray($element, 'photoUrl', 'array', 'photoUrls');

        $instance = new self($name, $photoUrls);

        $id = $serializer->fromElement($element, 'id', '?int');
        $instance->setId($id);

        $category = $serializer->fromElement($element, 'category', '?\\MichelinDevPetstoreLib\\Models\\Category');
        $instance->setCategory($category);

        $tags = $serializer->fromElementToArray($element, 'tag', '?array', 'tags');
        $instance->setTags($tags);

        $status = $serializer->fromElement($element, 'status', '?string');
        $status = \MichelinDevPetstoreLib\Models\Status1Enum::checkValue($status);
        $instance->setStatus($status);

        return $instance;
    }
}
