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

namespace Gs2\Ranking2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking2\Model\CurrentRankingMaster;

/**
 * Result of updateCurrentRankingMaster: Update currently active Ranking Model master data
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatecurrentrankingmaster
 */
class UpdateCurrentRankingMasterResult implements IResult {
    /** @var CurrentRankingMaster Updated master data of the currently active Ranking Models */
    private $item;

    /** @return CurrentRankingMaster|null Updated master data of the currently active Ranking Models */
	public function getItem(): ?CurrentRankingMaster {
		return $this->item;
	}

    /** @param CurrentRankingMaster|null $item Updated master data of the currently active Ranking Models */
	public function setItem(?CurrentRankingMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentRankingMaster|null $item Updated master data of the currently active Ranking Models
     * @return UpdateCurrentRankingMasterResult
     */
	public function withItem(?CurrentRankingMaster $item): UpdateCurrentRankingMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentRankingMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentRankingMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentRankingMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}