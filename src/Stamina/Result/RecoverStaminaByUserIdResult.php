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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\Stamina;
use Gs2\Stamina\Model\MaxStaminaTable;
use Gs2\Stamina\Model\RecoverIntervalTable;
use Gs2\Stamina\Model\RecoverValueTable;
use Gs2\Stamina\Model\StaminaModel;

/**
 * Result of recoverStaminaByUserId: Recover Stamina by User ID
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#recoverstaminabyuserid
 */
class RecoverStaminaByUserIdResult implements IResult {
    /** @var Stamina Stamina */
    private $item;
    /** @var StaminaModel Stamina Model */
    private $staminaModel;
    /** @var int Stamina value transferred to GS2-Inbox without receiving more than the maximum Stamina value */
    private $overflowValue;

    /** @return Stamina|null Stamina */
	public function getItem(): ?Stamina {
		return $this->item;
	}

    /** @param Stamina|null $item Stamina */
	public function setItem(?Stamina $item) {
		$this->item = $item;
	}

    /**
     * @param Stamina|null $item Stamina
     * @return RecoverStaminaByUserIdResult
     */
	public function withItem(?Stamina $item): RecoverStaminaByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return StaminaModel|null Stamina Model */
	public function getStaminaModel(): ?StaminaModel {
		return $this->staminaModel;
	}

    /** @param StaminaModel|null $staminaModel Stamina Model */
	public function setStaminaModel(?StaminaModel $staminaModel) {
		$this->staminaModel = $staminaModel;
	}

    /**
     * @param StaminaModel|null $staminaModel Stamina Model
     * @return RecoverStaminaByUserIdResult
     */
	public function withStaminaModel(?StaminaModel $staminaModel): RecoverStaminaByUserIdResult {
		$this->staminaModel = $staminaModel;
		return $this;
	}

    /** @return int|null Stamina value transferred to GS2-Inbox without receiving more than the maximum Stamina value */
	public function getOverflowValue(): ?int {
		return $this->overflowValue;
	}

    /** @param int|null $overflowValue Stamina value transferred to GS2-Inbox without receiving more than the maximum Stamina value */
	public function setOverflowValue(?int $overflowValue) {
		$this->overflowValue = $overflowValue;
	}

    /**
     * @param int|null $overflowValue Stamina value transferred to GS2-Inbox without receiving more than the maximum Stamina value
     * @return RecoverStaminaByUserIdResult
     */
	public function withOverflowValue(?int $overflowValue): RecoverStaminaByUserIdResult {
		$this->overflowValue = $overflowValue;
		return $this;
	}

    public static function fromJson(?array $data): ?RecoverStaminaByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new RecoverStaminaByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Stamina::fromJson($data['item']) : null)
            ->withStaminaModel(array_key_exists('staminaModel', $data) && $data['staminaModel'] !== null ? StaminaModel::fromJson($data['staminaModel']) : null)
            ->withOverflowValue(array_key_exists('overflowValue', $data) && $data['overflowValue'] !== null ? $data['overflowValue'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "staminaModel" => $this->getStaminaModel() !== null ? $this->getStaminaModel()->toJson() : null,
            "overflowValue" => $this->getOverflowValue(),
        );
    }
}