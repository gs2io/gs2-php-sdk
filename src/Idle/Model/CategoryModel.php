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
 * Category Model
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#categorymodel
 */
class CategoryModel implements IModel {
	/**
     * @var string Category Model GRN
	 */
	private $categoryModelId;
	/**
     * @var string Category Model name
	 */
	private $name;
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
    /** @return string|null Category Model GRN */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
    /** @param string|null $categoryModelId Category Model GRN */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
    /**
     * @param string|null $categoryModelId Category Model GRN
     * @return CategoryModel
     */
	public function withCategoryModelId(?string $categoryModelId): CategoryModel {
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
     * @return CategoryModel
     */
	public function withName(?string $name): CategoryModel {
		$this->name = $name;
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
     * @return CategoryModel
     */
	public function withMetadata(?string $metadata): CategoryModel {
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
     * @return CategoryModel
     */
	public function withRewardIntervalMinutes(?int $rewardIntervalMinutes): CategoryModel {
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
     * @return CategoryModel
     */
	public function withDefaultMaximumIdleMinutes(?int $defaultMaximumIdleMinutes): CategoryModel {
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
     * @return CategoryModel
     */
	public function withRewardResetMode(?string $rewardResetMode): CategoryModel {
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
     * @return CategoryModel
     */
	public function withAcquireActions(?array $acquireActions): CategoryModel {
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
     * @return CategoryModel
     */
	public function withIdlePeriodScheduleId(?string $idlePeriodScheduleId): CategoryModel {
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
     * @return CategoryModel
     */
	public function withReceivePeriodScheduleId(?string $receivePeriodScheduleId): CategoryModel {
		$this->receivePeriodScheduleId = $receivePeriodScheduleId;
		return $this;
	}

    public static function fromJson(?array $data): ?CategoryModel {
        if ($data === null) {
            return null;
        }
        return (new CategoryModel())
            ->withCategoryModelId(array_key_exists('categoryModelId', $data) && $data['categoryModelId'] !== null ? $data['categoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ->withReceivePeriodScheduleId(array_key_exists('receivePeriodScheduleId', $data) && $data['receivePeriodScheduleId'] !== null ? $data['receivePeriodScheduleId'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "name" => $this->getName(),
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
        );
    }
}