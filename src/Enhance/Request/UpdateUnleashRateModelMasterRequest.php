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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\UnleashRateEntryModel;

class UpdateUnleashRateModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rateName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $targetInventoryModelId;
    /** @var string */
    private $gradeModelId;
    /** @var array */
    private $gradeEntries;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateUnleashRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): UpdateUnleashRateModelMasterRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateUnleashRateModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateUnleashRateModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UpdateUnleashRateModelMasterRequest {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
	public function withGradeModelId(?string $gradeModelId): UpdateUnleashRateModelMasterRequest {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
	public function withGradeEntries(?array $gradeEntries): UpdateUnleashRateModelMasterRequest {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateUnleashRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateUnleashRateModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withGradeEntries(array_map(
                function ($item) {
                    return UnleashRateEntryModel::fromJson($item);
                },
                array_key_exists('gradeEntries', $data) && $data['gradeEntries'] !== null ? $data['gradeEntries'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "gradeModelId" => $this->getGradeModelId(),
            "gradeEntries" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries() !== null && $this->getGradeEntries() !== null ? $this->getGradeEntries() : []
            ),
        );
    }
}