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

namespace Gs2\Exchange\Model;

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
     * @var array
	 */
	private $consumeActions;
	/**
     * @var string
	 */
	private $timingType;
	/**
     * @var int
	 */
	private $lockTime;
	/**
     * @var bool
	 */
	private $enableSkip;
	/**
     * @var array
	 */
	private $skipConsumeActions;
	/**
     * @var array
	 */
	private $acquireActions;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

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

	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	public function withConsumeActions(?array $consumeActions): RateModelMaster {
		$this->consumeActions = $consumeActions;
		return $this;
	}

	public function getTimingType(): ?string {
		return $this->timingType;
	}

	public function setTimingType(?string $timingType) {
		$this->timingType = $timingType;
	}

	public function withTimingType(?string $timingType): RateModelMaster {
		$this->timingType = $timingType;
		return $this;
	}

	public function getLockTime(): ?int {
		return $this->lockTime;
	}

	public function setLockTime(?int $lockTime) {
		$this->lockTime = $lockTime;
	}

	public function withLockTime(?int $lockTime): RateModelMaster {
		$this->lockTime = $lockTime;
		return $this;
	}

	public function getEnableSkip(): ?bool {
		return $this->enableSkip;
	}

	public function setEnableSkip(?bool $enableSkip) {
		$this->enableSkip = $enableSkip;
	}

	public function withEnableSkip(?bool $enableSkip): RateModelMaster {
		$this->enableSkip = $enableSkip;
		return $this;
	}

	public function getSkipConsumeActions(): ?array {
		return $this->skipConsumeActions;
	}

	public function setSkipConsumeActions(?array $skipConsumeActions) {
		$this->skipConsumeActions = $skipConsumeActions;
	}

	public function withSkipConsumeActions(?array $skipConsumeActions): RateModelMaster {
		$this->skipConsumeActions = $skipConsumeActions;
		return $this;
	}

	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	public function withAcquireActions(?array $acquireActions): RateModelMaster {
		$this->acquireActions = $acquireActions;
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

    public static function fromJson(?array $data): ?RateModelMaster {
        if ($data === null) {
            return null;
        }
        return (new RateModelMaster())
            ->withRateModelId(empty($data['rateModelId']) ? null : $data['rateModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('consumeActions', $data) && $data['consumeActions'] !== null ? $data['consumeActions'] : []
            ))
            ->withTimingType(empty($data['timingType']) ? null : $data['timingType'])
            ->withLockTime(empty($data['lockTime']) && $data['lockTime'] !== 0 ? null : $data['lockTime'])
            ->withEnableSkip($data['enableSkip'])
            ->withSkipConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('skipConsumeActions', $data) && $data['skipConsumeActions'] !== null ? $data['skipConsumeActions'] : []
            ))
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "rateModelId" => $this->getRateModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "consumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions() !== null && $this->getConsumeActions() !== null ? $this->getConsumeActions() : []
            ),
            "timingType" => $this->getTimingType(),
            "lockTime" => $this->getLockTime(),
            "enableSkip" => $this->getEnableSkip(),
            "skipConsumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSkipConsumeActions() !== null && $this->getSkipConsumeActions() !== null ? $this->getSkipConsumeActions() : []
            ),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}