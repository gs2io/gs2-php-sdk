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

class UpdatePropertyFormModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $propertyFormModelName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $slots;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdatePropertyFormModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getPropertyFormModelName(): ?string {
		return $this->propertyFormModelName;
	}
	public function setPropertyFormModelName(?string $propertyFormModelName) {
		$this->propertyFormModelName = $propertyFormModelName;
	}
	public function withPropertyFormModelName(?string $propertyFormModelName): UpdatePropertyFormModelMasterRequest {
		$this->propertyFormModelName = $propertyFormModelName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdatePropertyFormModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdatePropertyFormModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getSlots(): ?array {
		return $this->slots;
	}
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
	public function withSlots(?array $slots): UpdatePropertyFormModelMasterRequest {
		$this->slots = $slots;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdatePropertyFormModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdatePropertyFormModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPropertyFormModelName(array_key_exists('propertyFormModelName', $data) && $data['propertyFormModelName'] !== null ? $data['propertyFormModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSlots(array_map(
                function ($item) {
                    return SlotModel::fromJson($item);
                },
                array_key_exists('slots', $data) && $data['slots'] !== null ? $data['slots'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "propertyFormModelName" => $this->getPropertyFormModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "slots" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots() !== null && $this->getSlots() !== null ? $this->getSlots() : []
            ),
        );
    }
}