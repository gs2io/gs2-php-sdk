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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createMoldModelMaster: Create Form Storage Area Master
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#createmoldmodelmaster
 */
class CreateMoldModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Form Storage Area Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Form Model name */
    private $formModelName;
    /** @var int Initial capacity to store forms */
    private $initialMaxCapacity;
    /** @var int Maximum capacity to store forms */
    private $maxCapacity;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateMoldModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateMoldModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Form Storage Area Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Form Storage Area Model name
     * @return CreateMoldModelMasterRequest
     */
	public function withName(?string $name): CreateMoldModelMasterRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateMoldModelMasterRequest
     */
	public function withDescription(?string $description): CreateMoldModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return CreateMoldModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateMoldModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Form Model name */
	public function getFormModelName(): ?string {
		return $this->formModelName;
	}
    /** @param string|null $formModelName Form Model name */
	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}
    /**
     * @param string|null $formModelName Form Model name
     * @return CreateMoldModelMasterRequest
     */
	public function withFormModelName(?string $formModelName): CreateMoldModelMasterRequest {
		$this->formModelName = $formModelName;
		return $this;
	}
    /** @return int|null Initial capacity to store forms */
	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}
    /** @param int|null $initialMaxCapacity Initial capacity to store forms */
	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}
    /**
     * @param int|null $initialMaxCapacity Initial capacity to store forms
     * @return CreateMoldModelMasterRequest
     */
	public function withInitialMaxCapacity(?int $initialMaxCapacity): CreateMoldModelMasterRequest {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}
    /** @return int|null Maximum capacity to store forms */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
    /** @param int|null $maxCapacity Maximum capacity to store forms */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
    /**
     * @param int|null $maxCapacity Maximum capacity to store forms
     * @return CreateMoldModelMasterRequest
     */
	public function withMaxCapacity(?int $maxCapacity): CreateMoldModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateMoldModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateMoldModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null)
            ->withInitialMaxCapacity(array_key_exists('initialMaxCapacity', $data) && $data['initialMaxCapacity'] !== null ? $data['initialMaxCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "formModelName" => $this->getFormModelName(),
            "initialMaxCapacity" => $this->getInitialMaxCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
        );
    }
}