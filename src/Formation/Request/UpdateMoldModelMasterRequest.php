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
 * Request for updateMoldModelMaster: Update Form Storage Area Master
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#updatemoldmodelmaster
 */
class UpdateMoldModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Form Storage Area Model name */
    private $moldModelName;
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
     * @return UpdateMoldModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateMoldModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
    /** @param string|null $moldModelName Form Storage Area Model name */
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
    /**
     * @param string|null $moldModelName Form Storage Area Model name
     * @return UpdateMoldModelMasterRequest
     */
	public function withMoldModelName(?string $moldModelName): UpdateMoldModelMasterRequest {
		$this->moldModelName = $moldModelName;
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
     * @return UpdateMoldModelMasterRequest
     */
	public function withDescription(?string $description): UpdateMoldModelMasterRequest {
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
     * @return UpdateMoldModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateMoldModelMasterRequest {
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
     * @return UpdateMoldModelMasterRequest
     */
	public function withFormModelName(?string $formModelName): UpdateMoldModelMasterRequest {
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
     * @return UpdateMoldModelMasterRequest
     */
	public function withInitialMaxCapacity(?int $initialMaxCapacity): UpdateMoldModelMasterRequest {
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
     * @return UpdateMoldModelMasterRequest
     */
	public function withMaxCapacity(?int $maxCapacity): UpdateMoldModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMoldModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMoldModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null)
            ->withInitialMaxCapacity(array_key_exists('initialMaxCapacity', $data) && $data['initialMaxCapacity'] !== null ? $data['initialMaxCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "moldModelName" => $this->getMoldModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "formModelName" => $this->getFormModelName(),
            "initialMaxCapacity" => $this->getInitialMaxCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
        );
    }
}