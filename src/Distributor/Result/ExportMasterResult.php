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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\CurrentDistributorMaster;

/**
 * Result of exportMaster: Export Distributor Model Master in a master data format that can be activated
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#exportmaster
 */
class ExportMasterResult implements IResult {
    /** @var CurrentDistributorMaster Distributor Model master data that can be activated */
    private $item;

    /** @return CurrentDistributorMaster|null Distributor Model master data that can be activated */
	public function getItem(): ?CurrentDistributorMaster {
		return $this->item;
	}

    /** @param CurrentDistributorMaster|null $item Distributor Model master data that can be activated */
	public function setItem(?CurrentDistributorMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentDistributorMaster|null $item Distributor Model master data that can be activated
     * @return ExportMasterResult
     */
	public function withItem(?CurrentDistributorMaster $item): ExportMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?ExportMasterResult {
        if ($data === null) {
            return null;
        }
        return (new ExportMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentDistributorMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}