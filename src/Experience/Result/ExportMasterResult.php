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
 * Result of exportMaster: Export Experience Model Master in a master data format that can be activated
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#exportmaster
 */
class ExportMasterResult implements IResult {
    /** @var CurrentExperienceMaster Experience Model master data that can be activated */
    private $item;

    /** @return CurrentExperienceMaster|null Experience Model master data that can be activated */
	public function getItem(): ?CurrentExperienceMaster {
		return $this->item;
	}

    /** @param CurrentExperienceMaster|null $item Experience Model master data that can be activated */
	public function setItem(?CurrentExperienceMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentExperienceMaster|null $item Experience Model master data that can be activated
     * @return ExportMasterResult
     */
	public function withItem(?CurrentExperienceMaster $item): ExportMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?ExportMasterResult {
        if ($data === null) {
            return null;
        }
        return (new ExportMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentExperienceMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}