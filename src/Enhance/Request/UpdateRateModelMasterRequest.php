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
use Gs2\Enhance\Model\BonusRate;

class UpdateRateModelMasterRequest extends Gs2BasicRequest {
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
    private $acquireExperienceSuffix;
    /** @var string */
    private $materialInventoryModelId;
    /** @var array */
    private $acquireExperienceHierarchy;
    /** @var string */
    private $experienceModelId;
    /** @var array */
    private $bonusRates;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): UpdateRateModelMasterRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateRateModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateRateModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UpdateRateModelMasterRequest {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
	public function getAcquireExperienceSuffix(): ?string {
		return $this->acquireExperienceSuffix;
	}
	public function setAcquireExperienceSuffix(?string $acquireExperienceSuffix) {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
	}
	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): UpdateRateModelMasterRequest {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
		return $this;
	}
	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}
	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): UpdateRateModelMasterRequest {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}
	public function getAcquireExperienceHierarchy(): ?array {
		return $this->acquireExperienceHierarchy;
	}
	public function setAcquireExperienceHierarchy(?array $acquireExperienceHierarchy) {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
	}
	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): UpdateRateModelMasterRequest {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
		return $this;
	}
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
	public function withExperienceModelId(?string $experienceModelId): UpdateRateModelMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	public function getBonusRates(): ?array {
		return $this->bonusRates;
	}
	public function setBonusRates(?array $bonusRates) {
		$this->bonusRates = $bonusRates;
	}
	public function withBonusRates(?array $bonusRates): UpdateRateModelMasterRequest {
		$this->bonusRates = $bonusRates;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRateModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withAcquireExperienceSuffix(array_key_exists('acquireExperienceSuffix', $data) && $data['acquireExperienceSuffix'] !== null ? $data['acquireExperienceSuffix'] : null)
            ->withMaterialInventoryModelId(array_key_exists('materialInventoryModelId', $data) && $data['materialInventoryModelId'] !== null ? $data['materialInventoryModelId'] : null)
            ->withAcquireExperienceHierarchy(!array_key_exists('acquireExperienceHierarchy', $data) || $data['acquireExperienceHierarchy'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['acquireExperienceHierarchy']
            ))
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withBonusRates(!array_key_exists('bonusRates', $data) || $data['bonusRates'] === null ? null : array_map(
                function ($item) {
                    return BonusRate::fromJson($item);
                },
                $data['bonusRates']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "acquireExperienceSuffix" => $this->getAcquireExperienceSuffix(),
            "materialInventoryModelId" => $this->getMaterialInventoryModelId(),
            "acquireExperienceHierarchy" => $this->getAcquireExperienceHierarchy() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAcquireExperienceHierarchy()
            ),
            "experienceModelId" => $this->getExperienceModelId(),
            "bonusRates" => $this->getBonusRates() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBonusRates()
            ),
        );
    }
}