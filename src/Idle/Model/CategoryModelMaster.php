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

namespace Gs2\Idle\Model;

use Gs2\Core\Model\IModel;


/**
 * Category Model Master
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#categorymodelmaster
 */
class CategoryModelMaster implements IModel {
	/**
     * @var string Category Model Master GRN
	 */
	private $categoryModelId;
	/**
     * @var string Category Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Reward Interval (Minutes)
	 */
	private $rewardIntervalMinutes;
	/**
     * @var int Default Maximum Idle Time (Minutes)
	 */
	private $defaultMaximumIdleMinutes;
	/**
     * @var string Reward Reset Mode
	 */
	private $rewardResetMode;
	/**
     * @var array List of acquire actions for each idle time
	 */
	private $acquireActions;
	/**
     * @var string Idle Period Schedule ID
	 */
	private $idlePeriodScheduleId;
	/**
     * @var string Receive Period Schedule ID
	 */
	private $receivePeriodScheduleId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Category Model Master GRN */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
    /** @param string|null $categoryModelId Category Model Master GRN */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
    /**
     * @param string|null $categoryModelId Category Model Master GRN
     * @return CategoryModelMaster
     */
	public function withCategoryModelId(?string $categoryModelId): CategoryModelMaster {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
    /** @return string|null Category Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Category Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Category Model name
     * @return CategoryModelMaster
     */
	public function withName(?string $name): CategoryModelMaster {
		$this->name = $name;
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
     * @return CategoryModelMaster
     */
	public function withDescription(?string $description): CategoryModelMaster {
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
     * @return CategoryModelMaster
     */
	public function withMetadata(?string $metadata): CategoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Reward Interval (Minutes) */
	public function getRewardIntervalMinutes(): ?int {
		return $this->rewardIntervalMinutes;
	}
    /** @param int|null $rewardIntervalMinutes Reward Interval (Minutes) */
	public function setRewardIntervalMinutes(?int $rewardIntervalMinutes) {
		$this->rewardIntervalMinutes = $rewardIntervalMinutes;
	}
    /**
     * @param int|null $rewardIntervalMinutes Reward Interval (Minutes)
     * @return CategoryModelMaster
     */
	public function withRewardIntervalMinutes(?int $rewardIntervalMinutes): CategoryModelMaster {
		$this->rewardIntervalMinutes = $rewardIntervalMinutes;
		return $this;
	}
    /** @return int|null Default Maximum Idle Time (Minutes) */
	public function getDefaultMaximumIdleMinutes(): ?int {
		return $this->defaultMaximumIdleMinutes;
	}
    /** @param int|null $defaultMaximumIdleMinutes Default Maximum Idle Time (Minutes) */
	public function setDefaultMaximumIdleMinutes(?int $defaultMaximumIdleMinutes) {
		$this->defaultMaximumIdleMinutes = $defaultMaximumIdleMinutes;
	}
    /**
     * @param int|null $defaultMaximumIdleMinutes Default Maximum Idle Time (Minutes)
     * @return CategoryModelMaster
     */
	public function withDefaultMaximumIdleMinutes(?int $defaultMaximumIdleMinutes): CategoryModelMaster {
		$this->defaultMaximumIdleMinutes = $defaultMaximumIdleMinutes;
		return $this;
	}
    /** @return string|null Reward Reset Mode */
	public function getRewardResetMode(): ?string {
		return $this->rewardResetMode;
	}
    /** @param string|null $rewardResetMode Reward Reset Mode */
	public function setRewardResetMode(?string $rewardResetMode) {
		$this->rewardResetMode = $rewardResetMode;
	}
    /**
     * @param string|null $rewardResetMode Reward Reset Mode
     * @return CategoryModelMaster
     */
	public function withRewardResetMode(?string $rewardResetMode): CategoryModelMaster {
		$this->rewardResetMode = $rewardResetMode;
		return $this;
	}
    /** @return array|null List of acquire actions for each idle time */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of acquire actions for each idle time */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of acquire actions for each idle time
     * @return CategoryModelMaster
     */
	public function withAcquireActions(?array $acquireActions): CategoryModelMaster {
		$this->acquireActions = $acquireActions;
		return $this;
	}
    /** @return string|null Idle Period Schedule ID */
	public function getIdlePeriodScheduleId(): ?string {
		return $this->idlePeriodScheduleId;
	}
    /** @param string|null $idlePeriodScheduleId Idle Period Schedule ID */
	public function setIdlePeriodScheduleId(?string $idlePeriodScheduleId) {
		$this->idlePeriodScheduleId = $idlePeriodScheduleId;
	}
    /**
     * @param string|null $idlePeriodScheduleId Idle Period Schedule ID
     * @return CategoryModelMaster
     */
	public function withIdlePeriodScheduleId(?string $idlePeriodScheduleId): CategoryModelMaster {
		$this->idlePeriodScheduleId = $idlePeriodScheduleId;
		return $this;
	}
    /** @return string|null Receive Period Schedule ID */
	public function getReceivePeriodScheduleId(): ?string {
		return $this->receivePeriodScheduleId;
	}
    /** @param string|null $receivePeriodScheduleId Receive Period Schedule ID */
	public function setReceivePeriodScheduleId(?string $receivePeriodScheduleId) {
		$this->receivePeriodScheduleId = $receivePeriodScheduleId;
	}
    /**
     * @param string|null $receivePeriodScheduleId Receive Period Schedule ID
     * @return CategoryModelMaster
     */
	public function withReceivePeriodScheduleId(?string $receivePeriodScheduleId): CategoryModelMaster {
		$this->receivePeriodScheduleId = $receivePeriodScheduleId;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return CategoryModelMaster
     */
	public function withCreatedAt(?int $createdAt): CategoryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return CategoryModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): CategoryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return CategoryModelMaster
     */
	public function withRevision(?int $revision): CategoryModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?CategoryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new CategoryModelMaster())
            ->withCategoryModelId(array_key_exists('categoryModelId', $data) && $data['categoryModelId'] !== null ? $data['categoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRewardIntervalMinutes(array_key_exists('rewardIntervalMinutes', $data) && $data['rewardIntervalMinutes'] !== null ? $data['rewardIntervalMinutes'] : null)
            ->withDefaultMaximumIdleMinutes(array_key_exists('defaultMaximumIdleMinutes', $data) && $data['defaultMaximumIdleMinutes'] !== null ? $data['defaultMaximumIdleMinutes'] : null)
            ->withRewardResetMode(array_key_exists('rewardResetMode', $data) && $data['rewardResetMode'] !== null ? $data['rewardResetMode'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireActionList::fromJson($item);
                },
                $data['acquireActions']
            ))
            ->withIdlePeriodScheduleId(array_key_exists('idlePeriodScheduleId', $data) && $data['idlePeriodScheduleId'] !== null ? $data['idlePeriodScheduleId'] : null)
            ->withReceivePeriodScheduleId(array_key_exists('receivePeriodScheduleId', $data) && $data['receivePeriodScheduleId'] !== null ? $data['receivePeriodScheduleId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "rewardIntervalMinutes" => $this->getRewardIntervalMinutes(),
            "defaultMaximumIdleMinutes" => $this->getDefaultMaximumIdleMinutes(),
            "rewardResetMode" => $this->getRewardResetMode(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
            "idlePeriodScheduleId" => $this->getIdlePeriodScheduleId(),
            "receivePeriodScheduleId" => $this->getReceivePeriodScheduleId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}