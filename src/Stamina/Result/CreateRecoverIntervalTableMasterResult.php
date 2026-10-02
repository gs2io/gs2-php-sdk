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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\RecoverIntervalTableMaster;

/**
 * Result of createRecoverIntervalTableMaster: Create Recovery Interval Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#createrecoverintervaltablemaster
 */
class CreateRecoverIntervalTableMasterResult implements IResult {
    /** @var RecoverIntervalTableMaster Recovery Interval Table Master created */
    private $item;

    /** @return RecoverIntervalTableMaster|null Recovery Interval Table Master created */
	public function getItem(): ?RecoverIntervalTableMaster {
		return $this->item;
	}

    /** @param RecoverIntervalTableMaster|null $item Recovery Interval Table Master created */
	public function setItem(?RecoverIntervalTableMaster $item) {
		$this->item = $item;
	}

    /**
     * @param RecoverIntervalTableMaster|null $item Recovery Interval Table Master created
     * @return CreateRecoverIntervalTableMasterResult
     */
	public function withItem(?RecoverIntervalTableMaster $item): CreateRecoverIntervalTableMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateRecoverIntervalTableMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateRecoverIntervalTableMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RecoverIntervalTableMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}