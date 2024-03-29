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

class User implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $username;

    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $password;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var int|null
     */
    private $userStatus;

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
     * Returns Username.
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Sets Username.
     *
     * @maps username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * Returns First Name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Sets First Name.
     *
     * @maps firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns Last Name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Sets Last Name.
     *
     * @maps lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns Email.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Sets Email.
     *
     * @maps email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * Returns Password.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Sets Password.
     *
     * @maps password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * Returns Phone.
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Sets Phone.
     *
     * @maps phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Returns User Status.
     * User Status
     */
    public function getUserStatus(): ?int
    {
        return $this->userStatus;
    }

    /**
     * Sets User Status.
     * User Status
     *
     * @maps userStatus
     */
    public function setUserStatus(?int $userStatus): void
    {
        $this->userStatus = $userStatus;
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
            $json['id']         = $this->id;
        }
        if (isset($this->username)) {
            $json['username']   = $this->username;
        }
        if (isset($this->firstName)) {
            $json['firstName']  = $this->firstName;
        }
        if (isset($this->lastName)) {
            $json['lastName']   = $this->lastName;
        }
        if (isset($this->email)) {
            $json['email']      = $this->email;
        }
        if (isset($this->password)) {
            $json['password']   = $this->password;
        }
        if (isset($this->phone)) {
            $json['phone']      = $this->phone;
        }
        if (isset($this->userStatus)) {
            $json['userStatus'] = $this->userStatus;
        }

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }

    /**
     * Encode this object to XML
     */
    public function toXmlElement(XmlSerializer $serializer, \DOMElement $element): void
    {
        $serializer->addAsSubelement($element, 'id', $this->id);
        $serializer->addAsSubelement($element, 'username', $this->username);
        $serializer->addAsSubelement($element, 'firstName', $this->firstName);
        $serializer->addAsSubelement($element, 'lastName', $this->lastName);
        $serializer->addAsSubelement($element, 'email', $this->email);
        $serializer->addAsSubelement($element, 'password', $this->password);
        $serializer->addAsSubelement($element, 'phone', $this->phone);
        $serializer->addAsSubelement($element, 'userStatus', $this->userStatus);
    }

    /**
     * Create a new instance of this class from an XML Element
     */
    public static function fromXmlElement(XmlDeserializer $serializer, \DOMElement $element)
    {

        $instance = new self();

        $id = $serializer->fromElement($element, 'id', '?int');
        $instance->setId($id);

        $username = $serializer->fromElement($element, 'username', '?string');
        $instance->setUsername($username);

        $firstName = $serializer->fromElement($element, 'firstName', '?string');
        $instance->setFirstName($firstName);

        $lastName = $serializer->fromElement($element, 'lastName', '?string');
        $instance->setLastName($lastName);

        $email = $serializer->fromElement($element, 'email', '?string');
        $instance->setEmail($email);

        $password = $serializer->fromElement($element, 'password', '?string');
        $instance->setPassword($password);

        $phone = $serializer->fromElement($element, 'phone', '?string');
        $instance->setPhone($phone);

        $userStatus = $serializer->fromElement($element, 'userStatus', '?int');
        $instance->setUserStatus($userStatus);

        return $instance;
    }
}
