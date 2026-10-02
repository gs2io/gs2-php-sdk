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

namespace Gs2\Grade\Result;

use Gs2\Core\Model\IResult;
use Gs2\Grade\Model\CurrentGradeMaster;

/**
 * Result of updateCurrentGradeMaster: Update currently active Grade Model master data
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#updatecurrentgrademaster
 */
class UpdateCurrentGradeMasterResult implements IResult {
    /** @var CurrentGradeMaster Updated master data of the currently active Grade Models */
    private $item;

    /** @return CurrentGradeMaster|null Updated master data of the currently active Grade Models */
	public function getItem(): ?CurrentGradeMaster {
		return $this->item;
	}

    /** @param CurrentGradeMaster|null $item Updated master data of the currently active Grade Models */
	public function setItem(?CurrentGradeMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentGradeMaster|null $item Updated master data of the currently active Grade Models
     * @return UpdateCurrentGradeMasterResult
     */
	public function withItem(?CurrentGradeMaster $item): UpdateCurrentGradeMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentGradeMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentGradeMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentGradeMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}