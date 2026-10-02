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
 * Login Bonus Model
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#bonusmodel
 */
class BonusModel implements IModel {
	/**
     * @var string Login Bonus Model GRN
	 */
	private $bonusModelId;
	/**
     * @var string Login Bonus Model name
	 */
	private $name;
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
     * @var int Reset Hour (UTC)
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
    /** @return string|null Login Bonus Model GRN */
	public function getBonusModelId(): ?string {
		return $this->bonusModelId;
	}
    /** @param string|null $bonusModelId Login Bonus Model GRN */
	public function setBonusModelId(?string $bonusModelId) {
		$this->bonusModelId = $bonusModelId;
	}
    /**
     * @param string|null $bonusModelId Login Bonus Model GRN
     * @return BonusModel
     */
	public function withBonusModelId(?string $bonusModelId): BonusModel {
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
     * @return BonusModel
     */
	public function withName(?string $name): BonusModel {
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
     * @return BonusModel
     */
	public function withMetadata(?string $metadata): BonusModel {
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
     * @return BonusModel
     */
	public function withMode(?string $mode): BonusModel {
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
     * @return BonusModel
     */
	public function withPeriodEventId(?string $periodEventId): BonusModel {
		$this->periodEventId = $periodEventId;
		return $this;
	}
    /** @return int|null Reset Hour (UTC) */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
    /** @param int|null $resetHour Reset Hour (UTC) */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
    /**
     * @param int|null $resetHour Reset Hour (UTC)
     * @return BonusModel
     */
	public function withResetHour(?int $resetHour): BonusModel {
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
     * @return BonusModel
     */
	public function withRepeat(?string $repeat): BonusModel {
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
     * @return BonusModel
     */
	public function withRewards(?array $rewards): BonusModel {
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
     * @return BonusModel
     */
	public function withMissedReceiveRelief(?string $missedReceiveRelief): BonusModel {
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
     * @return BonusModel
     */
	public function withMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions): BonusModel {
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
     * @return BonusModel
     */
	public function withMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions): BonusModel {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
		return $this;
	}

    public static function fromJson(?array $data): ?BonusModel {
        if ($data === null) {
            return null;
        }
        return (new BonusModel())
            ->withBonusModelId(array_key_exists('bonusModelId', $data) && $data['bonusModelId'] !== null ? $data['bonusModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ));
    }

    public function toJson(): array {
        return array(
            "bonusModelId" => $this->getBonusModelId(),
            "name" => $this->getName(),
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
        );
    }
}