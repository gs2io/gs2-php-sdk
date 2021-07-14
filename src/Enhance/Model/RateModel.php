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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


class RateModel implements IModel {
	/**
     * @var string
	 */
	private $rateModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $targetInventoryModelId;
	/**
     * @var string
	 */
	private $acquireExperienceSuffix;
	/**
     * @var string
	 */
	private $materialInventoryModelId;
	/**
     * @var array
	 */
	private $acquireExperienceHierarchy;
	/**
     * @var string
	 */
	private $experienceModelId;
	/**
     * @var array
	 */
	private $bonusRates;

	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}

	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}

	public function withRateModelId(?string $rateModelId): RateModel {
		$this->rateModelId = $rateModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): RateModel {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): RateModel {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): RateModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}

	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}

	public function withTargetInventoryModelId(?string $targetInventoryModelId): RateModel {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}

	public function getAcquireExperienceSuffix(): ?string {
		return $this->acquireExperienceSuffix;
	}

	public function setAcquireExperienceSuffix(?string $acquireExperienceSuffix) {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
	}

	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): RateModel {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
		return $this;
	}

	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}

	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}

	public function withMaterialInventoryModelId(?string $materialInventoryModelId): RateModel {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}

	public function getAcquireExperienceHierarchy(): ?array {
		return $this->acquireExperienceHierarchy;
	}

	public function setAcquireExperienceHierarchy(?array $acquireExperienceHierarchy) {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
	}

	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): RateModel {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
		return $this;
	}

	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	public function withExperienceModelId(?string $experienceModelId): RateModel {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}

	public function getBonusRates(): ?array {
		return $this->bonusRates;
	}

	public function setBonusRates(?array $bonusRates) {
		$this->bonusRates = $bonusRates;
	}

	public function withBonusRates(?array $bonusRates): RateModel {
		$this->bonusRates = $bonusRates;
		return $this;
	}

    public static function fromJson(?array $data): ?RateModel {
        if ($data === null) {
            return null;
        }
        return (new RateModel())
            ->withRateModelId(empty($data['rateModelId']) ? null : $data['rateModelId'])
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
            "rateModelId" => $this->getRateModelId(),
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