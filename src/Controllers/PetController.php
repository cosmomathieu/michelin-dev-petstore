<?php

declare(strict_types=1);

/*
 * MichelinDevPetstore
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MichelinDevPetstoreLib\Controllers;

use Core\Request\Parameters\FormParam;
use Core\Request\Parameters\HeaderParam;
use Core\Request\Parameters\QueryParam;
use Core\Request\Parameters\TemplateParam;
use Core\Response\Types\ErrorType;
use CoreInterfaces\Core\Request\RequestMethod;
use MichelinDevPetstoreLib\Exceptions\ApiException;
use MichelinDevPetstoreLib\Models\ApiResponse;
use MichelinDevPetstoreLib\Models\Category;
use MichelinDevPetstoreLib\Models\Pet;
use MichelinDevPetstoreLib\Models\Status1Enum;
use MichelinDevPetstoreLib\Models\Status2Enum;
use MichelinDevPetstoreLib\Models\Tag;
use MichelinDevPetstoreLib\Utils\FileWrapper;

class PetController extends BaseController
{
    /**
     * Update an existing pet by Id
     *
     * @param string $name
     * @param string[] $photoUrls
     * @param int|null $id
     * @param Category|null $category
     * @param Tag[]|null $tags
     * @param string|null $status pet status in the store
     *
     * @return Pet Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updatePet(
        string $name,
        array $photoUrls,
        ?int $id = null,
        ?Category $category = null,
        ?array $tags = null,
        ?string $status = null
    ): Pet {
        $_reqBuilder = $this->requestBuilder(RequestMethod::PUT, '/pet')
            ->auth('petstore_auth')
            ->parameters(
                HeaderParam::init('Content-Type', 'application/x-www-form-urlencoded'),
                FormParam::init('name', $name),
                FormParam::init('photoUrls', $photoUrls),
                FormParam::init('id', $id),
                FormParam::init('category', $category),
                FormParam::init('tags', $tags),
                FormParam::init('status', $status)->serializeBy([Status1Enum::class, 'checkValue'])
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid ID supplied'))
            ->throwErrorOn('404', ErrorType::init('Pet not found'))
            ->throwErrorOn('405', ErrorType::init('Validation exception'))
            ->typeXml(Pet::class, 'pet');

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Add a new pet to the store
     *
     * @param string $name
     * @param string[] $photoUrls
     * @param int|null $id
     * @param Category|null $category
     * @param Tag[]|null $tags
     * @param string|null $status pet status in the store
     *
     * @return Pet Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function addPet(
        string $name,
        array $photoUrls,
        ?int $id = null,
        ?Category $category = null,
        ?array $tags = null,
        ?string $status = null
    ): Pet {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/pet')
            ->auth('petstore_auth')
            ->parameters(
                HeaderParam::init('Content-Type', 'application/x-www-form-urlencoded'),
                FormParam::init('name', $name),
                FormParam::init('photoUrls', $photoUrls),
                FormParam::init('id', $id),
                FormParam::init('category', $category),
                FormParam::init('tags', $tags),
                FormParam::init('status', $status)->serializeBy([Status1Enum::class, 'checkValue'])
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('405', ErrorType::init('Invalid input'))
            ->typeXml(Pet::class, 'pet');

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Multiple status values can be provided with comma separated strings
     *
     * @param string|null $status Status values that need to be considered for filter
     *
     * @return Pet[] Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function findPetsByStatus(?string $status = Status2Enum::AVAILABLE): array
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/pet/findByStatus')
            ->auth('petstore_auth')
            ->parameters(QueryParam::init('status', $status)->serializeBy([Status2Enum::class, 'checkValue']));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid status value'))
            ->typeXmlArray(Pet::class, 'pet', 'response');

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
     *
     * @param string[]|null $tags Tags to filter by
     *
     * @return Pet[] Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function findPetsByTags(?array $tags = null): array
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/pet/findByTags')
            ->auth('petstore_auth')
            ->parameters(QueryParam::init('tags', $tags));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid tag value'))
            ->typeXmlArray(Pet::class, 'pet', 'response');

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Returns a single pet
     *
     * @param int $petId ID of pet to return
     *
     * @return Pet Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function getPetById(int $petId): Pet
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/pet/{petId}')
            ->auth('api_key', 'petstore_auth')
            ->parameters(TemplateParam::init('petId', $petId));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid ID supplied'))
            ->throwErrorOn('404', ErrorType::init('Pet not found'))
            ->typeXml(Pet::class, 'pet');

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * @param int $petId ID of pet that needs to be updated
     * @param string|null $name Name of pet that needs to be updated
     * @param string|null $status Status of pet that needs to be updated
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updatePetWithForm(int $petId, ?string $name = null, ?string $status = null): void
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/pet/{petId}')
            ->auth('petstore_auth')
            ->parameters(
                TemplateParam::init('petId', $petId),
                QueryParam::init('name', $name),
                QueryParam::init('status', $status)
            );

        $_resHandler = $this->responseHandler()->throwErrorOn('405', ErrorType::init('Invalid input'));

        $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * @param int $petId Pet id to delete
     * @param string|null $apiKey
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function deletePet(int $petId, ?string $apiKey = null): void
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::DELETE, '/pet/{petId}')
            ->auth('petstore_auth')
            ->parameters(TemplateParam::init('petId', $petId), HeaderParam::init('api_key', $apiKey));

        $_resHandler = $this->responseHandler()->throwErrorOn('400', ErrorType::init('Invalid pet value'));

        $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * @param int $petId ID of pet to update
     * @param string|null $additionalMetadata Additional Metadata
     * @param FileWrapper|null $body
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function uploadFile(int $petId, ?string $additionalMetadata = null, ?FileWrapper $body = null): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/pet/{petId}/uploadImage')
            ->auth('petstore_auth')
            ->parameters(
                TemplateParam::init('petId', $petId),
                HeaderParam::init('Content-Type', 'application/octet-stream'),
                QueryParam::init('additionalMetadata', $additionalMetadata),
                FormParam::init('body', $body)
            );

        $_resHandler = $this->responseHandler()->type(ApiResponse::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }
}
