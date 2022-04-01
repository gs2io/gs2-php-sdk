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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\BonusRate;
use Gs2\Enhance\Model\RateModel;

class DirectEnhanceByUserIdResult implements IResult {
    /** @var RateModel */
    private $item;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;
    /** @var int */
    private $acquireExperience;
    /** @var float */
    private $bonusRate;

	public function getItem(): ?RateModel {
		return $this->item;
	}

	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

	public function withItem(?RateModel $item): DirectEnhanceByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): DirectEnhanceByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): DirectEnhanceByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getAcquireExperience(): ?int {
		return $this->acquireExperience;
	}

	public function setAcquireExperience(?int $acquireExperience) {
		$this->acquireExperience = $acquireExperience;
	}

	public function withAcquireExperience(?int $acquireExperience): DirectEnhanceByUserIdResult {
		$this->acquireExperience = $acquireExperience;
		return $this;
	}

	public function getBonusRate(): ?float {
		return $this->bonusRate;
	}

	public function setBonusRate(?float $bonusRate) {
		$this->bonusRate = $bonusRate;
	}

	public function withBonusRate(?float $bonusRate): DirectEnhanceByUserIdResult {
		$this->bonusRate = $bonusRate;
		return $this;
	}

    public static function fromJson(?array $data): ?DirectEnhanceByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new DirectEnhanceByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RateModel::fromJson($data['item']) : null)
            ->withStampSheet(array_key_exists('stampSheet', $data) && $data['stampSheet'] !== null ? $data['stampSheet'] : null)
            ->withStampSheetEncryptionKeyId(array_key_exists('stampSheetEncryptionKeyId', $data) && $data['stampSheetEncryptionKeyId'] !== null ? $data['stampSheetEncryptionKeyId'] : null)
            ->withAcquireExperience(array_key_exists('acquireExperience', $data) && $data['acquireExperience'] !== null ? $data['acquireExperience'] : null)
            ->withBonusRate(array_key_exists('bonusRate', $data) && $data['bonusRate'] !== null ? $data['bonusRate'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
            "acquireExperience" => $this->getAcquireExperience(),
            "bonusRate" => $this->getBonusRate(),
        );
    }
}