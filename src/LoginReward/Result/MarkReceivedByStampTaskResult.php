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

namespace Gs2\LoginReward\Result;

use Gs2\Core\Model\IResult;
use Gs2\LoginReward\Model\ReceiveStatus;
use Gs2\LoginReward\Model\AcquireAction;
use Gs2\LoginReward\Model\Reward;
use Gs2\LoginReward\Model\VerifyAction;
use Gs2\LoginReward\Model\ConsumeAction;
use Gs2\LoginReward\Model\BonusModel;

/**
 * Result of markReceivedByStampTask: Execute mark as received as consume action
 *
 * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewardmarkreceivedbyuserid
 */
class MarkReceivedByStampTaskResult implements IResult {
    /** @var ReceiveStatus ReceiveStatus */
    private $item;
    /** @var BonusModel Login Bonus Model */
    private $bonusModel;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return ReceiveStatus|null ReceiveStatus */
	public function getItem(): ?ReceiveStatus {
		return $this->item;
	}

    /** @param ReceiveStatus|null $item ReceiveStatus */
	public function setItem(?ReceiveStatus $item) {
		$this->item = $item;
	}

    /**
     * @param ReceiveStatus|null $item ReceiveStatus
     * @return MarkReceivedByStampTaskResult
     */
	public function withItem(?ReceiveStatus $item): MarkReceivedByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return BonusModel|null Login Bonus Model */
	public function getBonusModel(): ?BonusModel {
		return $this->bonusModel;
	}

    /** @param BonusModel|null $bonusModel Login Bonus Model */
	public function setBonusModel(?BonusModel $bonusModel) {
		$this->bonusModel = $bonusModel;
	}

    /**
     * @param BonusModel|null $bonusModel Login Bonus Model
     * @return MarkReceivedByStampTaskResult
     */
	public function withBonusModel(?BonusModel $bonusModel): MarkReceivedByStampTaskResult {
		$this->bonusModel = $bonusModel;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return MarkReceivedByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): MarkReceivedByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?MarkReceivedByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new MarkReceivedByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ReceiveStatus::fromJson($data['item']) : null)
            ->withBonusModel(array_key_exists('bonusModel', $data) && $data['bonusModel'] !== null ? BonusModel::fromJson($data['bonusModel']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "bonusModel" => $this->getBonusModel() !== null ? $this->getBonusModel()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}