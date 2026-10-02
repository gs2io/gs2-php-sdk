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
use Gs2\Experience\Model\ThresholdMaster;

/**
 * Result of createThresholdMaster: Create Rank Up Threshold Master
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#createthresholdmaster
 */
class CreateThresholdMasterResult implements IResult {
    /** @var ThresholdMaster Created Rank Up Threshold Master */
    private $item;

    /** @return ThresholdMaster|null Created Rank Up Threshold Master */
	public function getItem(): ?ThresholdMaster {
		return $this->item;
	}

    /** @param ThresholdMaster|null $item Created Rank Up Threshold Master */
	public function setItem(?ThresholdMaster $item) {
		$this->item = $item;
	}

    /**
     * @param ThresholdMaster|null $item Created Rank Up Threshold Master
     * @return CreateThresholdMasterResult
     */
	public function withItem(?ThresholdMaster $item): CreateThresholdMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateThresholdMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateThresholdMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ThresholdMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}