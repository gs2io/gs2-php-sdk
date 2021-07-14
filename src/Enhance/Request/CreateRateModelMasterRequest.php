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

class CreateRateModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
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

	public function withNamespaceName(?string $namespaceName): CreateRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateRateModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateRateModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateRateModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}

	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}

	public function withTargetInventoryModelId(?string $targetInventoryModelId): CreateRateModelMasterRequest {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}

	public function getAcquireExperienceSuffix(): ?string {
		return $this->acquireExperienceSuffix;
	}

	public function setAcquireExperienceSuffix(?string $acquireExperienceSuffix) {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
	}

	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): CreateRateModelMasterRequest {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
		return $this;
	}

	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}

	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}

	public function withMaterialInventoryModelId(?string $materialInventoryModelId): CreateRateModelMasterRequest {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}

	public function getAcquireExperienceHierarchy(): ?array {
		return $this->acquireExperienceHierarchy;
	}

	public function setAcquireExperienceHierarchy(?array $acquireExperienceHierarchy) {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
	}

	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): CreateRateModelMasterRequest {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
		return $this;
	}

	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	public function withExperienceModelId(?string $experienceModelId): CreateRateModelMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}

	public function getBonusRates(): ?array {
		return $this->bonusRates;
	}

	public function setBonusRates(?array $bonusRates) {
		$this->bonusRates = $bonusRates;
	}

	public function withBonusRates(?array $bonusRates): CreateRateModelMasterRequest {
		$this->bonusRates = $bonusRates;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateRateModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withTargetInventoryModelId(empty($data['targetInventoryModelId']) ? null : $data['targetInventoryModelId'])
            ->withAcquireExperienceSuffix(empty($data['acquireExperienceSuffix']) ? null : $data['acquireExperienceSuffix'])
            ->withMaterialInventoryModelId(empty($data['materialInventoryModelId']) ? null : $data['materialInventoryModelId'])
            ->withAcquireExperienceHierarchy(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('acquireExperienceHierarchy', $data) && $data['acquireExperienceHierarchy'] !== null ? $data['acquireExperienceHierarchy'] : []
            ))
            ->withExperienceModelId(empty($data['experienceModelId']) ? null : $data['experienceModelId'])
            ->withBonusRates(array_map(
                function ($item) {
                    return BonusRate::fromJson($item);
                },
                array_key_exists('bonusRates', $data) && $data['bonusRates'] !== null ? $data['bonusRates'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "acquireExperienceSuffix" => $this->getAcquireExperienceSuffix(),
            "materialInventoryModelId" => $this->getMaterialInventoryModelId(),
            "acquireExperienceHierarchy" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAcquireExperienceHierarchy() !== null && $this->getAcquireExperienceHierarchy() !== null ? $this->getAcquireExperienceHierarchy() : []
            ),
            "experienceModelId" => $this->getExperienceModelId(),
            "bonusRates" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBonusRates() !== null && $this->getBonusRates() !== null ? $this->getBonusRates() : []
            ),
        );
    }
}