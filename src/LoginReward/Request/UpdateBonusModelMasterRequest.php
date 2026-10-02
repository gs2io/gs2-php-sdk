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

namespace Gs2\LoginReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\LoginReward\Model\AcquireAction;
use Gs2\LoginReward\Model\Reward;
use Gs2\LoginReward\Model\VerifyAction;
use Gs2\LoginReward\Model\ConsumeAction;

/**
 * Request for updateBonusModelMaster: Update Login Bonus Model Master
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatebonusmodelmaster
 */
class UpdateBonusModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Login Bonus Model name */
    private $bonusModelName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Mode */
    private $mode;
    /** @var string Period Event GRN */
    private $periodEventId;
    /** @var int Reset Hour (0-23, UTC) */
    private $resetHour;
    /** @var string Repeat */
    private $repeat;
    /** @var array Rewards */
    private $rewards;
    /** @var string Missed Receive Relief */
    private $missedReceiveRelief;
    /** @var array Missed Receive Relief Verify Actions */
    private $missedReceiveReliefVerifyActions;
    /** @var array Missed Receive Relief Consume Actions */
    private $missedReceiveReliefConsumeActions;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateBonusModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateBonusModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Login Bonus Model name */
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
    /** @param string|null $bonusModelName Login Bonus Model name */
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
    /**
     * @param string|null $bonusModelName Login Bonus Model name
     * @return UpdateBonusModelMasterRequest
     */
	public function withBonusModelName(?string $bonusModelName): UpdateBonusModelMasterRequest {
		$this->bonusModelName = $bonusModelName;
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withDescription(?string $description): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withMode(?string $mode): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withPeriodEventId(?string $periodEventId): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withResetHour(?int $resetHour): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withRepeat(?string $repeat): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withRewards(?array $rewards): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withMissedReceiveRelief(?string $missedReceiveRelief): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions): UpdateBonusModelMasterRequest {
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
     * @return UpdateBonusModelMasterRequest
     */
	public function withMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions): UpdateBonusModelMasterRequest {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBonusModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateBonusModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBonusModelName(array_key_exists('bonusModelName', $data) && $data['bonusModelName'] !== null ? $data['bonusModelName'] : null)
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
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "bonusModelName" => $this->getBonusModelName(),
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
        );
    }
}