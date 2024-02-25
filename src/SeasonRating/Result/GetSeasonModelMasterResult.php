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

namespace Gs2\SeasonRating\Result;

use Gs2\Core\Model\IResult;
use Gs2\SeasonRating\Model\TierModel;
use Gs2\SeasonRating\Model\SeasonModelMaster;

class GetSeasonModelMasterResult implements IResult {
    /** @var SeasonModelMaster */
    private $item;

	public function getItem(): ?SeasonModelMaster {
		return $this->item;
	}

	public function setItem(?SeasonModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?SeasonModelMaster $item): GetSeasonModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSeasonModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetSeasonModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SeasonModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}