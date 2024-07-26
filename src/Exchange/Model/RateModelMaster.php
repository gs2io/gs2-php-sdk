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
	private $verifyActions;
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
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
	public function withVerifyActions(?array $verifyActions): RateModelMaster {
		$this->verifyActions = $verifyActions;
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
            ->withVerifyActions(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('verifyActions', $data) && $data['verifyActions'] !== null ? $data['verifyActions'] : []
            ))
            ->withConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('consumeActions', $data) && $data['consumeActions'] !== null ? $data['consumeActions'] : []
            ))
            ->withTimingType(array_key_exists('timingType', $data) && $data['timingType'] !== null ? $data['timingType'] : null)
            ->withLockTime(array_key_exists('lockTime', $data) && $data['lockTime'] !== null ? $data['lockTime'] : null)
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
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
            "verifyActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions() !== null && $this->getVerifyActions() !== null ? $this->getVerifyActions() : []
            ),
            "consumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions() !== null && $this->getConsumeActions() !== null ? $this->getConsumeActions() : []
            ),
            "timingType" => $this->getTimingType(),
            "lockTime" => $this->getLockTime(),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}