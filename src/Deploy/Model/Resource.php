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


class Resource implements IModel {
	/**
     * @var string
	 */
	private $resourceId;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $request;
	/**
     * @var string
	 */
	private $response;
	/**
     * @var string
	 */
	private $rollbackContext;
	/**
     * @var string
	 */
	private $rollbackRequest;
	/**
     * @var array
	 */
	private $rollbackAfter;
	/**
     * @var array
	 */
	private $outputFields;
	/**
     * @var string
	 */
	private $workId;
	/**
     * @var int
	 */
	private $createdAt;
	public function getResourceId(): ?string {
		return $this->resourceId;
	}
	public function setResourceId(?string $resourceId) {
		$this->resourceId = $resourceId;
	}
	public function withResourceId(?string $resourceId): Resource {
		$this->resourceId = $resourceId;
		return $this;
	}
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): Resource {
		$this->type = $type;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Resource {
		$this->name = $name;
		return $this;
	}
	public function getRequest(): ?string {
		return $this->request;
	}
	public function setRequest(?string $request) {
		$this->request = $request;
	}
	public function withRequest(?string $request): Resource {
		$this->request = $request;
		return $this;
	}
	public function getResponse(): ?string {
		return $this->response;
	}
	public function setResponse(?string $response) {
		$this->response = $response;
	}
	public function withResponse(?string $response): Resource {
		$this->response = $response;
		return $this;
	}
	public function getRollbackContext(): ?string {
		return $this->rollbackContext;
	}
	public function setRollbackContext(?string $rollbackContext) {
		$this->rollbackContext = $rollbackContext;
	}
	public function withRollbackContext(?string $rollbackContext): Resource {
		$this->rollbackContext = $rollbackContext;
		return $this;
	}
	public function getRollbackRequest(): ?string {
		return $this->rollbackRequest;
	}
	public function setRollbackRequest(?string $rollbackRequest) {
		$this->rollbackRequest = $rollbackRequest;
	}
	public function withRollbackRequest(?string $rollbackRequest): Resource {
		$this->rollbackRequest = $rollbackRequest;
		return $this;
	}
	public function getRollbackAfter(): ?array {
		return $this->rollbackAfter;
	}
	public function setRollbackAfter(?array $rollbackAfter) {
		$this->rollbackAfter = $rollbackAfter;
	}
	public function withRollbackAfter(?array $rollbackAfter): Resource {
		$this->rollbackAfter = $rollbackAfter;
		return $this;
	}
	public function getOutputFields(): ?array {
		return $this->outputFields;
	}
	public function setOutputFields(?array $outputFields) {
		$this->outputFields = $outputFields;
	}
	public function withOutputFields(?array $outputFields): Resource {
		$this->outputFields = $outputFields;
		return $this;
	}
	public function getWorkId(): ?string {
		return $this->workId;
	}
	public function setWorkId(?string $workId) {
		$this->workId = $workId;
	}
	public function withWorkId(?string $workId): Resource {
		$this->workId = $workId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
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