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


class RateModelMaster implements IModel {
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
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}
	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}
	public function withRateModelId(?string $rateModelId): RateModelMaster {
		$this->rateModelId = $rateModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RateModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): RateModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RateModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
	public function withTargetInventoryModelId(?string $targetInventoryModelId): RateModelMaster {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
	public function getAcquireExperienceSuffix(): ?string {
		return $this->acquireExperienceSuffix;
	}
	public function setAcquireExperienceSuffix(?string $acquireExperienceSuffix) {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
	}
	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): RateModelMaster {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
		return $this;
	}
	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}
	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): RateModelMaster {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}
	public function getAcquireExperienceHierarchy(): ?array {
		return $this->acquireExperienceHierarchy;
	}
	public function setAcquireExperienceHierarchy(?array $acquireExperienceHierarchy) {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
	}
	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): RateModelMaster {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
		return $this;
	}
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
	public function withExperienceModelId(?string $experienceModelId): RateModelMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	public function getBonusRates(): ?array {
		return $this->bonusRates;
	}
	public function setBonusRates(?array $bonusRates) {
		$this->bonusRates = $bonusRates;
	}
	public function withBonusRates(?array $bonusRates): RateModelMaster {
		$this->bonusRates = $bonusRates;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): RateModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): RateModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): RateModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?RateModelMaster {
        if ($data === null) {
            return null;
        }
        return (new RateModelMaster())
            ->withRateModelId(array_key_exists('rateModelId', $data) && $data['rateModelId'] !== null ? $data['rateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}