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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\CurrentExperienceMaster;

/**
 * Result of updateCurrentExperienceMaster: Update currently active Experience Model master data
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#updatecurrentexperiencemaster
 */
class UpdateCurrentExperienceMasterResult implements IResult {
    /** @var CurrentExperienceMaster Updated master data of the currently active Experience Models */
    private $item;

    /** @return CurrentExperienceMaster|null Updated master data of the currently active Experience Models */
	public function getItem(): ?CurrentExperienceMaster {
		return $this->item;
	}

    /** @param CurrentExperienceMaster|null $item Updated master data of the currently active Experience Models */
	public function setItem(?CurrentExperienceMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentExperienceMaster|null $item Updated master data of the currently active Experience Models
     * @return UpdateCurrentExperienceMasterResult
     */
	public function withItem(?CurrentExperienceMaster $item): UpdateCurrentExperienceMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentExperienceMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentExperienceMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentExperienceMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}