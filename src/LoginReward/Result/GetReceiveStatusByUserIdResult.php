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

class GetReceiveStatusByUserIdResult implements IResult {
    /** @var ReceiveStatus */
    private $item;
    /** @var BonusModel */
    private $bonusModel;

	public function getItem(): ?ReceiveStatus {
		return $this->item;
	}

	public function setItem(?ReceiveStatus $item) {
		$this->item = $item;
	}

	public function withItem(?ReceiveStatus $item): GetReceiveStatusByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getBonusModel(): ?BonusModel {
		return $this->bonusModel;
	}

	public function setBonusModel(?BonusModel $bonusModel) {
		$this->bonusModel = $bonusModel;
	}

	public function withBonusModel(?BonusModel $bonusModel): GetReceiveStatusByUserIdResult {
		$this->bonusModel = $bonusModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetReceiveStatusByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetReceiveStatusByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ReceiveStatus::fromJson($data['item']) : null)
            ->withBonusModel(array_key_exists('bonusModel', $data) && $data['bonusModel'] !== null ? BonusModel::fromJson($data['bonusModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "bonusModel" => $this->getBonusModel() !== null ? $this->getBonusModel()->toJson() : null,
        );
    }
}