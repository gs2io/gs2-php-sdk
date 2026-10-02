<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;


/**
 * Resource
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#resource
 */
class Resource implements IModel {
	/**
     * @var string Resource GRN
	 */
	private $resourceId;
	/**
     * @var string Resource Type
	 */
	private $type;
	/**
     * @var string Resource name
	 */
	private $name;
	/**
     * @var string Request parameter
	 */
	private $request;
	/**
     * @var string Response to resource creation/update
	 */
	private $response;
	/**
     * @var string Types of rollback operations
	 */
	private $rollbackContext;
	/**
     * @var string Request parameters for rollback
	 */
	private $rollbackRequest;
	/**
     * @var array Name of the resource on which you are relying at the time of rollback
	 */
	private $rollbackAfter;
	/**
     * @var array Fields to be recorded in Output when the resource is created
	 */
	private $outputFields;
	/**
     * @var string Execution ID at the time this resource was created
	 */
	private $workId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return string|null Resource GRN */
	public function getResourceId(): ?string {
		return $this->resourceId;
	}
    /** @param string|null $resourceId Resource GRN */
	public function setResourceId(?string $resourceId) {
		$this->resourceId = $resourceId;
	}
    /**
     * @param string|null $resourceId Resource GRN
     * @return Resource
     */
	public function withResourceId(?string $resourceId): Resource {
		$this->resourceId = $resourceId;
		return $this;
	}
    /** @return string|null Resource Type */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Resource Type */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Resource Type
     * @return Resource
     */
	public function withType(?string $type): Resource {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Resource name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Resource name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Resource name
     * @return Resource
     */
	public function withName(?string $name): Resource {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Request parameter */
	public function getRequest(): ?string {
		return $this->request;
	}
    /** @param string|null $request Request parameter */
	public function setRequest(?string $request) {
		$this->request = $request;
	}
    /**
     * @param string|null $request Request parameter
     * @return Resource
     */
	public function withRequest(?string $request): Resource {
		$this->request = $request;
		return $this;
	}
    /** @return string|null Response to resource creation/update */
	public function getResponse(): ?string {
		return $this->response;
	}
    /** @param string|null $response Response to resource creation/update */
	public function setResponse(?string $response) {
		$this->response = $response;
	}
    /**
     * @param string|null $response Response to resource creation/update
     * @return Resource
     */
	public function withResponse(?string $response): Resource {
		$this->response = $response;
		return $this;
	}
    /** @return string|null Types of rollback operations */
	public function getRollbackContext(): ?string {
		return $this->rollbackContext;
	}
    /** @param string|null $rollbackContext Types of rollback operations */
	public function setRollbackContext(?string $rollbackContext) {
		$this->rollbackContext = $rollbackContext;
	}
    /**
     * @param string|null $rollbackContext Types of rollback operations
     * @return Resource
     */
	public function withRollbackContext(?string $rollbackContext): Resource {
		$this->rollbackContext = $rollbackContext;
		return $this;
	}
    /** @return string|null Request parameters for rollback */
	public function getRollbackRequest(): ?string {
		return $this->rollbackRequest;
	}
    /** @param string|null $rollbackRequest Request parameters for rollback */
	public function setRollbackRequest(?string $rollbackRequest) {
		$this->rollbackRequest = $rollbackRequest;
	}
    /**
     * @param string|null $rollbackRequest Request parameters for rollback
     * @return Resource
     */
	public function withRollbackRequest(?string $rollbackRequest): Resource {
		$this->rollbackRequest = $rollbackRequest;
		return $this;
	}
    /** @return array|null Name of the resource on which you are relying at the time of rollback */
	public function getRollbackAfter(): ?array {
		return $this->rollbackAfter;
	}
    /** @param array|null $rollbackAfter Name of the resource on which you are relying at the time of rollback */
	public function setRollbackAfter(?array $rollbackAfter) {
		$this->rollbackAfter = $rollbackAfter;
	}
    /**
     * @param array|null $rollbackAfter Name of the resource on which you are relying at the time of rollback
     * @return Resource
     */
	public function withRollbackAfter(?array $rollbackAfter): Resource {
		$this->rollbackAfter = $rollbackAfter;
		return $this;
	}
    /** @return array|null Fields to be recorded in Output when the resource is created */
	public function getOutputFields(): ?array {
		return $this->outputFields;
	}
    /** @param array|null $outputFields Fields to be recorded in Output when the resource is created */
	public function setOutputFields(?array $outputFields) {
		$this->outputFields = $outputFields;
	}
    /**
     * @param array|null $outputFields Fields to be recorded in Output when the resource is created
     * @return Resource
     */
	public function withOutputFields(?array $outputFields): Resource {
		$this->outputFields = $outputFields;
		return $this;
	}
    /** @return string|null Execution ID at the time this resource was created */
	public function getWorkId(): ?string {
		return $this->workId;
	}
    /** @param string|null $workId Execution ID at the time this resource was created */
	public function setWorkId(?string $workId) {
		$this->workId = $workId;
	}
    /**
     * @param string|null $workId Execution ID at the time this resource was created
     * @return Resource
     */
	public function withWorkId(?string $workId): Resource {
		$this->workId = $workId;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Resource
     */
	public function withCreatedAt(?int $createdAt): Resource {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Resource {
        if ($data === null) {
            return null;
        }
        return (new Resource())
            ->withResourceId(array_key_exists('resourceId', $data) && $data['resourceId'] !== null ? $data['resourceId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withRequest(array_key_exists('request', $data) && $data['request'] !== null ? $data['request'] : null)
            ->withResponse(array_key_exists('response', $data) && $data['response'] !== null ? $data['response'] : null)
            ->withRollbackContext(array_key_exists('rollbackContext', $data) && $data['rollbackContext'] !== null ? $data['rollbackContext'] : null)
            ->withRollbackRequest(array_key_exists('rollbackRequest', $data) && $data['rollbackRequest'] !== null ? $data['rollbackRequest'] : null)
            ->withRollbackAfter(!array_key_exists('rollbackAfter', $data) || $data['rollbackAfter'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['rollbackAfter']
            ))
            ->withOutputFields(!array_key_exists('outputFields', $data) || $data['outputFields'] === null ? null : array_map(
                function ($item) {
                    return OutputField::fromJson($item);
                },
                $data['outputFields']
            ))
            ->withWorkId(array_key_exists('workId', $data) && $data['workId'] !== null ? $data['workId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "resourceId" => $this->getResourceId(),
            "type" => $this->getType(),
            "name" => $this->getName(),
            "request" => $this->getRequest(),
            "response" => $this->getResponse(),
            "rollbackContext" => $this->getRollbackContext(),
            "rollbackRequest" => $this->getRollbackRequest(),
            "rollbackAfter" => $this->getRollbackAfter() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getRollbackAfter()
            ),
            "outputFields" => $this->getOutputFields() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getOutputFields()
            ),
            "workId" => $this->getWorkId(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}