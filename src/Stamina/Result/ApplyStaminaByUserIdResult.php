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

class ApplyStaminaByUserIdResult implements IResult {
    /** @var Stamina */
    private $item;
    /** @var StaminaModel */
    private $staminaModel;

	public function getItem(): ?Stamina {
		return $this->item;
	}

	public function setItem(?Stamina $item) {
		$this->item = $item;
	}

	public function withItem(?Stamina $item): ApplyStaminaByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getStaminaModel(): ?StaminaModel {
		return $this->staminaModel;
	}

	public function setStaminaModel(?StaminaModel $staminaModel) {
		$this->staminaModel = $staminaModel;
	}

	public function withStaminaModel(?StaminaModel $staminaModel): ApplyStaminaByUserIdResult {
		$this->staminaModel = $staminaModel;
		return $this;
	}

    public static function fromJson(?array $data): ?ApplyStaminaByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ApplyStaminaByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Stamina::fromJson($data['item']) : null)
            ->withStaminaModel(array_key_exists('staminaModel', $data) && $data['staminaModel'] !== null ? StaminaModel::fromJson($data['staminaModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "staminaModel" => $this->getStaminaModel() !== null ? $this->getStaminaModel()->toJson() : null,
        );
    }
}