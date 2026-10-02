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

namespace Gs2\LoginReward\Model;

use Gs2\Core\Model\IModel;


/**
 * Login Bonus Model Master
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#bonusmodelmaster
 */
class BonusModelMaster implements IModel {
	/**
     * @var string Login Bonus Model Master GRN
	 */
	private $bonusModelId;
	/**
     * @var string Login Bonus Model name
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
     * @var string Mode
	 */
	private $mode;
	/**
     * @var string Period Event GRN
	 */
	private $periodEventId;
	/**
     * @var int Reset Hour (0-23, UTC)
	 */
	private $resetHour;
	/**
     * @var string Repeat
	 */
	private $repeat;
	/**
     * @var array Rewards
	 */
	private $rewards;
	/**
     * @var string Missed Receive Relief
	 */
	private $missedReceiveRelief;
	/**
     * @var array Missed Receive Relief Verify Actions
	 */
	private $missedReceiveReliefVerifyActions;
	/**
     * @var array Missed Receive Relief Consume Actions
	 */
	private $missedReceiveReliefConsumeActions;
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
    /** @return string|null Login Bonus Model Master GRN */
	public function getBonusModelId(): ?string {
		return $this->bonusModelId;
	}
    /** @param string|null $bonusModelId Login Bonus Model Master GRN */
	public function setBonusModelId(?string $bonusModelId) {
		$this->bonusModelId = $bonusModelId;
	}
    /**
     * @param string|null $bonusModelId Login Bonus Model Master GRN
     * @return BonusModelMaster
     */
	public function withBonusModelId(?string $bonusModelId): BonusModelMaster {
		$this->bonusModelId = $bonusModelId;
		return $this;
	}
    /** @return string|null Login Bonus Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Login Bonus Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Login Bonus Model name
     * @return BonusModelMaster
     */
	public function withName(?string $name): BonusModelMaster {
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
     * @return BonusModelMaster
     */
	public function withDescription(?string $description): BonusModelMaster {
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
     * @return BonusModelMaster
     */
	public function withMetadata(?string $metadata): BonusModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Mode */
	public function getMode(): ?string {
		return $this->mode;
	}
    /** @param string|null $mode Mode */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
    /**
     * @param string|null $mode Mode
     * @return BonusModelMaster
     */
	public function withMode(?string $mode): BonusModelMaster {
		$this->mode = $mode;
		return $this;
	}
    /** @return string|null Period Event GRN */
	public function getPeriodEventId(): ?string {
		return $this->periodEventId;
	}
    /** @param string|null $periodEventId Period Event GRN */
	public function setPeriodEventId(?string $periodEventId) {
		$this->periodEventId = $periodEventId;
	}
    /**
     * @param string|null $periodEventId Period Event GRN
     * @return BonusModelMaster
     */
	public function withPeriodEventId(?string $periodEventId): BonusModelMaster {
		$this->periodEventId = $periodEventId;
		return $this;
	}
    /** @return int|null Reset Hour (0-23, UTC) */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
    /** @param int|null $resetHour Reset Hour (0-23, UTC) */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
    /**
     * @param int|null $resetHour Reset Hour (0-23, UTC)
     * @return BonusModelMaster
     */
	public function withResetHour(?int $resetHour): BonusModelMaster {
		$this->resetHour = $resetHour;
		return $this;
	}
    /** @return string|null Repeat */
	public function getRepeat(): ?string {
		return $this->repeat;
	}
    /** @param string|null $repeat Repeat */
	public function setRepeat(?string $repeat) {
		$this->repeat = $repeat;
	}
    /**
     * @param string|null $repeat Repeat
     * @return BonusModelMaster
     */
	public function withRepeat(?string $repeat): BonusModelMaster {
		$this->repeat = $repeat;
		return $this;
	}
    /** @return array|null Rewards */
	public function getRewards(): ?array {
		return $this->rewards;
	}
    /** @param array|null $rewards Rewards */
	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}
    /**
     * @param array|null $rewards Rewards
     * @return BonusModelMaster
     */
	public function withRewards(?array $rewards): BonusModelMaster {
		$this->rewards = $rewards;
		return $this;
	}
    /** @return string|null Missed Receive Relief */
	public function getMissedReceiveRelief(): ?string {
		return $this->missedReceiveRelief;
	}
    /** @param string|null $missedReceiveRelief Missed Receive Relief */
	public function setMissedReceiveRelief(?string $missedReceiveRelief) {
		$this->missedReceiveRelief = $missedReceiveRelief;
	}
    /**
     * @param string|null $missedReceiveRelief Missed Receive Relief
     * @return BonusModelMaster
     */
	public function withMissedReceiveRelief(?string $missedReceiveRelief): BonusModelMaster {
		$this->missedReceiveRelief = $missedReceiveRelief;
		return $this;
	}
    /** @return array|null Missed Receive Relief Verify Actions */
	public function getMissedReceiveReliefVerifyActions(): ?array {
		return $this->missedReceiveReliefVerifyActions;
	}
    /** @param array|null $missedReceiveReliefVerifyActions Missed Receive Relief Verify Actions */
	public function setMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions) {
		$this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
	}
    /**
     * @param array|null $missedReceiveReliefVerifyActions Missed Receive Relief Verify Actions
     * @return BonusModelMaster
     */
	public function withMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions): BonusModelMaster {
		$this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
		return $this;
	}
    /** @return array|null Missed Receive Relief Consume Actions */
	public function getMissedReceiveReliefConsumeActions(): ?array {
		return $this->missedReceiveReliefConsumeActions;
	}
    /** @param array|null $missedReceiveReliefConsumeActions Missed Receive Relief Consume Actions */
	public function setMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions) {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
	}
    /**
     * @param array|null $missedReceiveReliefConsumeActions Missed Receive Relief Consume Actions
     * @return BonusModelMaster
     */
	public function withMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions): BonusModelMaster {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
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
     * @return BonusModelMaster
     */
	public function withCreatedAt(?int $createdAt): BonusModelMaster {
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
     * @return BonusModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): BonusModelMaster {
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
     * @return BonusModelMaster
     */
	public function withRevision(?int $revision): BonusModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BonusModelMaster {
        if ($data === null) {
            return null;
        }
        return (new BonusModelMaster())
            ->withBonusModelId(array_key_exists('bonusModelId', $data) && $data['bonusModelId'] !== null ? $data['bonusModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withPeriodEventId(array_key_exists('periodEventId', $data) && $data['periodEventId'] !== null ? $data['periodEventId'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withRepeat(array_key_exists('repeat', $data) && $data['repeat'] !== null ? $data['repeat'] : null)
            ->withRewards(!array_key_exists('rewards', $data) || $data['rewards'] === null ? null : array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                $data['rewards']
            ))
            ->withMissedReceiveRelief(array_key_exists('missedReceiveRelief', $data) && $data['missedReceiveRelief'] !== null ? $data['missedReceiveRelief'] : null)
            ->withMissedReceiveReliefVerifyActions(!array_key_exists('missedReceiveReliefVerifyActions', $data) || $data['missedReceiveReliefVerifyActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['missedReceiveReliefVerifyActions']
            ))
            ->withMissedReceiveReliefConsumeActions(!array_key_exists('missedReceiveReliefConsumeActions', $data) || $data['missedReceiveReliefConsumeActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['missedReceiveReliefConsumeActions']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "bonusModelId" => $this->getBonusModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "mode" => $this->getMode(),
            "periodEventId" => $this->getPeriodEventId(),
            "resetHour" => $this->getResetHour(),
            "repeat" => $this->getRepeat(),
            "rewards" => $this->getRewards() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRewards()
            ),
            "missedReceiveRelief" => $this->getMissedReceiveRelief(),
            "missedReceiveReliefVerifyActions" => $this->getMissedReceiveReliefVerifyActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMissedReceiveReliefVerifyActions()
            ),
            "missedReceiveReliefConsumeActions" => $this->getMissedReceiveReliefConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMissedReceiveReliefConsumeActions()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}