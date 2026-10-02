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

namespace Gs2\SerialKey\Result;

use Gs2\Core\Model\IResult;
use Gs2\SerialKey\Model\CurrentCampaignMaster;

/**
 * Result of updateCurrentCampaignMaster: Update currently active Campaign Model master data
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#updatecurrentcampaignmaster
 */
class UpdateCurrentCampaignMasterResult implements IResult {
    /** @var CurrentCampaignMaster Updated master data of the currently active Campaign Models */
    private $item;

    /** @return CurrentCampaignMaster|null Updated master data of the currently active Campaign Models */
	public function getItem(): ?CurrentCampaignMaster {
		return $this->item;
	}

    /** @param CurrentCampaignMaster|null $item Updated master data of the currently active Campaign Models */
	public function setItem(?CurrentCampaignMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentCampaignMaster|null $item Updated master data of the currently active Campaign Models
     * @return UpdateCurrentCampaignMasterResult
     */
	public function withItem(?CurrentCampaignMaster $item): UpdateCurrentCampaignMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentCampaignMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentCampaignMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentCampaignMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}