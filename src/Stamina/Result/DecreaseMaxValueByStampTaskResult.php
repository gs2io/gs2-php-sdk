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
 * Result of decreaseMaxValueByStampTask: Execute stamina maximum value subtraction as a consume action
 *
 * @see https://docs.gs2.io/api_reference/stamina/stamp_sheet/#gs2staminadecreasemaxvaluebyuserid
 */
class DecreaseMaxValueByStampTaskResult implements IResult {
    /** @var Stamina Stamina */
    private $item;
    /** @var StaminaModel Stamina Model */
    private $staminaModel;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

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
     * @return DecreaseMaxValueByStampTaskResult
     */
	public function withItem(?Stamina $item): DecreaseMaxValueByStampTaskResult {
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
     * @return DecreaseMaxValueByStampTaskResult
     */
	public function withStaminaModel(?StaminaModel $staminaModel): DecreaseMaxValueByStampTaskResult {
		$this->staminaModel = $staminaModel;
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
     * @return DecreaseMaxValueByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): DecreaseMaxValueByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseMaxValueByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new DecreaseMaxValueByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Stamina::fromJson($data['item']) : null)
            ->withStaminaModel(array_key_exists('staminaModel', $data) && $data['staminaModel'] !== null ? StaminaModel::fromJson($data['staminaModel']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "staminaModel" => $this->getStaminaModel() !== null ? $this->getStaminaModel()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}