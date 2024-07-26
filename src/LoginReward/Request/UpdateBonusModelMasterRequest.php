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

class UpdateBonusModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $bonusModelName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $mode;
    /** @var string */
    private $periodEventId;
    /** @var int */
    private $resetHour;
    /** @var string */
    private $repeat;
    /** @var array */
    private $rewards;
    /** @var string */
    private $missedReceiveRelief;
    /** @var array */
    private $missedReceiveReliefVerifyActions;
    /** @var array */
    private $missedReceiveReliefConsumeActions;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateBonusModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
	public function withBonusModelName(?string $bonusModelName): UpdateBonusModelMasterRequest {
		$this->bonusModelName = $bonusModelName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateBonusModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateBonusModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMode(): ?string {
		return $this->mode;
	}
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
	public function withMode(?string $mode): UpdateBonusModelMasterRequest {
		$this->mode = $mode;
		return $this;
	}
	public function getPeriodEventId(): ?string {
		return $this->periodEventId;
	}
	public function setPeriodEventId(?string $periodEventId) {
		$this->periodEventId = $periodEventId;
	}
	public function withPeriodEventId(?string $periodEventId): UpdateBonusModelMasterRequest {
		$this->periodEventId = $periodEventId;
		return $this;
	}
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
	public function withResetHour(?int $resetHour): UpdateBonusModelMasterRequest {
		$this->resetHour = $resetHour;
		return $this;
	}
	public function getRepeat(): ?string {
		return $this->repeat;
	}
	public function setRepeat(?string $repeat) {
		$this->repeat = $repeat;
	}
	public function withRepeat(?string $repeat): UpdateBonusModelMasterRequest {
		$this->repeat = $repeat;
		return $this;
	}
	public function getRewards(): ?array {
		return $this->rewards;
	}
	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}
	public function withRewards(?array $rewards): UpdateBonusModelMasterRequest {
		$this->rewards = $rewards;
		return $this;
	}
	public function getMissedReceiveRelief(): ?string {
		return $this->missedReceiveRelief;
	}
	public function setMissedReceiveRelief(?string $missedReceiveRelief) {
		$this->missedReceiveRelief = $missedReceiveRelief;
	}
	public function withMissedReceiveRelief(?string $missedReceiveRelief): UpdateBonusModelMasterRequest {
		$this->missedReceiveRelief = $missedReceiveRelief;
		return $this;
	}
	public function getMissedReceiveReliefVerifyActions(): ?array {
		return $this->missedReceiveReliefVerifyActions;
	}
	public function setMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions) {
		$this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
	}
	public function withMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions): UpdateBonusModelMasterRequest {
		$this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
		return $this;
	}
	public function getMissedReceiveReliefConsumeActions(): ?array {
		return $this->missedReceiveReliefConsumeActions;
	}
	public function setMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions) {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
	}
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
            ->withRewards(array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                array_key_exists('rewards', $data) && $data['rewards'] !== null ? $data['rewards'] : []
            ))
            ->withMissedReceiveRelief(array_key_exists('missedReceiveRelief', $data) && $data['missedReceiveRelief'] !== null ? $data['missedReceiveRelief'] : null)
            ->withMissedReceiveReliefVerifyActions(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('missedReceiveReliefVerifyActions', $data) && $data['missedReceiveReliefVerifyActions'] !== null ? $data['missedReceiveReliefVerifyActions'] : []
            ))
            ->withMissedReceiveReliefConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('missedReceiveReliefConsumeActions', $data) && $data['missedReceiveReliefConsumeActions'] !== null ? $data['missedReceiveReliefConsumeActions'] : []
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
            "rewards" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRewards() !== null && $this->getRewards() !== null ? $this->getRewards() : []
            ),
            "missedReceiveRelief" => $this->getMissedReceiveRelief(),
            "missedReceiveReliefVerifyActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMissedReceiveReliefVerifyActions() !== null && $this->getMissedReceiveReliefVerifyActions() !== null ? $this->getMissedReceiveReliefVerifyActions() : []
            ),
            "missedReceiveReliefConsumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMissedReceiveReliefConsumeActions() !== null && $this->getMissedReceiveReliefConsumeActions() !== null ? $this->getMissedReceiveReliefConsumeActions() : []
            ),
        );
    }
}