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
use Gs2\LoginReward\Model\ConsumeAction;
use Gs2\LoginReward\Model\BonusModel;

class MissedReceiveByUserIdResult implements IResult {
    /** @var ReceiveStatus */
    private $item;
    /** @var BonusModel */
    private $bonusModel;
    /** @var string */
    private $transactionId;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;
    /** @var bool */
    private $autoRunStampSheet;

	public function getItem(): ?ReceiveStatus {
		return $this->item;
	}

	public function setItem(?ReceiveStatus $item) {
		$this->item = $item;
	}

	public function withItem(?ReceiveStatus $item): MissedReceiveByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getBonusModel(): ?BonusModel {
		return $this->bonusModel;
	}

	public function setBonusModel(?BonusModel $bonusModel) {
		$this->bonusModel = $bonusModel;
	}

	public function withBonusModel(?BonusModel $bonusModel): MissedReceiveByUserIdResult {
		$this->bonusModel = $bonusModel;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): MissedReceiveByUserIdResult {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): MissedReceiveByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): MissedReceiveByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getAutoRunStampSheet(): ?bool {
		return $this->autoRunStampSheet;
	}

	public function setAutoRunStampSheet(?bool $autoRunStampSheet) {
		$this->autoRunStampSheet = $autoRunStampSheet;
	}

	public function withAutoRunStampSheet(?bool $autoRunStampSheet): MissedReceiveByUserIdResult {
		$this->autoRunStampSheet = $autoRunStampSheet;
		return $this;
	}

    public static function fromJson(?array $data): ?MissedReceiveByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new MissedReceiveByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ReceiveStatus::fromJson($data['item']) : null)
            ->withBonusModel(array_key_exists('bonusModel', $data) && $data['bonusModel'] !== null ? BonusModel::fromJson($data['bonusModel']) : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withStampSheet(array_key_exists('stampSheet', $data) && $data['stampSheet'] !== null ? $data['stampSheet'] : null)
            ->withStampSheetEncryptionKeyId(array_key_exists('stampSheetEncryptionKeyId', $data) && $data['stampSheetEncryptionKeyId'] !== null ? $data['stampSheetEncryptionKeyId'] : null)
            ->withAutoRunStampSheet(array_key_exists('autoRunStampSheet', $data) ? $data['autoRunStampSheet'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "bonusModel" => $this->getBonusModel() !== null ? $this->getBonusModel()->toJson() : null,
            "transactionId" => $this->getTransactionId(),
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
            "autoRunStampSheet" => $this->getAutoRunStampSheet(),
        );
    }
}