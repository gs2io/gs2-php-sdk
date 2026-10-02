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
use Gs2\Enhance\Model\CurrentRateMaster;

/**
 * Result of updateCurrentRateMaster: Update currently active Rate Model master data
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#updatecurrentratemaster
 */
class UpdateCurrentRateMasterResult implements IResult {
    /** @var CurrentRateMaster Updated master data of the currently active Rate Models */
    private $item;

    /** @return CurrentRateMaster|null Updated master data of the currently active Rate Models */
	public function getItem(): ?CurrentRateMaster {
		return $this->item;
	}

    /** @param CurrentRateMaster|null $item Updated master data of the currently active Rate Models */
	public function setItem(?CurrentRateMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentRateMaster|null $item Updated master data of the currently active Rate Models
     * @return UpdateCurrentRateMasterResult
     */
	public function withItem(?CurrentRateMaster $item): UpdateCurrentRateMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentRateMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentRateMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentRateMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}