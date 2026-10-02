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

/**
 * Result of reDrawRarityParameterStatusByUserId: Re-draw Rarity Parameter Status by User ID
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#redrawrarityparameterstatusbyuserid
 */
class ReDrawRarityParameterStatusByUserIdResult implements IResult {
    /** @var RarityParameterStatus Rarity Parameter Status updated */
    private $item;
    /** @var RarityParameterStatus Rarity Parameter Status before update */
    private $old;

    /** @return RarityParameterStatus|null Rarity Parameter Status updated */
	public function getItem(): ?RarityParameterStatus {
		return $this->item;
	}

    /** @param RarityParameterStatus|null $item Rarity Parameter Status updated */
	public function setItem(?RarityParameterStatus $item) {
		$this->item = $item;
	}

    /**
     * @param RarityParameterStatus|null $item Rarity Parameter Status updated
     * @return ReDrawRarityParameterStatusByUserIdResult
     */
	public function withItem(?RarityParameterStatus $item): ReDrawRarityParameterStatusByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return RarityParameterStatus|null Rarity Parameter Status before update */
	public function getOld(): ?RarityParameterStatus {
		return $this->old;
	}

    /** @param RarityParameterStatus|null $old Rarity Parameter Status before update */
	public function setOld(?RarityParameterStatus $old) {
		$this->old = $old;
	}

    /**
     * @param RarityParameterStatus|null $old Rarity Parameter Status before update
     * @return ReDrawRarityParameterStatusByUserIdResult
     */
	public function withOld(?RarityParameterStatus $old): ReDrawRarityParameterStatusByUserIdResult {
		$this->old = $old;
		return $this;
	}

    public static function fromJson(?array $data): ?ReDrawRarityParameterStatusByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ReDrawRarityParameterStatusByUserIdResult())
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