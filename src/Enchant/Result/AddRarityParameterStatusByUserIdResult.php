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

namespace Gs2\Enchant\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enchant\Model\RarityParameterValue;
use Gs2\Enchant\Model\RarityParameterStatus;

class AddRarityParameterStatusByUserIdResult implements IResult {
    /** @var RarityParameterStatus */
    private $item;
    /** @var RarityParameterStatus */
    private $old;

	public function getItem(): ?RarityParameterStatus {
		return $this->item;
	}

	public function setItem(?RarityParameterStatus $item) {
		$this->item = $item;
	}

	public function withItem(?RarityParameterStatus $item): AddRarityParameterStatusByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getOld(): ?RarityParameterStatus {
		return $this->old;
	}

	public function setOld(?RarityParameterStatus $old) {
		$this->old = $old;
	}

	public function withOld(?RarityParameterStatus $old): AddRarityParameterStatusByUserIdResult {
		$this->old = $old;
		return $this;
	}

    public static function fromJson(?array $data): ?AddRarityParameterStatusByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new AddRarityParameterStatusByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RarityParameterStatus::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? RarityParameterStatus::fromJson($data['old']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
        );
    }
}