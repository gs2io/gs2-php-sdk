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
use Gs2\Formation\Model\SlotModel;

/**
 * Request for updateFormModelMaster: Update Form Model Master
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#updateformmodelmaster
 */
class UpdateFormModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Form Model name */
    private $formModelName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Slot Model */
    private $slots;
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
     * @return UpdateFormModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateFormModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateFormModelMasterRequest
     */
	public function withFormModelName(?string $formModelName): UpdateFormModelMasterRequest {
		$this->formModelName = $formModelName;
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
     * @return UpdateFormModelMasterRequest
     */
	public function withDescription(?string $description): UpdateFormModelMasterRequest {
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
     * @return UpdateFormModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateFormModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Slot Model */
	public function getSlots(): ?array {
		return $this->slots;
	}
    /** @param array|null $slots List of Slot Model */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
    /**
     * @param array|null $slots List of Slot Model
     * @return UpdateFormModelMasterRequest
     */
	public function withSlots(?array $slots): UpdateFormModelMasterRequest {
		$this->slots = $slots;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateFormModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateFormModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return SlotModel::fromJson($item);
                },
                $data['slots']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "formModelName" => $this->getFormModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
        );
    }
}