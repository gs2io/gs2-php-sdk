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

class ConsumeStaminaResult implements IResult {
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

	public function withItem(?Stamina $item): ConsumeStaminaResult {
		$this->item = $item;
		return $this;
	}

	public function getStaminaModel(): ?StaminaModel {
		return $this->staminaModel;
	}

	public function setStaminaModel(?StaminaModel $staminaModel) {
		$this->staminaModel = $staminaModel;
	}

	public function withStaminaModel(?StaminaModel $staminaModel): ConsumeStaminaResult {
		$this->staminaModel = $staminaModel;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeStaminaResult {
        if ($data === null) {
            return null;
        }
        return (new ConsumeStaminaResult())
            ->withItem(empty($data['item']) ? null : Stamina::fromJson($data['item']))
            ->withStaminaModel(empty($data['staminaModel']) ? null : StaminaModel::fromJson($data['staminaModel']));
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "staminaModel" => $this->getStaminaModel() !== null ? $this->getStaminaModel()->toJson() : null,
        );
    }
}